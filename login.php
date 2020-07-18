<?php
    // jika sudah login -> $user_id ada di index,hilangkan file register
    if($userId){
        header("location:".BASE_URL);
    }
?>

<div class="container-user-access">
    <form action="<?= BASE_URL . "login_process.php" ?>" method="POST">
        <?php
            // field yang di isi ke register 
            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
            // jika filed belum email / password salah kembalikan ke register
            if($notif == true){
                echo "<div class='notif-require'>sorry, your email or password is wrong</div>";
            }
        ?>
        <div class="element-form">
            <label>Email</label>
            <span><input type="text" name="email"></span>
        </div>
        <div class="element-form">
            <label>Password</label>
            <span><input type="password" name="password"></span>
        </div>
        <div class="element-form">
            <span><input type="submit" value="Login"></span>
        </div>
    </form>
</div>