<?php

require "function/connection.php";
require "function/helper.php";

$email = $_POST['email'];
$password = $_POST['password'];

// cek email
$query = mysqli_query($conn, "SELECT * FROM user WHERE email ='$email' AND status = 'on'");

if(mysqli_num_rows($query) == 0){
        header("location:" . BASE_URL . "index.php?page=login&notif=true");
}else{
    $row = mysqli_fetch_assoc($query);
    if( password_verify($password, $row['password'])){
        //set session
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['name'] = $row['nama'];
        $_SESSION['level'] = $row['level'];

        // jika sudah ada pesanan
        if(isset($_SESSION['process_order'])){
            header("location:" . BASE_URL . "index.php?page=data_order");
        }else{
            header("location:" . BASE_URL . "index.php?page=my_profile&module=orders&action=list");
        }
    } else {
        // jika password salah
        header("location:" . BASE_URL . "index.php?page=login&notif=true");
    }
}
