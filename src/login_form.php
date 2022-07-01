<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   <style>
     body{
       background-image:url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000');
       background-repeat:no-repeat;
       weidth:100%;
       height:100%;
     }
   </style>

</head>

<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-md-9 col-lg-6 col-xl-6 my-lg-5 py-lg-5">
      <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid"
        alt="Sample image"> -->
    </div>
    <div class="col-md-8 col-lg-6 col-xl-5 offset-xl-1 my-lg-5 py-lg-5 ">
      <form class="container shadow-lg ">
        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
          <p class="lead fw-normal mb-0 me-3">Sign in</p>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="email" class="form-control form-control-lg" placeholder="Enter a valid email address">
          <span id="email_span" style="color:red;">*required</span>
          <!-- <label class="form-label" for="email" style="margin-left: 0px;">Email address</label> -->
          <div class="form-notch">
            <div class="form-notch-leading" style="width: 9px;"></div>
            <div class="form-notch-middle" style="width: 88.8px;"></div>
            <div class="form-notch-trailing"></div>
          </div>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-3">
          <input type="password" id="password" class="form-control form-control-lg" placeholder="Enter password">
          <span id="pass_span" style="color:red;">*required</span>
          <!-- <label class="form-label" for="password" style="margin-left: 0px;">Password</label> -->
          <div class="form-notch">
            <div class="form-notch-leading" style="width: 9px;"></div>
            <div class="form-notch-middle" style="width: 64px;"></div>
            <div class="form-notch-trailing"></div>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
          <!-- Checkbox -->
          <div class="form-check mb-0">
            <input class="form-check-input me-2" type="checkbox" value="" id="chkbox">
            <label class="form-check-label" for="chkbox">
              Remember me
            </label>
          </div>
          <a href="#!" class="text-body">Forgot password?</a>
        </div>

        <div class="text-center text-lg-start mt-4 pt-2">
          <button id="login_button" type="button" class="btn btn-primary btn-lg"
            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
          <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register_form.php"
              class="link-danger">Register</a></p>
        </div>

      </form>
    </div>
  </div>


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div> -->
        <div class="modal-body text-center">
          <h4 id="display_result" class="text-danger"></h4>
        </div>
        <div class="modal-footer">
          <button type="button" id="go_to_home" class="btn btn-primary" data-bs-dismiss="modal">close</button>
        </div>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function (){

      $("#email").keyup(function(){
                if(validateEmail()){
                  $("#email_span").html("<p class='text-success'>valid</p>");
                }
                else{
                  $("#email_span").html("<p class='text-danger'>invalid</p>");
                }
            });

            function validateEmail(){
                var mail=$("#email").val();
                var reg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(reg.test(mail)){
                  return true;
                }
                else{
                  return false;
                }
            }

      $("#password").keyup(function(){ 
            if(validatepass()){
                $("#pass_span").html("<p class='text-success'>validate</p>");
               }
               else{
                $("#pass_span").html("<p class='text-danger'>invalidate</p>");
               }
            });

            function validatepass(){
              var password =$("#password").val();
              if(password.length>7){
                return true;
              }
              else{
                return false;
              }
            }
            
      $(document).on("click", "#login_button", function (){
        mail = $("#email").val();
        pass = $("#password").val();
        if(mail.length>0 && pass.length>0){
        $.ajax({
          url: 'server_login.php',
          method: 'POST',
          data: { 'login_mail': mail, 'login_pass': pass, 'status': 1 },
          success: function (result) {
            console.log(result);
            //alert(result);
            if (result == "admin") {
              window.location = 'admin.php';
            }
            else if (result == 'user') { 
              window.location = 'index.php';
            }
            else{
              alert(result);
            }
          }
        });
      }
      else{
          if(mail.length == 0){ 
            $("#display_result").text("email field never be empty empty");
            }
            else{
              $("#display_result").text("password field never be empty");
            }
            $("#exampleModal").modal('show');
      }
      });
    });
  </script>
</body>

</html>