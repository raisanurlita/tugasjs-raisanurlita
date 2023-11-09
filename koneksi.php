<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "kampus_merdeka";
$conn = new mysqli($hostName, $userName, $password, $dbName);

if ($conn) {
    // echo "connected";
} else {
    echo "not connected";
}
