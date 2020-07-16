<?php

include("function/connection.php");
include("function/helper.php");

$level = "customer";
$status = "on";
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$password = password_hash($password, PASSWORD_DEFAULT);

mysqli_query($conn, "INSERT INTO user (level, nama, email, alamat, phone, password, status) 
        VALUES ('$level', '$name', '$email', '$address', '$phone', '$password', '$status')");


echo "add success";
echo "<meta http-equiv='refresh'
content='1; url=index.php?page=login'>";
