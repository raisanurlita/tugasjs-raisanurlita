<?php
include 'koneksi.php';

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];

$result = mysqli_query($conn, "UPDATE `customer` SET `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email', `phone` = '$phone', `address` = '$address' WHERE `id` = '$_GET[id]'");


header("Location:index.php");
