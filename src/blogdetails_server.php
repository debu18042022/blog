<?php
session_start();
 include 'connection.php';
if(isset($_POST['click_post_id'])){
        $userid = $_POST['click_user_id'];
        $postid = $_POST['click_post_id'];
        // echo $userid;
        // echo $postid;
        // $sql = "SELECT * from Post where post_id ='$postid'";
        $sql = "SELECT Users.status, Post.user_id,Post.post_id,Post.post_title,Post.post_statement,
        Post.post_date,Post.image FROM Users,Post WHERE Post.post_id='$postid' and 
        Post.user_id=Users.user_id";
        $result = mysqli_query($conn,$sql);
        if($result){
          //  echo "successfull";
            $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        else{
            echo mysqli_error($conn);
        }
        // echo "<pre>";
        // var_dump($row);
        // echo "</pre>";
        //display($row);
        if(!isset($_SESSION['status']))
        {
            $_SESSION['status']=$row[0]['status'];
        }
        if($_SESSION['status']=='approved'){
            display($row);
        }
        else{
            header('location:./index.php');
        }
}


function display($row){
    $text="";
        for($i=0;$i<count($row);$i++){
            

    $text.='<div class="pb-5 ps-5 pe-5 pt-4 pb-5 mt-5" style=" border: 1px solid grey;">
                <div class="pt-2 pb-4 row">
                    <div class="col-9 ">
                        <span class="pe-4" col><i class="bi bi-person-circle text-muted" style="font-size:2rem"></i></span><span>'.$row[$i]['post_date'].'</span>
                    </div>';
                    if($_SESSION['id']==$row[$i]['user_id']){
                        $text.='<div class="col-3 ">
                            <a id='.$row[$i]['post_id'].' class="edit_blog" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil ms-4" style="font-size:2rem;"></i></a>
                            <a id='.$row[$i]['post_id'].' class="delete_blog"><i class="bi bi-trash ms-4" style="font-size:2rem;"></i></a>
                        </div>';
                    }
                    else if($_SESSION['id']=='101'){
                        $text.='<div class="col-3 ">
                        <a id='.$row[$i]['post_id'].' class="delete_blog"><i class="bi bi-trash ms-4" style="font-size:2rem;"></i></a>
                    </div>';
                    }
                    else{
                        $text.='<div class="col-3 ">
                            <a id='.$row[$i]['post_id'].' class="edit_blog" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil ms-4" style="font-size:2rem;" hidden></i></a>
                            <a id='.$row[$i]['post_id'].' class="delete_blog"><i class="bi bi-trash ms-4" style="font-size:2rem;" hidden></i></a>
                        </div>';
                    }    
                $text.='</div>
                <div class="pb-4">
                    <h1 class="card-title" style="font-family:Lucida Console, Courier New,monospace;">'.$row[$i]['post_title'].'</h1>
                </div>
                <img src='.$row[$i]['image'].' class="card-img-top" alt="..." style="height:30rem;"/>
                <div class="pt-5 pb-5">
                    <p class="card-text text-muted">'.$row[$i]['post_statement'].'</p>
                </div>
                <div><hr>
                <a href=""class="pe-5"><i class="bi bi-facebook" style="font-size:1.5rem"></i></a>
                <a href=""class="pe-5"><i class="bi bi-twitter" style="font-size:1.5rem"></i></a>
                <a href=""class="pe-5"><i class="bi bi-linkedin"style="font-size:1.5rem"></i></a>
                </div>
            </div>';
        }
       echo $text;
    }


if(isset($_POST['show_all_post_user'])){
    $user_id = $_POST['show_all_post_user'];
    $sql = "SELECT * FROM `Post` where `user_id` ='$user_id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // echo "<pre>";
    // var_dump($row);
    // echo "</pre>";
    display($row);
}

if(isset($_POST['delete_post_id'])){
    echo "hello";
    $p_id = $_POST['delete_post_id'];
    $sql ="DELETE FROM Post WHERE post_id = $p_id";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "true";
    }
    else{
        echo "false";
        echo mysqli_error($conn);
    }
}

if(isset($_POST['edit_post_id'])){
    $postid = $_POST['edit_post_id'];
    //echo($postid);
    $sql ="SELECT * FROM `Post` WHERE `post_id` = '$postid'";
    $result = mysqli_query($conn,$sql);
    if($result){
        //echo "successfull";
       $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
    //    echo "<pre>";
    //    var_dump($row);
    //    echo "</pre>";
       echo json_encode($row);
     }
    else{
        echo mysqli_error($conn);
    } 
}

if(isset($_POST['p_id'])){
    
    $p_id = $_POST['p_id'];
    $p_title = $_POST['p_title'];
    $p_statement = $_POST['p_comment'];
    // $sql = "UPDATE Post SET post_title = $p_title, post_statement = $p_statement,
    //        post_date = now() WHERE post_id = $p_id";
    $sql = "update Post set post_title = '".$p_title."', post_statement = '".$p_statement."', post_date = now() where post_id = ".$p_id;
    $result = mysqli_query($conn,$sql);
    if($result){
        // echo "successfull update data";
    }
    else{
         echo mysqli_error($conn);
    } 
}

?>