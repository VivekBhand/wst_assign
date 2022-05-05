<?php

    class Account {

        private $con;

        private $errorArray = array();

        public function __construct($con) {
            $this->con = $con;
            // assign con to this instance
        }

        public function register($fn, $ln, $un, $em, $coun, $sta) {
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateUserName($un);
            $this->validateEmail($em);
            $this->validateCountry($coun);
            $this->validateState($sta);
            if (empty($this->errorArray)) {

                // if error array is empty then we would return Query execeution
                // then according to execution it will return True or False
                return $this->insertUserDetails($fn, $ln, $un, $em, $coun, $sta);
            }
            
            return false;
        }

        private function insertUserDetails($fn, $ln, $un, $em, $coun, $sta) {

            $query  = $this->con->prepare("INSERT INTO users (firstName, lastName, userName, email, country, state)
                                            VALUES (:fn, :ln, :un, :em, :coun, :sta);");
            $query->bindValue(":fn",$fn);
            $query->bindValue(":ln",$ln);
            $query->bindValue(":un",$un);
            $query->bindValue(":em",$em);
            $query->bindValue(":coun",$coun);
            $query->bindValue(":sta",$sta);

            // // for debugging
            // $query->execute();
            return $query->execute();

        }
        private function validateFirst() {
            echo "
            <script>
            function validateForm() {
                let x = document.forms['submit']['firstName'].value;
                if (x.len() < 2  || x.len() > 25) {
                <?php 
                array_push($this->errorArray, Constants::$firstNameCharacters);
                ?>
                return false;
                }
            }
            </script>";
        }
        private function validateLast() {
            echo "
            <script>
            function validateForm() {
                let x = document.forms['submit']['firstName'].value;
                if (x.len() < 2  || x.len() > 25) {
                <?php 
                array_push($this->errorArray, Constants::$firstNameCharacters);
                ?>
                return false;
                }
            }
            </script>";
        }
        

        private function validateUserName($un) {
            if (strlen($un) < 2  || strlen($un) > 25 ) {
                array_push($this->errorArray, Constants::$userNameCharacters);
                return;
            }
            $query = $this->con->prepare("SELECT * FROM users WHERE username=:un");
            $query->bindValue(":un",$un);       //secure against SQL injection

            $query->execute();
            if ($query->rowCount() != 0) {
                array_push($this->errorArray, Constants::$userNameTaken);
            }
        }
        private function validateEmail($em) {

            if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }

            $query = $this->con->prepare("SELECT * FROM users WHERE email=:em");
            $query->bindValue(":em",$em);       //secure against SQL injection

            $query->execute();
            if ($query->rowCount() != 0) {
                array_push($this->errorArray, Constants::$emailTaken);
            }
        }
        private function validateCountry($coun) {
            if (strlen($coun) < 2  || strlen($coun) > 25 ) {
                array_push($this->errorArray, Constants::$countryCharacters);
            }
        }
        private function validateFirstName($fn) {
            if (strlen($fn) < 2  || strlen($fn) > 25 ) {
                array_push($this->errorArray, Constants::$firstNameCharacters);
            }
        }
        private function validateLastName($ln) {
            if (strlen($ln) < 2  || strlen($ln) > 25 ) {
                array_push($this->errorArray, Constants::$lastNameCharacters);
            }
        }private function validateState($sta) {
            if (strlen($sta) < 2  || strlen($sta) > 25 ) {
                array_push($this->errorArray, Constants::$stateCharacters);
            }
        }
        public function getError($error) {
            if (in_array($error, $this->errorArray)) {
                return "<span class='errorMessage'>$error</span>";
            }
        }
    }


?>