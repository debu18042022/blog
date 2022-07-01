<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"/>

      <!-- jquery cdn -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"></script>
    <title>blog_details</title>
  </head>
  <body>

  <div class="pb-5">
      <header class="p-3 bg-dark text-white">
        <div class="container">
          <div
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"
          >
            <a
              href="/"
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

            <ul
              class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"
            >
            <li><img src="https://revenuearchitects.com/wp-content/uploads/2017/02/Blog_pic.png" alt="" height="50"></li>
              <li>
              <li>
                <a href="index.php" class="nav-link px-2 text-white active">Home</a>
              </li>
              <!-- <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li> -->
              <!-- <li><a href="#" class="nav-link px-2 text-white show_button">Show All</a></li> -->
              <!-- <li><a href="#" class="nav-link px-2 text-white">About</a></li> -->

            </ul>

            <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
              <input
                type="search"
                class="form-control form-control-dark"
                placeholder="Search..."
                aria-label="Search"
              />
            </form> -->

            <div class="text-end">
            <?php
                if(isset($_SESSION['id'])){
                  echo '<a type="button" class="btn btn-danger me-2" href="#" id="logout_button">log-out</a>';
                }?>
              <!-- <a
                type="button"
                class="btn btn-outline-light me-2"
                href="login_form.php"
                >Login</a
              >
              <button type="button" class="btn btn-warning">Sign-up</button> -->
              <?php
                if(isset($_SESSION['name'])){ 
                  if($_SESSION['name']=='admin'){ ?>
                    <span class="ps-2"><i class=' bi bi-person-circle text' style='font-size:2rem;'id='blog_person'></i></span><a class="ps-2" href="#" style="text-decoration:none;"><?php echo $_SESSION['name'];?></a>
                 <?php }
                  else{ ?>
                    <span class="ps-2"><i class=' bi bi-person-circle text' style='font-size:2rem;'id='blog_person'></i></span><a class="ps-2" href="#" style="text-decoration:none;"><?php echo $_SESSION['name'];?></a>
               <?php   }
               } ?>
            </div>
          </div>
        </div>
      </header>
    </div>


    <div class="container">
      <div class="card mb-3" id="display" style="border:0;"></div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

     <div class="m-5">
        <div class="row">
          <!-- <input type="text" id="p_id"> -->
            <div><h3>Title</h3></div>
            <div><textarea class="fw-bold fs-5 text-capitalize border-3" name="p_title" id="p_title" cols="25" rows="2"></textarea></div>
        </div>
        <div class="row">
            <div><h3>CONTENT</h3></div>
            <div><textarea class="fw-light text-capitalize border-3" name="p_title" id="p_comment" cols="35.5" rows="16" placeholder="Start Writing Here"></textarea></div>
        </div>
      </div>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="update">Update</button>
      </div>
    </div>
  </div>
</div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script>
      $(document).ready(function(){
        display_all();
        function display_all(){$.ajax({
          url:'my_post_server.php',
          method:'POST',
          data:{"mypost":1},
          success:function(result){
            //alert(result);
            console.log(result);
            $("#display").html(result);
          }
        })}

        $("#display").on("click",".delete_blog",function(){
         // alert($(this).attr('id'));
          let post_id =$(this).attr('id');
          $.ajax({
            url:'my_post_server.php',
            method:'POST',
            data:{'delete_post_id':post_id},
            success:function(result){
              //alert(result);
              display_all(); 
            }
          });
        });

        $("#display").on("click",".edit_blog",function(){
          let post_id =$(this).attr('id');
          //alert(post_id);
          $.ajax({
            url:'my_post_server.php',
            method:'POST',
            data:{'edit_post_id':post_id},
            success:function(result){
              let post = JSON.parse(result);
              //console.log(post);
              $("#p_title").val(post[0]['post_title']);
              $("#p_comment").val(post[0]['post_statement']);
              $("#p_id").val(post[0]['post_id']);
            }
          });
        });

        $(document).on("click","#update",function(){
          let post_id =  $("#p_id").val();
          let post_title =  $("#p_title").val();
          let post_comment =  $("#p_comment").val();
          console.log(post_title+""+post_comment);
          $.ajax({
            url:'my_post_server.php',
            method:'POST',
            data:{'p_id':post_id, 'p_title':post_title, 'p_comment':post_comment},
            success:function(result){
              console.log(result);
              $("#p_title").val('');
              $("#p_comment").val('');
              display_all();
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
