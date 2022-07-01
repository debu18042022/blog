<?php
    include 'connection.php';
    if(isset($_POST['post_data'])){
        //echo "hello";
         $sql = "SELECT * FROM Post";
         $result = mysqli_query($conn,$sql);
         if($result){
             $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
            //  echo "<pre>";
            //  var_dump($row);
            //  echo "</pre>";
         }
         else{
             echo mysqli_error($conn);
         }

         $text = '<thead>
         <tr class="text-dark bg-warning">                             
             <th scope="col">post_id</th>
             <th scope="col">post_title</th>
            
             <th scope="col">post_date</th>
             <th scope="col">user_id</th>
             <th scope="col">post_status</th>
             <th scope="col">action</th>
          
         </tr>
     </thead>';
         for($i=0;$i<count($row);$i++){
            $text.='<tbody>
            <tr>
              <td>'.$row[$i]['post_id'].'</td>
              <td>'.$row[$i]['post_title'].'</td> 
              <td>'.$row[$i]['post_date'].'</td>
              <td>'.$row[$i]['user_id'].'</td>
              <td>

                <select name="" id='.$row[$i]['post_id'].' class="change_post_status">
                    <option value="approved" selected disabled>'.$row[$i]['post_status'].'</option>';
                    if($row[$i]['post_status']=='approved'){
                        $text.='<option value="denied">denied</option>';
                    }
                    else{
                        $text.='<option value="approved">approved</option>';
                    }  
                    $text.='</select>
              </td>

              <td><a class="btn btn-sm btn-primary" href="blogdetails.php?post_id='.$row[$i]['post_id'].'&user_id='.$row[$i]['user_id'].'">Details</a></td>
                               
            </tr>
        </tbody> '; 
         }
         echo $text;
    }

    if(isset($_POST['post_id'])){
        $post_id = $_POST['post_id'];
        $post_status = $_POST['status_value'];
        $sql = "UPDATE Post SET post_status = '".$post_status."' where Post.post_id = ".$post_id;
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "successfully update";
        }
        else{
            echo mysqli_query($conn);
        }
    }
?>
