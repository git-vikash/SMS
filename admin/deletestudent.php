<?php
session_start();
if(!isset($_SESSION['admin_name'])){
    header('location:../login.php');
}
?>

<html>
    <head>
        <title>Delete Students </title>
        <style>
         
        </style>
    </head>
    <body >
    <center> <h1><?php echo $_SESSION['admin_name']; ?>! Delete Student Details</h1></center>
    <form method="POST" enctype="multipart/form-data" action="deletestudent.php" style="padding-top: 40px;padding-bottom: 40px; width: 400px;background-color:powderblue;color: blue; border: 1px solid grey;margin-left: auto;margin-right: auto;">
            <a href="admindash.php" style="float: left;padding-left: 0px;text-decoration: none;border: 0;background-color: black;color: yellow;padding: 8px;padding-left: 20px;padding-right: 20px;">Back</a>
           
            <a href="../logout.php" style="float: right;text-decoration: none;border: 0;background-color: black;color: yellow;padding: 8px;padding-left: 20px;padding-right: 20px;">Logout</a><br><br><br>
           
            <div style="padding-left: 50px;"> 
            Name :
            <input type="text" name="sname" placeholder="Enter name" required="required"><br><br>
            Standard:
            <input type="number" name="std" required="required"><br><br>
            <center> <input type="submit" name="submit" value="Search" style="border: 0;background-color: black;color: yellow;padding: 9px;padding-left: 20px;padding-right: 20px;">
                 </center>
            </div>
    </form>
    
       
    
<?php
if(isset($_POST['submit'])){
    
    include '../dbcon.php';
$name = $_POST['sname'];
$standard=$_POST['std'];

$sql= "SELECT * FROM `student` WHERE `name` LIKE '%$name%' AND `standard` = '$standard'";
$run= mysqli_query($con, $sql); 
?>
<table style="width:80%;border: 1px solid black;background-color: greenyellow;" align='center' >
    <tr>  <th >No.</th>
        <th >Name</th>
        <th >Standard</th>
        <th >Image</th>
        <th >Edit</th>
    </tr>
    <?php

if(mysqli_num_rows($run)<1){?>
    <tr style="background-color: red; color:yellow;width: 20%;">
        <td style="padding:20px;"colspan="5"><center> <?php echo '<h2>No record found!</h2>';?></center></td>
    </tr> <?php
}
else{     
   
    $count=0;
    while ($data= mysqli_fetch_assoc($run)) {
        $count++;
    
        ?>
    <tr >
        <td ><center><?php echo $count; ?></center></td>
        <td ><center><?php echo $data['name']; ?></center></td>
        <td ><center><?php echo $data['standard']; ?></center></td>
        <td ><center><img src="../studentimage/<?php echo $data['image']; ?>" style="max-height: 80px;min-height: 50px;"></center></td>
<td ><center><a href="delete.php?sid=<?php echo $data['id'];?>" style="text-decoration: none;">Delete</a></center></td>
    </tr>
        <?php
    }
}

    
}

?>
</table>
</body>
</html>