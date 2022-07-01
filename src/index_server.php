<?php
    session_start();
    // if(!isset($_SESSION['status'])){
    //     $user_id = $_SESSION['id'];
    //     $sql = "SELECT status FROM Users WHERE user_id ='$user_id'";
    //     $result = mysqli_query($conn,$sql);
    //     $row = mysqli_fetch_all($result,MYSQLI_ASSOC);     
    // }

    include 'connection.php';

    if(isset($_POST['blog_data'])){
        display();
    }
    function display(){
        include 'connection.php';
        $sql ="SELECT Post.post_id,Post.post_title,Post.post_statement,Post.post_date,Post.image,Post.user_id,Post.post_status,Users.name,Users.status FROM Post INNER JOIN Users ON Post.user_id=Users.user_id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
       
        // echo "<pre>";
        // var_dump($row);
        // echo "</pre>";
        if($result){
           // echo "fetch data successfully";
        }
        else{
            echo "data is not successfully fetched";
        }

        $text="";
        for($i=0;$i<count($row);$i++){
            if($row[$i]['status']=='approved'){
                if($row[$i]['post_status']=='approved'){
                    $text.="<div class='row g-0 pt-5'>
                                <div class='col-md-6'>
                                    <a href='blogdetails.php?user_id=".$row[$i]['user_id']."&post_id=".$row[$i]['post_id']."' type='button' class='clickable_image' id=".$row[$i]['post_id']."><img src=".$row[$i]['image']." class='img-fluid rounded-start' alt='...'></a>
                                </div>
                                <div class='col-md-6'>
                                    <div class='card-body'>
                                        <span><i class='bi bi-person-circle text-muted' style='font-size:2rem;'id='blog_person'></i></span><span class='ps-1'>".$row[$i]['name']."</span>
                                        <p class='card-text'><small class='text-muted' id='blog_date'></small>".$row[$i]['post_date']."</p>
                                        <h5 class='card-title py-3' id='blog_title'>".$row[$i]['post_title']."</h5>
                                        <div class='statement_blog'>
                                        <p class='card-text' id='blog_statement'>".substr($row[$i]['post_statement'],0,200)."...</p>
                                        </div>
                                        
                                        <hr>
                                        <p class='text-muted'>0 comments</p>
                                    </div>
                                </div>
                            </div>";
                }
            }
        }
        echo $text;
    }
  
?>