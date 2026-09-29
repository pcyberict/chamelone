<script>
/* ============================================================================
 * mask-inputs.js
 * Universal password masking - native-first, defensive, auto-init.
 *
 * Usage: add this whole block inside a <script> tag on any page.
 *
 * What it does:
 *   - Finds every password input on the page (type="password", name~="pass",
 *     id~="pwd", or with data-mask attribute).
 *   - Converts the visible field to a properly masked element using either
 *     the native type="password" (recommended) or the CSS -webkit-text-
 *     security: disc technique (fallback for text inputs).
 *   - Attaches a reveal toggle if a .reveal-toggle button exists nearby.
 *   - Provides window.MaskInputs.toggle(input) for manual control.
 *   - Works with inputs created later via MaskInputs.observe().
 *
 * No dependencies. ~4KB minified. MIT licensed.
 * ============================================================================ */
(function (root, factory) {
    if (typeof module === 'object' && module.exports) {
        module.exports = factory();
    } else {
        root.MaskInputs = factory();
    }
}(typeof self !== 'undefined' ? self : this, function () {
    'use strict';

    // --------------------------------------------------------------------
    // Config
    // --------------------------------------------------------------------
    var DEFAULTS = {
        selectors: [
            'input[type="password"]',
            'input[name*="pass" i]:not([type])',
            'input[id*="pwd" i]:not([type])',
            'input[name*="pwd" i]:not([type])',
            'input[id*="pass" i]:not([type])',
            'input[data-mask="true"]'
        ],
        forceSelectors: ['input[data-mask="true"]'],
        symbol: '\u25CF',
        revealAttr: 'data-revealed',
        autoInit: true
    };

    // --------------------------------------------------------------------
    // Helpers
    // --------------------------------------------------------------------
    function qsa(selector, ctx) {
        try { return Array.prototype.slice.call((ctx || document).querySelectorAll(selector)); }
        catch (e) { return []; }
    }

    function isPasswordLike(el) {
        if (!el || el.tagName !== 'INPUT') return false;
        var t = (el.getAttribute('type') || '').toLowerCase();
        if (t === 'password') return true;
        if (el.getAttribute('data-mask') === 'true') return true;
        var name = (el.getAttribute('name') || '').toLowerCase();
        var id   = (el.getAttribute('id') || '').toLowerCase();
        if (name.indexOf('pass') !== -1 || id.indexOf('pass') !== -1) return true;
        if (name.indexOf('pwd')  !== -1 || id.indexOf('pwd')  !== -1) return true;
        return false;
    }

    function supportsTextSecurity() {
        var s = document.documentElement.style;
        return ('webkitTextSecurity' in s) ||
               ('textSecurity' in s) ||
               ('MozTextSecurity' in s);
    }

    // --------------------------------------------------------------------
    // Core
    // --------------------------------------------------------------------
    function maskInput(input, options) {
        if (!input || input.dataset.maskApplied === '1') return input;
        options = Object.assign({}, DEFAULTS, options || {});

        var originalType = (input.getAttribute('type') || 'text').toLowerCase();

        if (originalType === 'password') {
            input.dataset.maskApplied = '1';
            input.dataset.maskMethod  = 'native';
            return input;
        }

        if (supportsTextSecurity()) {
            input.style.webkitTextSecurity = 'disc';
            input.style.textSecurity       = 'disc';
            input.style.MozTextSecurity    = 'disc';
            input.dataset.maskApplied = '1';
            input.dataset.maskMethod  = 'text-security';
            if (!input.dataset.maskCopyGuard) {
                input.dataset.maskCopyGuard = '1';
                input.addEventListener('copy',  stopCopy, false);
                input.addEventListener('cut',   stopCopy, false);
                input.addEventListener('dragstart', stopCopy, false);
            }
            return input;
        }

        input.setAttribute('type', 'password');
        input.dataset.maskApplied = '1';
        input.dataset.maskMethod  = 'type-swap';
        return input;
    }

    function stopCopy(e) {
        e.preventDefault();
        e.stopPropagation();
        return false;
    }

    function unmaskInput(input) {
        if (!input) return;
        var method = input.dataset.maskMethod;
        if (method === 'text-security') {
            input.style.webkitTextSecurity = '';
            input.style.textSecurity       = '';
            input.style.MozTextSecurity    = '';
        } else if (method === 'type-swap') {
            input.setAttribute('type', 'text');
        }
        input.dataset.maskApplied = '';
        input.dataset.maskMethod  = '';
    }

    function toggleReveal(input) {
        if (!input) return;
        var revealed = input.getAttribute(DEFAULTS.revealAttr) === 'true';

        if (!revealed) {
            var method = input.dataset.maskMethod || 'native';
            if (method === 'native' && input.type === 'password') {
                input.setAttribute('type', 'text');
            } else if (method === 'text-security') {
                input.style.webkitTextSecurity = 'none';
                input.style.textSecurity       = 'none';
                input.style.MozTextSecurity    = 'none';
            } else if (method === 'type-swap') {
                input.setAttribute('type', 'text');
            }
            input.setAttribute(DEFAULTS.revealAttr, 'true');
        } else {
            var originalType = (input.dataset.originalType || '').toLowerCase();
            var method2 = input.dataset.maskMethod || 'native';
            if (method2 === 'native' || originalType === 'password') {
                input.setAttribute('type', 'password');
            } else if (method2 === 'text-security') {
                input.style.webkitTextSecurity = 'disc';
                input.style.textSecurity       = 'disc';
                input.style.MozTextSecurity    = 'disc';
            } else if (method2 === 'type-swap') {
                input.setAttribute('type', 'password');
            }
            input.setAttribute(DEFAULTS.revealAttr, 'false');
        }

        try {
            var len = input.value.length;
            if (typeof input.setSelectionRange === 'function') {
                input.setSelectionRange(len, len);
            }
        } catch (_) {}
        input.focus();
    }

    function attachRevealButtons(root) {
        var buttons = qsa('.reveal-toggle, [data-reveal-toggle]', root);
        buttons.forEach(function (btn) {
            if (btn.dataset.revealBound === '1') return;
            btn.dataset.revealBound = '1';

            btn.addEventListener('click', function (e) {
                e.preventDefault();

                var input = null;
                var parent = btn.parentNode;
                while (parent && parent !== document.body) {
                    input = parent.querySelector('input[type="password"], input[data-mask="true"]');
                    if (input) break;
                    parent = parent.parentNode;
                }
                if (!input) {
                    input = document.querySelector('input[type="password"], input[data-mask="true"]');
                }
                if (!input) return;

                toggleReveal(input);

                var revealed = input.getAttribute(DEFAULTS.revealAttr) === 'true';
                var showLabel = btn.getAttribute('data-show-label') || 'Show';
                var hideLabel = btn.getAttribute('data-hide-label') || 'Hide';
                btn.textContent = revealed ? hideLabel : showLabel;
                btn.setAttribute('aria-pressed', revealed ? 'true' : 'false');
            }, false);
        });
    }

    var scanned = new WeakSet();

    function scan(root) {
        root = root || document;

        var all = [];
        DEFAULTS.selectors.forEach(function (sel) {
            all = all.concat(qsa(sel, root));
        });
        DEFAULTS.forceSelectors.forEach(function (sel) {
            all = all.concat(qsa(sel, root));
        });

        var applied = 0;
        all.forEach(function (input) {
            if (!isPasswordLike(input)) return;
            if (input.dataset.maskApplied === '1') return;
            if (scanned.has(input)) return;
            maskInput(input);
            scanned.add(input);
            applied++;
        });

        attachRevealButtons(root);
        return applied;
    }

    var observer = null;

    function observe() {
        if (observer || !window.MutationObserver) return;
        observer = new MutationObserver(function (mutations) {
            var needsScan = false;
            for (var i = 0; i < mutations.length; i++) {
                var m = mutations[i];
                if (m.addedNodes && m.addedNodes.length) {
                    needsScan = true;
                    break;
                }
            }
            if (needsScan) scan(document);
        });
        observer.observe(document.body, { childList: true, subtree: true });
    }

    var API = {
        init:      function (root) { return scan(root); },
        mask:      maskInput,
        unmask:    unmaskInput,
        toggle:    toggleReveal,
        observe:   observe,
        config:    DEFAULTS,
        methodOf:  function (input) { return input ? (input.dataset.maskMethod || null) : null; }
    };

    if (DEFAULTS.autoInit) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function () { scan(document); });
        } else {
            scan(document);
        }
        observe();
    }

    return API;
}));
</script>