<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>

    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

  </head>
  <body>
    <div class="m-5">
      <div class="row">
        <div><h3>Title</h3></div>
        <div><textarea class="fw-bold fs-5 text-capitalize border-3" name="p_title" id="p_title" cols="71" rows="2"></textarea></div>
      </div>
      <div class="row">
        <div><h3>CONTENT</h3></div>
        <div><textarea class="fw-light text-capitalize border-3" name="p_title" id="p_comment" cols="100" rows="16" placeholder="Start Writing Here"></textarea></div>
      </div>
      <div class="row pt-3">
        <form id="submit_form">
          <div class="form_group">
            <label for="">Select Image</label>
            <input type="file" name="file_to_upload" id="upload_file"/>
            <input type="submit" name="upload_button" id="upload_btn" value="Upload"/>
          </div>
        </form>
      </div>
    </div>

    <script>
      $("#submit_form").on("submit", function (e) {
          e.preventDefault();
          var title = $("#p_title").val();
          var comment = $("#p_comment").val();
          alert(comment);
          var image = $("#upload_file")[0].files;
          // alert(image);
          // if(title.length>0 && )
          var formData = new FormData(this);
          formData.append("my_image", image[0]);
          formData.append("my_title", title);
          formData.append("my_comment", comment);
          $.ajax({
            url: "upload.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(result){
              console.log(result);
              //display_blog();
              window.location='index.php';
            },
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