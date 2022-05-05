

<?php
    ob_start(); 
    //output buffering
    //waits till all php is completed exec before show
    session_start();
    try {
        $name = "form_db";
        // $host = 'localhost';
        // $port = '80';
        $con = new PDO("mysql:dbname=$name;host=localhost","root","root"); 
        //PDO = phpDataObject
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    }
    catch (PDOException $e) {
        exit("Connection Failed: " . $e->getMessage());
    }
?>
