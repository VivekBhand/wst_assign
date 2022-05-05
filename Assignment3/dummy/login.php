<?php
    require_once("./FormSanitizer.php");
    require_once("./Account.php");
    require_once("./Constants.php");

    require_once("./config.php");
    
    $account = new Account($con);
    
    if(isset($_POST["submitButton"])) {
        $userName = FormSanitizer::sanitizeFormString($_POST["userName"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

        $success = $account->login($userName, $password);
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
                            Sign In
                    </h3>
                    <span>
                        to continue to our site
                    </span>


                </div>
                <form method = "POST">
                    
                    <?php echo $account->getError(Constants::$loginFailed); ?>
            
                    <input type="text" name="userName" placeholder = "User Name" value = "<?php getInputValue("userName");?>" required>
                    <input type="password" name="password" placeholder = "Password" required>

                    <input type="submit" name="submitButton" value = "Log In" >

                </form>

                <a href="./register.php" class = "signInMessage">Need an account ? Sign Up here. </a>
            </div>
        </div>
    </body>

</html>
