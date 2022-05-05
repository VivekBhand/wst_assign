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
  $sql = "UPDATE users SET downvote = downvote + 1 WHERE email = $a";
  $result = mysqli_query($conn, $sql);
  header("Location: gallary.php");  
?>