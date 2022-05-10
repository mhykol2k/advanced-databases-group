<?php
    $servername = "localhost";
    $username = "default_user";
    $password = "password";
    $dbname = "assignment";
    // Create the connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>