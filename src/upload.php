<?php
session_start();
include 'connection.php';
    if(isset($_FILES['my_image'])){
        $title = $_POST['my_title'];
        $comment = $_POST['my_comment'];
        echo $title;
        echo $comment;

        $target_dir = "image/";
        $target_file = $target_dir . basename($_FILES["my_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["my_image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["my_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["my_image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["my_image"]["name"])). " has been uploaded.";
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
        }
        // echo($user_id = $_SESSION['id']);
        var_dump($user_id = $_SESSION['id']);

        $sql = "INSERT INTO `Post`(`post_title`, `post_statement`, `post_date`,`image`,`user_id`,`post_status`) VALUES ('$title','$comment',now(),'$target_file','$user_id','approved')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "inserted";
        }
        else{
            echo "not inserted";
        }
    }

    if(isset($_POST['check_login'])){
        if(!isset($_SESSION['id'])){
            echo "0";
        }
        else{
            echo "1";
        }
    }


?>