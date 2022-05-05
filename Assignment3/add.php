<?php
//including the database connection file
include_once("./config.php");
require_once("./FormSanitizer.php");
require_once("./Account.php");
require_once("./Constants.php");
// echo $con;
$account = new Account($con);


if (isset($_POST['submitButton'])) {
	$firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
	$lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
	$userName = FormSanitizer::sanitizeFormUserName($_POST["userName"]);
	$email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
	$country = FormSanitizer::sanitizeFormString($_POST["country"]);
	$state = FormSanitizer::sanitizeFormString($_POST["state"]);


 	$success = $account->register($firstName, $lastName, $userName, $email, $country, $state);  

	// if $success {
    //     //display success message 
    //     echo "<p class='text-success'>Data added successfully.</p>";
    //     echo "<br/><a href='index.php'>View Result</a>";
	// }
}
function getInputValue($name) {
	if (isset($_POST[$name])) {
		echo $_POST[$name];
	}
}
?>
<!DOCTYPE html>
<html lang ="en">
    <head>
        <title>
            Welcome To Streaming Site.
        </title>
        <link rel='stylesheet' type='text/css' href='./style.css'/>
    </head>
    <body>
        <div class = 'signInContainer'>
            <div class = 'column'>
                <div class = "header">
                <h3>
                        User Form
                    </h3>
                    <span>
                        Enter User's detail here
                    </span>


                </div>
                <form method = "POST">
					<?php echo $account->getError(Constants::$firstNameCharacters); ?>
                    <input type="text" name="firstName" placeholder = "First Name" value = "<?php getInputValue("firstName");?>"required>

                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
					<input type="text" name="lastName" placeholder = "Last Name" value = "<?php getInputValue("lastName");?>" required>
                    
                    <?php echo $account->getError(Constants::$userNameCharacters); ?>
                    <?php echo $account->getError(Constants::$userNameTaken); ?>
					<input type="text" name="userName" placeholder = "User Name" value = "<?php getInputValue("userName");?>" required>

                    <?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
					<input type="email" name="email" placeholder = "E-mail" value = "<?php getInputValue("email");?>" required>
                    
                    <?php echo $account->getError(Constants::$countryCharacters); ?>
					<input type="text" name="country" placeholder = "Country" required>
					<?php echo $account->getError(Constants::$stateCharacters); ?>
                    <input type="text" name="state" placeholder = "State" required>

                    <p>
                    <input type="submit" name="submitButton" value = "Finalize" >
                    <input type="reset" value = "Clear Form" >
                    </p>


                </form>
				<a href="./index.php" class = "Homepage">See entries. </a>

            </div>
        </div>
    </body>

</html>
