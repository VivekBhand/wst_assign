<?php 

	include_once("./config.php");
	// include_once("./upload.php");
	// echo var_dump($con);
	$query =  $con->prepare("SELECT * from users ORDER BY upvotes DESC, firstName ASC");
	// echo var_dump($query);
	$query->execute();
	// echo var_dump($query);
	if(isset($_POST["upvoteButton"])) {
		// echo $_POST['uN'];
        $query1 =  $con->prepare("UPDATE users SET upvotes=upvotes+1 WHERE userName =:userName");
	// echo var_dump($query);
		$query1->bindValue(':userName',$_POST['uN']);
		$success =  $query1->execute();
		return $success;
    }
	if(isset($_POST["downvoteButton"])) {

        $query1 =  $con->prepare("UPDATE users SET upvotes=upvotes-1 WHERE userName =:userName");
	// echo var_dump($query);
		$query1->bindValue(':userName',$_POST['uN']);
		$success =  $query1->execute();
		return $success;
    }
	
    
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="./style.css">
	<title>HOME</title>
 </head>
 <body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">WELCOME</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="add.php">Home <span class="sr-only">(current)</span></a>
      </li>
  </div>
</nav>

<div>
	
		<?php 
		while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
			// echo var_dump($res);
				echo "<form method = 'POST'>";
				echo "<div class='card'>";
				echo "<div class='container'>";
				echo '<img src="/'.$res['img'].'" height="140" width="120"></img>';
				echo "<h4><b>".$res['firstName']." ".$res['lastName']."</b></h4><br>";
				// echo "<p>".$res['userName']."<p>";
				echo "<p>".$res['email']."<p>";
				echo "<p>".$res['country']."<p>";
				echo "<p>".$res['state']."<p>";
				echo "<p> Upvotes : ".$res['upvotes']."<p>";
				echo '<input class="uN" type="text" name="uN" value='. $res['userName'].'>';
				
				echo "<div>";
				echo '<input class ="vote" type="submit" name="upvoteButton" value= "UPVOTE">';
				echo '<input class ="vote" type="submit" name="downvoteButton" value="Downvote">';
				echo "</div>";
				echo "</div>";
				echo "</div>";
				echo '</form>';

		}	
		 ?>
</div>
 </body>
 </html>