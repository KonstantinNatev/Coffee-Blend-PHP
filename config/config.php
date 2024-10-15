<?php 
    try {
        // host
        define("host", "localhost");

        // database name
        define("dbname", "coffee-blend");

        // port
        define("port", "3377");

        // user
        define("user", "root");

        // pass
        define("password", "");

        // The way that we create object in PHP
        $conn = new PDO("mysql:host=".host.";port=".port.";dbname=".dbname."", user, password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $Exception ) {
        echo $Exception->getMessage();
    }
