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
$password2 = $_POST['password2'];

// hilangkan variabel password di url
unset($_POST['password']);
unset($_POST['password2']);
// ubah variabel post ke bentuk url
$dataForm = http_build_query($_POST);
// validasi email
$emailValidation = mysqli_query($conn, "SELECT * FROM user WHERE email ='$email'");
// cek apakah field ada yang kosong
if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($password)) {
        header("location:" . BASE_URL . "index.php?page=register&notif=require&$dataForm");
} elseif (mysqli_num_rows($emailValidation) == 1) {
        header("location:" . BASE_URL . "index.php?page=register&notif=email&$dataForm");
} elseif ($password != $password2) {
        header("location:" . BASE_URL . "index.php?page=register&notif=password&$dataForm");
} else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO user SET 
                level = '$level',
                nama = '$name',
                email = '$email',
                alamat = '$address',
                phone = '$phone',
                password = '$password_hash',
                status = '$status'");
}

echo "add success";
echo "<meta http-equiv='refresh'
content='1; url=index.php?page=login'>";
