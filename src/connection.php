<?php
    $server_name='mysql-server';
    $user_name='root';
    $password='secret';
    $dbname='blog';

    //create connection
    $conn = mysqli_connect($server_name,$user_name,$password,$dbname); 

    if(!$conn){
       // echo "connection error".mysqli_connect_error();
    }
    else{
       // echo "connection successfull<br>";
    }
?>