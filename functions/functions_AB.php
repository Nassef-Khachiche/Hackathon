<?php

function dbConnect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "leergeld";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $conn->select_db($dbname);
    return $conn;
}




?>