<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Form Submission</title>
<style>
<?php
include 'style.css';
?>
</style>
</head>
<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "assign_5";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
      echo "<script>Connection failed:".$conn->connect_error."<script>";
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fname = $_POST['fname'];
        $fname = '"'.$fname.'"';
        $lname = $_POST['lname'];
        $lname = '"'.$lname.'"';
        $uname = $_POST['uname'];
        $uname = '"'.$uname.'"';
        $mail = $_POST['mail'];
        $mail = '"'.$mail.'"';
        $state = $_POST['state'];
        $state = '"'.$state.'"';
        $country = $_POST['country'];
        $country = '"'.$country.'"';
        $mobile = $_POST['mobile'];
        $mobile = '"'.$mobile.'"';
        $Education = $_POST['Education'];
        $Education = '"'.$Education.'"';
        $interest = $_POST['interest'];
        $interest = '"'.$interest.'"';
        $skill = $_POST['skill'];
        $skill = '"'.$skill.'"';
        $pass = $_POST['pass'];
        $pass = '"'.$pass.'"';
        $filename = $_FILES["img"]["name"];
        $dummyfilename = '"'.$filename.'"';
        $tempname = $_FILES["img"]["tmp_name"];
        //echo $tempname;    
        $folder = "D:/xampp/htdocs/WST_Assignment_05/Shreeraj/".$filename;
        //echo $folder;
        $sql = "INSERT INTO `users` (`fname`, `lname`, `uname`, `email`, `state`, `country`,`mobile`,`Education`, `interest`, `skill`, `pass`,`img`) VALUES ($fname, $lname, $uname, $mail, $state, $country, $mobile, $Education, $interest, $skill, $pass, $dummyfilename)";
        //echo $sql;
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
        //echo $msg;
        if($conn->query($sql) === TRUE) {
            echo '<script>alert("THANK YOU FOR CREATING ACCOUNT")</script>';

        } 
        else {
            echo "<script> Error :"  . $conn->error."</script>";
        }
    }
?>
<nav id="navbar">
        <div id="student">
        <ul>
            <li>Shreeraj Custom App</li>
            <li ><a href="login.html" id="apply" >Home</a></li>
            <li ><a href="login_1.php" id="gallary">Login</a></li>
        </ul>
    </div>
</nav>
<form name="form1" method="post" action="get_post.php" enctype="multipart/form-data">
        <center>    
        <div class="center">
        <div class="center1">
            <label for="fname">First name</label><br>
            <input type="text" id="fname" name="fname" placeholder="Enter first name">
        </div>
        <div class="center1">
            <label for="lname">Last name</label><br>
            <input type="text" id="lname" name="lname" placeholder="enter last name">
        </div>
        <div class="center1">
            <label for="uname">Username</label><br>
            <input type="text" id="uname" name="uname" placeholder="Username">
        </div>
        <div class="center1">
            <label for="mail">Email address</label><br>
            <input type="text" id="mail" name="mail" placeholder="Email address">
        </div>
        <div class="center1">
            <label for="state">State</label><br>
            <input type="text" id="state" name="state" placeholder="State">
        </div>
        <div class="center1">
            <label for="Country">Country</label><br>
            <input type="text" id="country" name="country" placeholder="Country Name">
        </div>
        <div class="center1">
            <label for="mobile">mobile number</label><br>
            <input type="text" id="mobile" name="mobile" placeholder="mobile number">
        </div>
        <div class="center1">
            <label for="Education">Highest Education</label><br>
            <input type="text" id="Education" name="Education" placeholder="Education">
        </div>
        <div class="center1">
            <label for="interest">interest</label><br>
            <input type="text" id="interest" name="interest" placeholder="interest">
        </div>
        <div class="center1">
            <label for="skill">skill</label><br>
            <input type="text" id="skill" name="skill" placeholder="skill">
        </div>
        <div class="center1">
            <label for="pass">password</label><br>
            <input type="password" id="pass" name="pass" placeholder="password">
        </div>
        <div class= "center1">
            <label for="img">Profile pic</label><br>
            <input type="file" name="img" value=""/>
        </div>
        <input type="submit" value="Submit" onclick="return validateform()"> <input type="reset" value="Clear">    
        </div>
        </center>
  
</form>
</body>
<script src="validate.js"></script>
</html>
