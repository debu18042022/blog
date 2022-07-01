<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

    <title>Admin</title>
  </head>
  <body>

   <div>
      <header class="p-3 text-white bg-dark" style="color:grey;">
        <div class="container">
          <div
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a
              href="/"
              class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg
                class="bi me-2"
                width="40"
                height="32"
                role="img"
                aria-label="Bootstrap">
                <use xlink:href="#bootstrap"></use>
              </svg>
            </a>

            <ul
              class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><img src="https://revenuearchitects.com/wp-content/uploads/2017/02/Blog_pic.png" alt="" height="50"></li>
              <li>
                <a href="index.php" class="nav-link px-2 text-white active">Home</a>
              </li>
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

              <!-- <a type="button" class="btn btn-outline-light me-2" href="login_form.php">Login</a>
              <a href="register_form.php" type="button" class="btn btn-warning">Sign-up</a> -->
            </div>
          </div>
        </div>
      </header>
    </div>

  <div class="row">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light col-3 bg-info" style="width: 280px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Admnin Dashboard</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <!-- <li class="nav-item">
          <a href="index.php" class="nav-link" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
            Home
          </a>
        </li> -->
        <!-- <li>
          <a href="#" class="nav-link link-dark">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
            Dashboard
          </a>
        </li> -->
        <li>
          <a href="admin.php" class="nav-link link-dark">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
            Users
          </a>
        </li>
        <li>
          <a href="admin_post.php" class="nav-link link-dark">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
            Posts
          </a>
        </li>
        <!-- <li>
          <a href="#" class="nav-link link-dark">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
            Customers
          </a>
        </li> -->
      </ul>
      <hr>
    
    </div>
    <div class='col-9'>
      <div class="pt-4 px-4 bg-info">
          <div class="bg-light text-center rounded p-4">
              <!-- <button class="mb-0 me-5 Users">Users</button>
                  <button class="mb-0 me-5 Products" class="products">prducts</button>
                  <button class="mb-0 me-5 Orders" class="Orders">Orders</button> -->
              <div class="d-flex align-items-center justify-content-between mb-4">
                  <h6 class="mb-0 fw-bolder">POSTS</h6>
                  <!-- <a class='btn btn-outline-dark ms-1 bg-primary' href="users.php">Show All</a> -->
              </div>
              <div class="table-responsive">
                  <table class="table text-start align-middle table-bordered table-hover mb-0 display_table">
                      
                  </table>
              </div>
          </div>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function(){
      display_users();
      function display_users(){
        $.ajax({
          url:'admin_user_server.php',
          method:'POST',
          data:{'show':1},
          success:function(result){
            console.log(result);
            //alert(result);
            $(".display_table").html(result);
          }
        });
      }

      $(document).on("change",'.change_status',function(){
       // console.log($(this).val());
        var value = $(this).val();
        //alert($(this).attr('id'));
        $(this).attr('id');
        var user_id = $(this).attr('id');
        $.ajax({
          url:'admin_user_server.php',
          method:'POST',
          data:{'id':user_id, 'status':value},
          success:function(result){
            console.log(result);
            display_users();
          }
        });
      });

      $(document).on("change",'.change_user_type',function(){
      alert($(this).val());
        var value = $(this).val();
        console.log($(this).attr('id'));
        var user_id = $(this).attr('id');
        $.ajax({
          url:'admin_user_server.php',
          method:'POST',
          data:{'user_type_id':user_id, 'status':value},
          success:function(result){
            console.log(result);
            display_users();
          }
        });
      });

      $("#logout_button").on("click",function(){
          window.location='session_destroy.php';
        });

    });
  </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>