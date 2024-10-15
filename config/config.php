<?php 
    // host
    define("HOST", "localhost");

    // database name
    define("DBNAME", "coffee-blend");

    // user
    define("USER", "root");

    // pass
    define("PASS", "");

    // The way that we create object in PHP
    $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";", USER, PASS);

    if ($conn == true) {
        echo "Connected";
    } else {
        echo "Error";
    }
