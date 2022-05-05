<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title> form</title>
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
    $dbname = "assign_5";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mail = $_POST['mail'];
        $mail = '"'.$mail.'"';
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM users WHERE email = $mail";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
         // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                if(!strcmp($row["pass"], $pass)) {
                    echo "<script>alert('login successful')</script>";
                    session_start();
                    $_SESSION['mail'] = $mail;
                    header("Location: gallary.php");
                }
                else{
                    echo "<script>alert('login not successful')</script>";
                }
            }
        }
    }
?>
<nav id="navbar">
        <div id="student">
        <ul>
            <li>Shreeraj Custom App</li>
            <li ><a href="login.html" id="apply" >Home</a></li>
            <li ><a href="get_post.php" id="gallary">SignUp</a></li>
        </ul>
    </div>
</nav>
<form name="form1" method="post" action="login_1.php">
        <center>    
        <div class="center">
        <div class="center1">
            <label for="mail">Email address</label><br>
            <input type="text" id="mail" name="mail" placeholder="Email address">
        </div>
        <div class="center1">
            <label for="pass">password</label><br>
            <input type="password" id="pass" name="pass" placeholder="password">
        </div>
        <input type="submit" value="Submit"> <input type="reset" value="Clear">    
        </div>
        </center>
  
</form>
</body>
</html>
