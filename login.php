<?php 
session_start();

if(isset($_SESSION['admin_name'])){
   // header('location:admin/admindash.php'); 
}
 
 
?> 


<html>
    <head>
        <title>Login | Admin</title>
    </head>
    <body><center><h2>Admin Login</h2></center>
    <div style="background-color: powderblue;border: 2px solid black;width: 250px;padding-left: 60px;padding-bottom: 10px; margin-left: auto;margin-right: auto ;margin-top: 10px;">
            <form action="login.php" method="post" required >
            <div style="padding-left: 0px">
            <a href="index.php" style="float: left;text-decoration: none;border: 0;background-color: black;color: yellow;padding: 8px;padding-left: 20px;padding-right: 20px;">Back</a><br><br><br>
            </div>
            Name:<br>
            <input type="text" name="aname" placeholder="Enter your name"><br><br>
            Password:<br>
            <input type="password" name="apass" placeholder="Your password"><br><br>
            <input type="submit" name="submit" value="Login">
        </form>
    </div> 
    </body>
</html>


<?php

include 'dbcon.php';

if(isset($_POST['submit'])){
    $username=$_POST['aname'];
    $password=$_POST['apass'];
    
    $qry="SELECT * FROM admin WHERE adminName ='$username' AND password='$password'";
    $run = mysqli_query($con, $qry);
    
    
    
    $row= mysqli_num_rows($run);
    
   
    
    if($row<1){        
        ?>
    
        <script>
            alert('Admin Name or Password is incorrect!!');
            window.open('login.php','self');
        </script>
        <?php
        }
        else {
            $data = mysqli_fetch_assoc($run);
            $name=$data['adminName'];
            
            
            $_SESSION['admin_name']=$name;
            
            header('location:admin/admindash.php');
        }
    }

?>
