<?php 

include_once("./config.php");
// echo var_dump($con);
$query =  $con->prepare("SELECT * from users");
// echo var_dump($query);
$query->execute();
// echo var_dump($query);
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
				echo "<div class='card'>";
				echo "<div class='container'>";
				echo "<h4'><b>".$res['firstName']." ".$res['lastName']."</b></h4><br>";
				echo "<p'>".$res['userName']."<p>";
				echo "<p'>".$res['email']."<p>";
				echo "<p'>".$res['country']."<p>";
				echo "<p'>".$res['state']."<p>";
				echo "</div>";
				echo "</div>";

		}	
		 ?>
</div>
 </body>
 </html>