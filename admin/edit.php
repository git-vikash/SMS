<?php

session_start();
if(!isset($_SESSION['admin_name'])){
    header('location:../login.php');
}
?>

<?php
include '../dbcon.php';
$studentid=$_GET['sid'];
$sql= "SELECT * FROM `student` WHERE `id`='$studentid'";
$run = mysqli_query($con, $sql);

$data= mysqli_fetch_assoc($run);
?>

<html>
    <head>
        <title>Edit Details </title>
    </head>
    <body >
    <center> <h1><?php echo $_SESSION['admin_name']; ?>! Edit Student Details</h1></center>
    <form method="POST" enctype="multipart/form-data" action="dataupdated.php" style="padding-top: 40px;padding-bottom: 40px; width: 400px;background-color:powderblue;color: blue; border: 1px solid grey;margin-left: auto;margin-right: auto;">
        <a href="updatestudent.php" style="float: left;padding-left: 0px;text-decoration: none;border: 0;background-color: black;color: yellow;padding: 8px;padding-left: 20px;padding-right: 20px;">Back</a>
           
            <a href="../logout.php" style="float: right;text-decoration: none;border: 0;background-color: black;color: yellow;padding: 8px;padding-left: 20px;padding-right: 20px;">Logout</a><br><br><br>
           
            <div style="padding-left: 50px;"> 
            Roll No:
            <input type="text" name="sroll" value="<?php echo $data['roll'];?>" ><br><br>
         
            Name :
            <input type="text" name="sname" value="<?php echo $data['name'];?>"><br><br>
            Standard:
            <input type="number" name="std" value="<?php echo $data['standard'];?>"><br><br>
          
             City:
             <input type="text" name="scity" value="<?php echo $data['city'];?>"><br><br>
           
            Parent Contact Number:
            <input type="text" name="pcontact" value="<?php echo $data['pcontact'];?>"><br><br>
          
            Student Photo:
            <input type="file" name="simage"  ><br><br>
            
            <input type="hidden" name="sid" value="<?php echo $data['id'];?>" >
            <center> <input type="submit" name="submit" value="Update" style="border: 0;background-color: black;color: yellow;padding: 9px;padding-left: 20px;padding-right: 20px;">
                <a href="admindash.php" style="text-decoration: none;border: 0;background-color: black;color: yellow;padding: 8px;padding-left: 20px;padding-right: 20px;">Dashboard</a><br><br><br>
           </center>
            </div>
        </form>
    </body>
</html>
    
