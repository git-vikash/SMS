<?php

 include '../dbcon.php';
    
    $studentroll=$_POST['sroll'];
    $studentname=$_POST['sname'];
    $studentstd=$_POST['std'];
    $studentcity=$_POST['scity'];
    $studentpcontact=$_POST['pcontact'];
    $studentid=$_POST['sid'];
    
    $studentimage=$_FILES['simage']['name'];
    $tempimage=$_FILES['simage']['tmp_name'];
    
    move_uploaded_file($tempimage, "../studentimage/$studentimage");
   
    $sql="UPDATE `student` SET `roll` = '$studentroll', `name` = '$studentname', `standard` = '$studentstd', `city` = '$studentcity', `pcontact` = '$studentpcontact',`image`='$studentimage' WHERE `student`.`id` = $studentid;";
   
    $run = mysqli_query($con, $sql);
    
 if($run==TRUE){       
    ?>
    <script>
        
       window.open('edit.php?sid=<?php echo $studentid;?>','_self');
       alert('Data updated successfully');
    </script>   
    
    <?php  
    /* header('location:edit.php?sid=<?php echo $studentid;?>');
   */
    }
    
    

?>