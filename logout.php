<?php

session_start();

unset($_SESSION['user_id']);
unset($_SESSION['user_id']);
unset($_SESSION['user_id']);

// biar tambah hancur
session_destroy();

header("location: index.php");