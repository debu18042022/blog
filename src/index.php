<?php
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />

    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <title>Blog</title>
  </head>

  <body>
    <div>
      <header class="p-3 pt-4 bg-dark text-white" height="200">
        <div class="container">
          <div
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"
          >
            <a
              href="#"
              class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none"
            >
              <svg
                class="bi me-2"
                width="40"
                height="32"
                role="img"
                aria-label="Bootstrap"
              >
                <use xlink:href="#bootstrap"></use>
              </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><img src="https://revenuearchitects.com/wp-content/uploads/2017/02/Blog_pic.png" alt="" height="50"></li>
              <li>
                <a href="#" class="nav-link px-2 text-white active">Home</a>
              </li>
              <!-- <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li> -->
              <li><a href="#" class="nav-link px-2 text-white">About</a></li>

              <?php
                  if(isset($_SESSION['id'])){
                  if(($_SESSION['name']!='ADMIN')){
                    echo '<li><a href="my_post.php" class="nav-link px-2 text-white">MY POSTS</a></li>';
                  }    
                }
              ?>

            </ul>
            
            
            <div class="text-end">
              <?php
                if(isset($_SESSION['id'])){
                  echo '<a type="button" class="btn btn-danger me-2" href="#" id="logout_button">log-out</a>';
                }
                else{
                  echo '<a type="button" class="btn btn-primary me-2" href="login_form.php">log-in</a>';
                }
              ?>
              <!-- <a href="register_form.php" type="button" class="btn btn-primary">Sign-up</a> -->
              <?php
                if(isset($_SESSION['name'])){ 
                  if($_SESSION['name']=='admin'){ ?>
                    <a href="admin.php" type="button" class="btn btn-primary"><?php echo $_SESSION['name'];?></a>
                 <?php }
                  else{ ?>
                    <span class="ps-2"><i class=' bi bi-person-circle text' style='font-size:2rem;'id='blog_person'></i></span><a class="ps-2" href="#" style="text-decoration:none;"><?php echo $_SESSION['name'];?></a>
               <?php   }
               } ?>
              <!-- <a href="register_form.php" type="button" class="btn btn-warning"></a> -->
            </div>
          </div>
        </div>
      </header>
    </div>

    <div>
      <div class="card bg-dark text-white border-0" style="border: none">
        <img src="https://images.unsplash.com/photo-1458682625221-3a45f8a844c7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80" class="card-img" alt="..." height="600"/>
        <div class="card-img-overlay text-center">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            This is a wider card with supporting text below as a natural lead-in
            to additional content. This content is a little bit longer.
          </p>
          <?php
          if($_SESSION['status']=='denied'){
                echo "<p class='card-text'>Last updated 3 mins ago</p>";
          }
          ?>
         
          <div>you have no longer to access data</div>
        </div>
      </div>
    </div>

    <!-- <a href="session_destroy.php">Destroy session</a> -->
    <div class="my-3 container">
      <div class="row">
        <div class="col-8">
          <a href="#">
            <img src="https://icon-library.com/images/blogging-icon/blogging-icon-27.jpg" alt="" width="200" >
            <!-- <h1>All Posts</h1> -->
          </a>
        </div>
        
        <div class="col-4">
          <a type="button" class="btn btn-info float-end" id="add_blog_btn">Add Blog</a>
        </div>
      </div>
    </div>

    <div class="container">
      <div
        class="card mb-3" style="max-width: 100%; border: 0" id="display"></div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script>
      $(document).ready(function () {
        display_blog();
        function display_blog() {
          $.ajax({
            url: "index_server.php",
            method: "POST",
            data: { blog_data: 1 },
            success: function (result) {
              console.log(result);
              $("#display").html(result);
              console.log(result);
            },
          });
        }


        $("#add_blog_btn").on("click", function () {
          //alert("hello");
          $.ajax({
            url: "upload.php",
            method: "POST",
            data: { check_login: 1 },
            success: function (result) {
              // alert(result);
              if (result == "0") {
                window.location = "login_form.php";
              } else {
                //location.href = "#write.php";
                window.location='write.php';
              }
            }
          });
        });

        $("#logout_button").on("click",function(){
          window.location='session_destroy.php';
        });

      });
    </script>
  </body>
</html>
