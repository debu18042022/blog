<?php 
    session_start();

    include 'connection.php';
    if(isset($_POST['status'])){
        $status = $_POST['status'];
        if($status==1){
            if(isset($_POST['login_mail'])){
                $loginmail = $_POST['login_mail'];
                $loginpwd = $_POST['login_pass'];
                $sql_login = "SELECT user_id,name,email,password,role from Users where email = '$loginmail'";
                $result = mysqli_query($conn,$sql_login);
                // if($result){
                //     echo "success";
                // }
                // else{
                //     echo mysqli_error($conn);
                // }

                $row = mysqli_fetch_assoc($result);
                
                if($row['email'] == $_POST['login_mail']){
                    if($row['password'] == $_POST['login_pass']){
                    // echo "login successfully";
                        if($row['role'] == 'admin'){
                            $_SESSION['name']='ADMIN';
                            $_SESSION['id']='101';
                            echo "admin";
                        }
                        elseif($row['role']=='user'){
                            $_SESSION['name']=$row['name'];
                            $_SESSION['id']=$row['user_id'];
                            //echo $_SESSION['id'];
                            echo "user";   
                        }
                    }
                    else{
                        echo "password doesnot match";
                    }
                }
                else{
                    echo "not registered yet";
                } 
            }
        }

        else{
            if(isset($_POST['u_name'])){
                $name = $_POST['u_name'];
                $email = $_POST['u_mail'];
                $password = $_POST['u_pass'];
                //echo $name.$email.$password;

                // $sql = "CREATE TABLE IF NOT EXISTS Users (
                //     user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                //     name VARCHAR(30) NOT NULL,
                //     email VARCHAR(50),
                //     password VARCHAR(50),
                //     role ENUM ('role','admin'))";

                // $result = mysqli_query($conn,$sql);
                // if($result){
                //     echo "created table successfully";
                // }
                // else{
                //     echo "table is not created";
                // }

                $sql1 ="SELECT email from Users where email = '$email'";
                
                $result1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_assoc($result1);
                if($row1['email']==$email){
                    echo "exist";
                }
                else{
                    $stmt ="INSERT INTO `Users`(`name`,`email`,`password`,`role`,`status`,`user_type`) 
                    VALUES ('$name','$email','$password','user','approved','writer')";
                     $result = mysqli_query($conn,$stmt);
        
                     // add a new user to the user table
                     if(!$result){
                       echo "the record was not inserted".mysqli_error($conn);
                     }
                     else{
                      echo "record inserted successfully";
                     }
                }
            }
        }
    }    
?>
