<?php 
    if ($_SESSION['user_login'] == 1)
    redirect(base_url() . ''.get_login_type_controller($_SESSION['login_type']).'/dashboard');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Indici-Edu Forget Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginpage/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script> 
    <script>
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if(response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This Field Is Required</span>';
                return false;
            }
            return true;
        }
         
        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
    
    <style type="text/css">
        p#image_captcha > img {
            width: 275px;
            height: 60px;
            position: relative;
            top: -30px;
        }
    </style>
  </head>
  <body>
      
    <div class="container-fluid main-container">
      <div class="container">
        <div class="row mx-auto align-items-center">
          <div class="col-md-6  text-center">
            <img src="<?php echo base_url(); ?>assets/loginpage/forgot-password.png" class="img-fluid loginimg-left" alt="LoginImg">
          </div>
          <div class="col-md-6 text-center" id="logindiv">
            <img src="https://indiciedu.com.pk/frontend/wp-content/uploads/2021/01/indici-edu-logo-SVG.svg" class="indici-edu">
            <h3>Forgot Password?</h3>
            <div id="error"></div>
            <p class="mb-5 mt-3"><b>Enter the email address you used when you joined and<br>we'll send you instructions to reset your password</b></p>
            <form id="my_form" name="myform" method="post" action="#">
                <div class="row mb-3">
                    <div class="input-group mb-3">
                       <span class="input-group-text" id="email-box"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                       <input type="email" class="form-control" name="email" id="email" placeholder="Email" aria-label="Email" aria-describedby="email-box">
                    </div> 
                </div>
                <div class="row mb-3">
                    <div class="input-group mb-3">
 	            	  <div class="g-recaptcha" data-sitekey="6LdyrA0bAAAAAKOCZ4qv6EzmrwEtFdYIzMgrJ4Qz" data-callback="verifyCaptcha"></div>
	            	  <div id="g-recaptcha-error"></div>
    	            </div>
                </div>
                <!--Email Verificateion-->
                <button type="button" id="forgot" class="btn btn-primary">Verify Email</button>
                <!--Verify Email OTP-->
                <p id="code_section" style="margin-top: 40px;display:none">
                    <input type="text" class="form-control" name="code" id="code" placeholder="Enter Code" aria-label="Enter Code">
                    <p id="error1" style="color:red;"></p>
                    <button type="submit" id="verify_code" style="display:none;" class="button btn btn-primary">Verify Code</button>
                </p>
            </form>
            
            <!--Update Pass Form-->
            <form id="update_password" name="myform" method="post" role="form" action="<?php echo base_url(); ?>login/update_password">
                <input type="password" class="form-control" name="password" id="password" placeholder="New Password" minlength="8" style="margin-bottom: 10px;">
                <span id="password_span" class="errorspan"></span>
                
                <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" minlength="8" style="margin-bottom: 10px;">
                <span id="cpassword_span" class="errorspan"></span>
                
                <input type="hidden" name="secret_key" id="secret_key">
                <input type="hidden" name="email" id="em"> 
                <button type="submit" class="button btn btn-primary">Update Password</button>
            </form>
            
          </div> 

        </div>
      </div>
    </div>

    <footer class="footer-main"> 
     <div class="footer-top py-3">
      <div class="container ">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-5  text-sm-start text-md-center text-lg-end d-none">
            
            <img src="https://indiciedu.com.pk/frontend/wp-content/uploads/2021/01/indici-edu-logo-SVG.svg" class="indici-edu-ftr-logo">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12  text-sm-start  text-md-center text-lg-start  text-white">
            
            
           <p class="m-0 text-center">INDICI-EDU IS A FLAGSHIP PRODUCT OF CAMPUSNETIC SOLUTIONS (AN ICT & EDUTECH STARTUP) </p>
            <p class="m-0 text-center">WHICH IS SUPPORTED BY F3 GROUP OF TECHNOLOGY COMPANIES. © 2017-<?= date("Y") ?> ALL RIGHTS RESERVED</p>
        
        </div>
     </div>
     </div>
    </div>
    <div class="container-fluid footer-bottom d-none">
        <div class="container"> 
         <div class="row align-items-center">
         <div class="col-md-12 text-sm-start text-md-center">
            
            
            <ul class="footr-li-list d-md-inline-block d-lg-inline-flex pt-2">
              <li><a href="https://indiciedu.com.pk"><i class="fas fa-globe"></i>www.indiciedu.com.pk</a></li>
              <li><a href="https://web.whatsapp.com/send?phone=923155172825&text=Hey!!!%20i%20am%20interested%20in%20indici-edu%20services."><i class="fab fa-whatsapp"></i>+92 315 5172825</a></li>
              <li><a href="mailto:info@indiciedu.com.pk"><i class="far fa-envelope"></i>info@indiciedu.com.pk</li>
              <li><a href="https://www.facebook.com/Indici.edu"><i class="fab fa-facebook-f"></i>www.facebook.com/Indici.edu</a></li>
            </ul>
            
         </div> 
         </div>
        </div>
    </div>
    
    </footer>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<script src='<?php echo base_url();?>assets/login/js/jquery.slideunlock.js'></script>

