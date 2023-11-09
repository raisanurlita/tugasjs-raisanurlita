<?php
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_POST["id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$created_at = date('Y-m-d h:i:s');

$result = mysqli_query($conn, "INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `created_at`) VALUES ('$id', '$first_name', '$last_name', '$email', '$phone', '$address', '$created_at');");



header("Location:index.php");
