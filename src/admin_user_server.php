<?php
include 'connection.php';
    if(isset($_POST['show'])){
        $sql = "SELECT * FROM Users";
        $result = mysqli_query($conn,$sql);
        if($result){
            $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
            // echo "<pre>";
            // var_dump($row);
            // echo "</pre>";
        }
        else{
            echo mysqli_error($conn);
        }
        $text ='<thead>
                <tr class="text-dark bg-warning">
                    <!-- <th scope="col"><input class="form-check-input" type="checkbox"></th> -->
                    <th scope="col">user_id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">password</th>
                    <th scope="col">role</th>
                    <th scope="col">status</th>
                    <th scope="col">user_type</th>
                    <th scope="col">action</th>
                </tr>
               </thead>';
        for($i=0;$i<count($row);$i++){
            $text.='<tbody>
                        <tr>
                        <td>'.$row[$i]['user_id'].'</td>
                        <td>'.$row[$i]['name'].'</td>
                        <td>'.$row[$i]['email'].'</td>
                        <td>'.$row[$i]['password'].'</td>
                        <td>'.$row[$i]['role'].'</td>
                        <td>
                            <select name="" class="change_status" id='.$row[$i]['user_id'].'>
                                <option value="" selected disabled>'.$row[$i]['status'].'</option>';
                                if($row[$i]['status']=='denied'){
                                    $text.='<option value="approved">approved</option>';
                                }
                                else{
                                    $text.='<option value="denied">denied</option>';
                                }
                            $text.='</select>
                        </td>
                        <td>
                            <select name="" class="change_user_type" id='.$row[$i]['user_id'].'>
                                <option value="">'.$row[$i]['user_type'].'</option>';
                                if($row[$i]['user_type']=='reader'){
                                    $text.=' <option value="write">write</option>';
                                }
                                else{
                                    $text.='<option value="reader">reader</option>';
                                } 
                            $text.='</select>
                        </td>
                        <td><a class="btn btn-sm btn-primary" href="">Delete</a></td>                   
                        </tr>
                    </tbody>';
        }
        echo $text;
    }

    if(isset($_POST['id'])){
        $status = $_POST['status'];   
        $user_id = $_POST['id'];      
        $sql = "UPDATE Users SET status = '".$status."' WHERE Users.user_id = ".$user_id;
        $result = mysqli_query($conn,$sql);
        if($result){
           // echo "update successfull";
            $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
            echo $row;
        }
        else{
            echo mysqli_error($conn);
        }
    }

    if(isset($_POST['user_type_id'])){
        // echo "hello";
        $status = $_POST['status'];
        $user_id = $_POST['user_type_id'];
        $sql = "UPDATE Users SET user_type = '".$status."' WHERE Users.user_id = ".$user_id;
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "update successfull";
            //$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        else{
            echo mysqli_error($conn);
        }
    }
?>
