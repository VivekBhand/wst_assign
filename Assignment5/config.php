

<?php
    ob_start(); 
    //output buffering
    //waits till all php is completed exec before show
    try {
        $name = "wst_assign5";
        // $host = 'localhost';
        // $port = '80';
        $con = new PDO("mysql:dbname=$name;host=localhost","root",""); 
        //PDO = phpDataObject
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    }
    catch (PDOException $e) {
        exit("Connection Failed: " . $e->getMessage());
    }
?>
