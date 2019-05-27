<?php
session_start();
if(!isset($_SESSION['admin_name'])){
    header('location:../login.php');
}



?>

<html>
    <head>
        <title>Add Students </title>
    </head>
    <body >
    <center> <h1><?php echo $_SESSION['admin_name']; ?> Add New Student Details</h1></center>
        <form method="POST" enctype="multipart/form-data" action="addstudent.php" style="padding-top: 40px;padding-bottom: 40px; width: 400px;background-color:powderblue;color: blue; border: 1px solid grey;margin-left: auto;margin-right: auto;">
            <a href="admindash.php" style="float: left;padding-left: 0px;text-decoration: none;border: 0;background-color: black;color: yellow;padding: 8px;padding-left: 20px;padding-right: 20px;">Back</a>
           
            <a href="../logout.php" style="float: right;text-decoration: none;border: 0;background-color: black;color: yellow;padding: 8px;padding-left: 20px;padding-right: 20px;">Logout</a><br><br><br>
           
            <div style="padding-left: 50px;"> 
            Roll No:
            <input type="number" name="sroll" placeholder="Enter Roll Number" ><br><br>
         
            Name :
            <input type="text" name="sname" placeholder="Enter name"><br><br>
            Standard:
            <input type="number" name="std"><br><br>
          
             City:
            <input type="text" name="scity"placeholder="Enter City Name"><br><br>
           
            Parent Contact Number:
            <input type="text" name="pcontact"placeholder="Enter Parent Number"><br><br>
          
            Student Photo:
            <input type="file" name="simage"  ><br><br>
            
            <center> <input type="submit" name="submit" value="Insert" style="border: 0;background-color: black;color: yellow;padding: 9px;padding-left: 20px;padding-right: 20px;">
                 </center>
            </div>
        </form>
    </body>
</html>
    
<?php


if(isset($_POST['submit'])){
    include '../dbcon.php';
    
    $studentroll=$_POST['sroll'];
 
    $studentname=$_POST['sname'];
    $studentstd=$_POST['std'];
    $studentcity=$_POST['scity'];
    $studentpcontact=$_POST['pcontact'];
    
    $studentimage=$_FILES['simage']['name'];
    $tempimage=$_FILES['simage']['tmp_name'];
    
    move_uploaded_file($tempimage, "../studentimage/$studentimage");
   
    $sql="INSERT INTO `student`(`roll`, `name`,`standard`, `city`, `pcontact`,`image`) VALUES ('$studentroll','$studentname','$studentstd','$studentcity','$studentpcontact','$studentimage')";
   
    $run = mysqli_query($con, $sql);
    
    
    if($run==TRUE){       
    ?>
    <script>
        alert('Data inserted successfully');
    </script>      
    <?php  
    }
} 
?>