<script>

 $('#forgot').click(function(){

    var email   = $.trim($('#email').val());
    var response = grecaptcha.getResponse();
    
    if(response.length == 0 && email == "") {
        $("#error").html("<div class='alert alert-danger'> Email And Captcha Are Required Fields.</div>");
        setTimeout(function(){
            $("#error").text("");
            $("#error").removeClass("alert-danger");
        }, 3000);
    }else{
        $.ajax({
            method: "POST",
            url: "<?php echo base_url();?>login/verify_email/",
            data: { email:email },
            dataType: "JSON",
            success:function(response_ajax) {
                console.log(response_ajax);
                if(response_ajax.check == true){
                    $('#email').attr('disabled', 'disabled');
                    $('#forgot').css('cursor', 'not-allowed');
                    $("#error").html("<div class='alert alert-success'>" + response_ajax.message + "</div>");
                    setTimeout(function(){
                        $("#error").text("");
                        $("#error").removeClass("alert-success");
                    }, 3000);
                    $("#code_section").css('display','block');
                    $("#verify_code").css('display','block');
                    $("#forgot").text("Resend Code (60)");
                    $("#forgot").prop("disabled", true);
                    $("#captcha-div").hide();
                    $("#slider").hide();
                     var i = 59;
                        var interval = setInterval(function () {
                        $("#forgot").text("Resend Code (" + i + ")");
                            i--;
                            if(i == -1)
                            {
                                $("#forgot").text("Resend Code");
                                $("#forgot").prop("disabled", false);
                                clearInterval(interval);
                                $('#forgot').css('cursor', 'pointer');
                            }
                        }, 1000);
                }else{
                    $("#error").html("<div class='alert alert-danger'>" + response_ajax.message + "</div>");
                    setTimeout(function(){
                        $("#error").text("");
                        $("#error").removeClass("alert-danger");
                    }, 3000);
                }
            }
        });
    }
 });

$("#update_password").hide();

// $(function () {
//     var slider = new SliderUnlock("#slider", {}, function () {
//         $("#forgot").prop("disabled", false);
//         $("#captcha-div").show();
//     });
//     slider.init();
// });

$('#image_captcha').on('click', '.captcha-refresh', function(){
    $.get('<?php echo base_url().'login/refresh'; ?>', function(data){
       $('#image_captcha').html(data + "<span class='captcha-refresh' ><img height='20' src='<?php echo base_url().'assets/images/refresh.png'; ?>'/></span>");
    });
});

$("#password").blur(function(){
    var password = $.trim($("#password").val());
    if(password != ''){
        //   var $regexpassword= /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8}$/;
        //   if (password.match($regexpassword)) {
        //       $("#password_span").html('');
        //   } 
        //   else{
            //   $("#password").val(password.slice(0,-1));
            //   $("#password").val("");
            //   $("#password_span").html('Incorrect format');
        //   }       
    }

});
            
$("#cpassword").blur(function(){
    var cpassword = $.trim($("#cpassword").val());
    var password = $.trim($("#password").val());
    if(cpassword != '' && password != ''){
        if( cpassword != password ){
              $("#cpassword").val(cpassword.slice(0,-1));
              $("#cpassword").val("");
              $("#cpassword_span").html('Password & confirm password don\'t match');
        } 
        else
        {
            $("#cpassword_span").html('');  
        }
    }

});
	

 $("#verify_code").click(function(e){

    var code = $("#code").val();
    var email = $("#email").val();
    $.ajax({
        type: "POST",
        async: false,
        data: {
            code:code,
            email:email
        },
        url: "<?php echo base_url();?>login/verify_code/",
        dataType: "json",
        success: function(response) {
            if(response.check == false){
                $('#error').html("");
                $('#error1').html("<span style='color:red;'>"+ response.message +"</span>");
            }else{
                $("#error1").html("<div class='alert alert-success'>Email Verification Confirmed</div>");
                setTimeout(function(){
                    $("#error1").text("");
                    $("#error1").removeClass("alert-success");
                    $("#my_form").hide();
                    $("#update_password").show();
                }, 3000);
                $("#secret_key").val(response.secret_key);
                $("#em").val(email);
            }
        }
    });
    e.preventDefault();
});
$(function() {
    $('#slideshow > div:gt(0)').hide();
    setInterval(function() {
        $('#slideshow > div:first')
        .fadeOut(2000)
        .next()
        .fadeIn(2200)
        .end()
        .appendTo('#slideshow');
    }, 8850);
});
function putvalue() {
    if ($("#menu1").val()=='admin')
    {
        $("#email").val("admin@gminns.com");
        $("#password").val("gminns");
    }       
    else if ($("#menu1").val()=='principal')
    {
        $("#email").val("principal@gminns.com");
        $("#password").val("gminns");
    }       
    else if ($("#menu1").val()=='teacher')
    {
        $("#email").val("teacher@gminns.com");
        $("#password").val("gminns");
    }       
    else if ($("#menu1").val()=='parent')
    {
        $("#email").val("parent@gminns.com");
        $("#password").val("gminns");
    }       
    else if ($("#menu1").val()=='student')
    {
        $("#email").val("student@gminns.com");
        $("#password").val("gminns");
    }       
    else{
        $("#email").css("border","2px solid red");
        $("#password").css("border","2px solid red");
        $("#email").val("");
        $("#password").val("");
    }
}
</script>

  </body>
</html>