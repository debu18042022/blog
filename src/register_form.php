<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Regiter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  </head>
  <style>
    body{
      background-image:url('https://images.unsplash.com/photo-1553095066-5014bc7b7f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80')
    }
  </style>
<body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
<!-- <div class="card text-black" style="border-radius: 25px;"> -->
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mt-4 text-light">Sign up</p>

                 <form class="shadow-lg"> 
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="namebox" class="form-control" placeholder="name"><span id="name_span" style="color:red;">*required</span>
                        <!-- <label class="form-label" for="namebox" style="margin-left: 0px;">Your Name</label> -->
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 71.2px;"></div><div class="form-notch-trailing"></div></div></div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" id="emailbox" class="form-control" placeholder="E-mail">
                        <span id="email_span" style="color:red;">*required</span>
                     
                        
                        <!-- <label class="form-label" for="emailbox" style="margin-left: 0px;">Your Email</label> -->
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 69.6px;"></div><div class="form-notch-trailing"></div></div></div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="passwordbox" class="form-control" placeholder="password"><span id="pass_span" style="color:red;">*required</span>
                        <!-- <label class="form-label" for="passwordbox" style="margin-left: 0px;">Password</label> -->
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64px;"></div><div class="form-notch-trailing"></div></div></div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="repasswordbox" class="form-control"
                        placeholder="confirm password"><span id="repass_span" style="color:red;">*required</span>
                        <!-- <label class="form-label" for="repasswordbox" style="margin-left: 0px;">Repeat your password</label> -->
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 136px;"></div><div class="form-notch-trailing"></div></div></div>
                    </div>

                    <!-- <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" value="" id="check_box">
                      <label class="form-check-label" for="check_box">
                        I agree all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div> -->

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="button" class="btn btn-primary btn-lg">Register</button>
                    </div>

                  </form>
                  <!-- </div> -->
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image"> -->

                </div>
              </div>
            </div>
          <!-- </div> -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div> -->
        <div class="modal-body text-center">
          <div><i class="bi bi-cart-x danger" style="font-size:5rem"></i></div>
          <h4>Email already Exist</h4>
        </div>
        <div class="modal-footer">
          <button type="button" id="go_to_home" class="btn btn-success" data-bs-dismiss="modal">close</button>
        </div>
      </div>
    </div>
  </div>

        <script>
         $(document).ready(function(){
            $("#namebox").keyup(function(){
               $("#name_span").hide();
               
            });
            $("#emailbox").keyup(function(){
                if(validateEmail()){
                  $("#email_span").html("<p class='text-success'>valid</p>");
                }
                else{
                  $("#email_span").html("<p class='text-danger'>invalid</p>");
                }
            });

            function validateEmail(){
                var mail=$("#emailbox").val();
                var reg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(reg.test(mail)){
                  return true;
                }
                else{
                  return false;
                }
            }

            $("#passwordbox").keyup(function(){
               
               if(validatepass()){
                $("#pass_span").html("<p class='text-success'>validate</p>");
               }
               else{
                $("#pass_span").html("<p class='text-danger'>invalidate</p>");
               }
            });

            function validatepass(){
              var password =$("#passwordbox").val();
              if(password.length>7){
                return true;
              }
              else{
                return false;
              }
            }
            $("#repasswordbox").keyup(function(){
               $("#repass_span").hide();
            });
           
            $("button").click(function(){
              // alert($("#namebox").val());
               var name=$("#namebox").val();
               var mail=$("#emailbox").val();
               var password =$("#passwordbox").val();
               var repeat_passwod = $("#repasswordbox").val();
              // alert(repeat_passwod);
              // console.log(name+mail+password+repeat_passwod);
              if(name.length>0 && mail.length>0 && password.length>0 &&  repeat_passwod.length>0){       
                if(password==repeat_passwod){
                    $.ajax({
                        url:"server_login.php",
                        method:"POST",
                        data:{'u_name':name,'u_mail':mail,'u_pass':password,'r_pass':repeat_passwod,'status':0},
                        success:function(result){
                            console.log(result);
                            if(result=='exist'){
                              // alert("exist");
                              $("#exampleModal").modal('show');
                            }else{
                              window.location='login_form.php'; 
                            }                
                        }
                    });
                }
                else{
                  alert('password not match');
                }
              }
              else{
                if(name.length==0){ alert ("name filed cannot be empty");}
                else if(mail.length==0){ alert ("email filed cannot be empty");}
                else{ alert ("password filed cannot be empty");}
              }
            });
        });
</script>



</body>
</html>