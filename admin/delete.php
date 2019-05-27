<?php

 include '../dbcon.php';
    
   $studentid=$_REQUEST['sid'];
    
   $sql="DELETE FROM `student` WHERE `id` = '$studentid';";
   
    $run = mysqli_query($con, $sql);
    
 if($run==TRUE){       
    ?>
    <script>
        
       window.open('deletestudent.php','_self');
       alert('Data Deleted successfully');
    </script>   
    
    <?php  
    /* header('location:edit.php?sid=<?php echo $studentid;?>');
   */
    }
    
    

?>