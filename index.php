<?php

@$http_client_ip=$_SERVER['HTTP_CLIENT_IP'];
@$http_forwarded_for=$_SERVER['HTTP_FORWARDED_FOR'];
$remote_addr = $_SERVER['REMOTE_ADDR'];

if(!empty($http_client_ip)){
    $ipaddress=$http_client_ip;
}
elseif (!empty($http_forwarded_for)) {
   $ipaddress=$http_forwarded_for;
}
elseif(!empty($remote_addr)){
    $ipaddress=$remote_addr;
}

echo $ipaddress;
?>




<html>
    <head>
        <title>Student Management System</title>
        <style>
            table,tr,td,th{ border:1px solid black;
                            border-collapse: collapse;
                }
                td,th{background-color: powderblue;}
                
        </style>
    </head>
    <body style="margin-top: 50px ;">
    <center>
        <h2>Welcome to Student Management System</h2>
        
        <form style="max-width: 50%;"action="index.php" method="post" required>
            <fieldset style="background-color: powderblue;margin-top: 50px;"><legend>Student Information</legend><br>
            Enter Roll Number:    
            <input type="number" name="sroll" placeholder="Enter roll no." required="required"><br><br>
            Choose standard:
            <input type="number" name="std" required="required" ><br><br>
            <!-- select>
                
                <option value="1">1st</option>
                <option value="2">2nd</option>
                <option value="3">3rd</option>
                <option value="4">4th</option>
                <option value="5">5th</option>
                <option value="6">6th</option>
                <option value="7">7th</option>
                <option value="8">8th</option>
            </select><br><br -->
            
            <input type="submit" name="submit" value="Show Info">
            </fieldset>
            
        </form>
        <div style="background-color: green;width: 130px ;padding: 0.5px;">
            <a href="login.php" style="text-decoration: none"><p style="color: yellow;">Admin Login </p></a>
        </div>
    

<?php 
if(isset($_POST['submit'])){
    include 'dbcon.php';
    
    $roll=$_POST['sroll'];
    $standard=$_POST['std'];
    
    $qry= "SELECT * FROM `student` WHERE `roll`='$roll' AND `standard` = '$standard'";
    $run = mysqli_query($con, $qry);
    
    if(mysqli_num_rows($run)<1){        
        ?>
        <script>
            alert('No Such Student Found!!');
           // window.open('.php','self');
        </script>
        <?php
        }
    else{
        $count=0;
        while($data = mysqli_fetch_assoc($run)){
        $count++; 
              
        ?>
        <table style="width:80%;border: 1px solid black;background-color: greenyellow;margin-top: 20px;" align='center'>
            <tr style="padding-bottom: 0px;"><th colspan="4"><h1>Student Details</h1></th></tr>
            <tr ><td rowspan="6" ><center><img src="studentimage/<?php echo $data['image']; ?>" style="max-height: 120px;min-height: 50px;"></center></td>
       
            <th colspan="2">No.</th>
            <td ><center><?php echo $count; ?></center></td>
        </tr>
        <tr ><th colspan="2">Roll Code</th>
            <td ><center><?php echo $data['roll']; ?></center></td>
        </tr>
        <tr ><th colspan="2">Name</th>
            <td ><center><?php echo $data['name']; ?></center></td>
        </tr>
        <tr ><th colspan="2">Standard</th>
            <td ><center><?php echo $data['standard']; ?></center></td>
        </tr>
        <tr ><th colspan="2">City</th>
            <td ><center><?php echo $data['city']; ?></center></td>
        </tr>
        <tr ><th colspan="2">Parent Contact</th>
            <td ><center><?php echo $data['pcontact']; ?></center></td>
        </tr>
       
             </table>
        <?php
        }
      }
    }
?>
        
        </center>
    </body>
</html>