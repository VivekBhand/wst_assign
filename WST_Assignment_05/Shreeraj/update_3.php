<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title> form</title>
<style>
table, th, td {
  border: 1px solid;
  width:100%;
  text-align: center;
}

<?php
include 'gallary_style.css';
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
  if (!$conn) {
      echo "<script> Connection failed:".$conn->connect_error."<script>";
  }
  
  $a = "'".$_GET['type']."'";
  $sql = "SELECT * FROM users WHERE email = $a";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  echo '<div class="card" style="height: 700px; width: 600px;">';
      echo '<div class="container">';
      echo '<img src="./'.$row['img'].'" height="140" width="120"></img>';
      //echo '<img src="\D:\xampp\htdocs\New_Assign\p1.png" height="140" width="120"></img>';
      echo '<h2><p>'. $row["fname"]. " " . $row["lname"]. '</p></h2><br>';
      echo '<table style="border: 2px; border-color: black;">';
      echo '<tr>';
      echo '<td><h3>Userid</td>';
      echo '<td><h3><p style="opacity:0.7;">'.$row["uname"].'</p></td>';

      echo '</tr><tr>';
      echo '<td><h3>Email</td>';
      echo '<td><h3><h3><p style="font-weight :normal;">'.$row["email"].'</p></td>';
      echo '</tr><tr>';
      echo '<td><h3>Address</td>';
      echo '<td><h3><p style="font-weight :normal;">'.$row["state"]. ", " . $row["country"].'</p></td>';
      echo '</tr><tr>';
      echo '<td><h3>Mob. No.</td>';
      echo '<td><h3><p style="font-weight :normal;">'.$row["mobile"].'</p></td>';
      echo '</tr><tr>';
      echo '<td><h3>Education</td>';
      echo '<td><h3><p style="font-weight :normal;">'.$row["Education"].'</p></td>';
      echo '</tr><tr>';
      echo '<td><h3>Interest</td>';
      echo '<td><h3><p style="font-weight :normal;">'.$row["interest"].'</p></td>';
      echo '</tr><tr>';
      echo '<td><h3>Skill</td>';
      echo '<td><h3><p style="font-weight :normal;">'.$row["skill"].'</p></td>';
      echo '</tr><tr>';
      echo '<td><h3>Upvote</td>';
      echo '<td><h4>'.$row["upvote"].'</td>';
      echo '</tr><tr>';
      echo '<td><h3>Downvote</td>';
      echo '<td><h4>'.$row["downvote"].'</p></td>';
      echo '</tr><tr>';
      echo '<td><h3>Gallary</td>';
      echo  '<td><h4> <a href="gallary.php"> BACK </a></td>';
      echo "</table>";
      echo '</div>';
      echo '</div>';