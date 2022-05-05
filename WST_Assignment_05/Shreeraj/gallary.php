<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Students data</title>
<style>
<?php
include 'gallary_style.css';
?>
</style>
</head>

<body>
<nav id="navbar">
        <div id="student">
        <ul>
            <li>Shreeraj Custom App</li>
            <li><a href="get_post.php">Apply</a></li>
            <li><a href="gallary.php">Gallary</a></li>
        </ul>
    </div>
</nav>
<?php
session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "assign_5";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    echo "<script> Connection failed:".$conn->connect_error."<script>";
}

$sql = "SELECT * FROM users order by upvote desc, downvote , uname";
$result = mysqli_query($conn, $sql);
$i = 1;
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    if(!strcmp('"'.$row["email"].'"',$_SESSION['mail'])) {
      echo '<div class="card">';
      echo '<div class="container">';
      echo '<img src="./'.$row['img'].'" height="140" width="120"></img>';
      //echo '<img src="\D:\xampp\htdocs\New_Assign\p1.png" height="140" width="120"></img>';
      echo '<h2><p>'. $row["fname"]. " " . $row["lname"]. '</p></h2><br>';
      echo '<h3><p style="opacity:0.7;">'.$row["uname"].'</p>';
      echo '<h3><p style="font-weight :normal;" id='.$i.'>email : '.$row["email"].'</p>';
      echo '<h3><p style="font-weight :normal;">'.$row["state"]. ", " . $row["country"].'</p>';
      echo  '<h4> <a href="update_3.php?type='.$row['email'].'"> More info</a>';
      echo '</div>';
      echo '</div>';
    }
    else{
      echo '<div class="card">';
      echo '<div class="container">';
      echo '<img src="./'.$row['img'].'" height="140" width="120"></img>';
      //echo '<img src="\D:\xampp\htdocs\New_Assign\p1.png" height="140" width="120"></img>';
      echo '<h2><p>'. $row["fname"]. " " . $row["lname"]. '</p></h2><br>';
      echo '<h3><p style="opacity:0.7;">'.$row["uname"].'</p>';
      echo '<h3><p style="font-weight :normal;" id="'.$i.'">email : '.$row["email"].'</p>';
      echo '<h3><p style="font-weight :normal;">'.$row["state"]. ", " . $row["country"].'</p>';
      echo '<h4> <a id="'.$i.'" href="update_1.php?type='.$row['email'].'"> upvote</a><p>'.$row["upvote"].'</p>';
      echo '<h4> <a id="'.$i.'" href="update_2.php?type='.$row['email'].'"> downvote</a><p>'.$row["downvote"].'</p>';
      echo  '<h4> <a href="update_3.php?type='.$row['email'].'"> More info</a>';
      echo '</div>';
      echo '</div>';
    }
    $i = $i + 1;
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
</body>
</html>