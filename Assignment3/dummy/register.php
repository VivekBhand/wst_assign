<?php
    require_once("./FormSanitizer.php");
    require_once("./Account.php");
    
    require_once("./config.php");
    
    $account = new Account($con);

    if(isset($_POST["submitButton"])) {
        // $firstName = $_POST["firstName"];
        // echo $firstName;
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $userName = FormSanitizer::sanitizeFormUserName($_POST["userName"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        $success = $account->register($firstName, $lastName, $userName, $email, $email2, $password, $password2);
        if ($success) {
            //Store session
            $_SESSION["userLoggedIn"] = $userName;

            header("Location: index.php");
            // go to page index.php
        }
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
        <link rel='stylesheet' type='text/css' href='./assets/style/style.css'/>
    </head>
    <body>
        <div class = 'signInContainer'>
            <div class = 'column'>
                <div class = "header">
                <!-- logo generator : https://fontmeme.com/netflix-font/ -->
                <img src="https://fontmeme.com/permalink/220115/e0d53a67950603d6030cd7dca08c673c.png" title = "Logo" alt="notflix-logo" border="0">

                <h3>
                        Sign up
                    </h3>
                    <span>
                        to continue to our site
                    </span>


                </div>
                <form method = "POST">

                    <!-- PRints entries in error array -->
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
                    <?php echo $account->getError(Constants::$emailDontMatch); ?>
                    <input type="email" name="email2" placeholder = "Confirm E-mail" value = "<?php getInputValue("email2");?>" required>
                    
                    <?php echo $account->getError(Constants::$passwordLength); ?>
                    <input type="password" name="password" placeholder = "Password" required>
                    <?php echo $account->getError(Constants::$passwordDontMatch); ?>
                    <input type="password" name="password2" placeholder = "Confirm Password" required>

                    <input type="submit" name="submitButton" value = "Finalize" >

                </form>

                <a href="./login.php" class = "signInMessage">Already have an account ? Sign in here. </a>
            </div>
        </div>
    </body>

</html>
