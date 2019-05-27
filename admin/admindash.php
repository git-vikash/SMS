<?php

session_start();


if(isset($_SESSION['admin_name'])){
    
}
 else {
    header('location:../login.php');    
}

?>
 
<html>
    <head><title>Dashboard</title>
        <style>
            .nav{background-color: dodgerblue;
            padding: 10px;
            margin: 2.8%;
            width: 25%;
            text-align: center;
            
            }
           a{ color: yellow;
            text-decoration: none;
            font-weight: bold;}
           
        </style>
    </head>
    <body><center> <h1>Welcome <?php echo $_SESSION['admin_name']; ?> ! to Admin Dashboard</h1></center>
        
        <div style="padding-top: 40px;padding-bottom: 40px; width: 400px;background-color:powderblue;color: blue; border: 1px solid grey;margin-left: auto;margin-right: auto;height: 250px;">
            <a href="../login.php" style="float: left;padding-left: 0px;text-decoration: none;border: 0;background-color: black;color: yellow;padding: 8px;padding-left: 20px;padding-right: 20px;">Back</a>
           
            <a href="../logout.php" style="float: right;text-decoration: none;border: 0;background-color: black;color: yellow;padding: 8px;padding-left: 20px;padding-right: 20px;">Logout</a><br><br><br>
           
            
    <center>
       
        <div class="nav">
            <a href="addstudent.php">Add New Student</a>
        </div>
        <div class="nav">
            <a href="updatestudent.php">Update Student Detail</a>
        </div>
        <div class="nav">
            <a href="deletestudent.php">Remove Student</a>
        </div>
       
    </center></div>
    </body>
</html>