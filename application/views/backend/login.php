<?php
    if($this->session->userdata("user_login"))
    {
        reditect(base_url().'admin/dashboard');
    }else{
?>
<!doctype html>
<html lang="en">
  <?php if(isset($_SESSION['user_login']) && $_SESSION['user_login']==1)redirect(base_url().''.get_login_type_controller($_SESSION['login_type']).'/dashboard'); ?>    
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginpage/style.css">

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script> 
    
    <style type="text/css">
        #btn-forgotpwd
        {
            line-height: 3;
        }
    </style>
    
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

    <title>Indici-Edu Login</title>

  
  </head>
  <body>




    <div class="container-fluid main-container">
      <div class="container">
        <div class="row mx-auto align-items-center">
          <div class="col-md-6  text-center">
            <img src="<?php echo base_url(); ?>assets/loginpage/login.png" class="img-fluid loginimg-left" alt="LoginImg">
          </div>

          <div class="col-md-6 text-center" id="logindiv">
            <h3>Welcome to</h3>
            <img src="https://indiciedu.com.pk/frontend/wp-content/uploads/2021/01/indici-edu-logo-SVG.svg" class="indici-edu">
             <p class="mb-5 mt-3"><b>Sign In To Your Account.</b></p>
             
             <?php if($this->session->flashdata('club_updated')){echo '
                    <div align="center">
                        <div class="alert alert-success alert-dismissable" role="alert">
                            '.$this->session->flashdata('club_updated').'
                        </div>
                    </div>
            ';} ?>
            <?php if($this->session->flashdata('error_login')){echo '
                    <div align="center">
                        <div class="alert alert-danger alert-dismissable" role="alert">
                            '.$this->session->flashdata('error_login').'
                        </div>
                    </div>
            ';} ?>
            <?php if(isset($_SESSION['success_Parent_account']) && $_SESSION['success_Parent_account']==1){ ?>
            <div class="form-login-error" style="display: block;"><p style="color: #fff;">Your Account Successfully Created Please Login.</p></div>
            <?php }unset($_SESSION['success_Parent_account']);if(isset($_SESSION['error']) && $_SESSION['error']=='1'){ ?>
            <div class="alert alert-danger" style="background: #f44336; padding: 10px; color: #fff !important;">
                <div class="form-login-error" style="display: block;"><h5>Invalid login</h5></div>
            </div>
            <?php }unset($_SESSION['error']);if(isset($_SESSION['error']) && $_SESSION['errors']=='1'){ ?>
            <div class="form-login-error" style="display: block;"><h5 style="color: red;">Only Student Allowed CNIC login</h5></div>
            <?php }unset($_SESSION['errors']);if(isset($_SESSION['error_restrict_login']) && $_SESSION['error_restrict_login']!=''){ ?>
            <div class="form-login-error" style="display: block;"><h5 style="color: red;">Account Access Blocked</h5></div>
            <?php }unset($_SESSION['error_restrict_login']); ?>
            
            
            <form action="<?php echo base_url(); ?>login/ajax_login" class="signin-form" method="post">
              <div class="row mb-3">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email / CNIC" required aria-label="Username" aria-describedby="basic-addon1">
                  </div> 
              </div>
              <div class="row mb-3">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"aria-hidden="true"></i></span>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required aria-label="Username" aria-describedby="basic-addon1"  autocomplete="on">
                  </div> 
              </div>
              <button type="submit" class="btn btn-primary" id="btn-login" name="post">Login</button> <a href="<?php echo base_url(); ?>forgot-password" class="btn btn-primary" id="btn-forgotpwd">Forgot Password</a>
            </form>
          </div>
 

        </div>
      </div>
    </div>
    
    <footer class="footer-main"> 
     <div class="footer-top py-3">
      <div class="container ">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-5  text-sm-start text-md-center text-lg-end d-none ">
            
            <img src="https://indiciedu.com.pk/frontend/wp-content/uploads/2021/01/indici-edu-logo-SVG.svg" class="indici-edu-ftr-logo">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12  text-sm-start  text-md-center text-lg-start  text-white text-center">
            
            
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
    


<script>
    function putvalue() {
        "admin" == $("#menu1").val()
            ? ($("#email").val("admin@gminns.com"), $("#password").val("gminns"))
            : "principal" == $("#menu1").val()
            ? ($("#email").val("principal@gminns.com"), $("#password").val("gminns"))
            : "teacher" == $("#menu1").val()
            ? ($("#email").val("teacher@gminns.com"), $("#password").val("gminns"))
            : "parent" == $("#menu1").val()
            ? ($("#email").val("parent@gminns.com"), $("#password").val("gminns"))
            : "student" == $("#menu1").val()
            ? ($("#email").val("student@gminns.com"), $("#password").val("gminns"))
            : ($("#email").css("border", "2px solid red"), $("#password").css("border", "2px solid red"), $("#email").val(""), $("#password").val(""));
    }
    $(function () {
        $("#slideshow > div:gt(0)").hide(),
            setInterval(function () {
                $("#slideshow > div:first").fadeOut(2e3).next().fadeIn(2200).end().appendTo("#slideshow");
            }, 8850);
    });
    
    
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  </body>
</html>
<?php } ?>