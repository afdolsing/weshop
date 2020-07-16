<?php
    // jika sudah login -> $user_id ada di index 
    if($user_id){
        header("location:".BASE_URL);
    }
?>

<div class="container-user-access">
    <form action="<?= BASE_URL . "register_process.php" ?>" method="POST">
        <?php
            // field yang di isi ke register 
            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
            $name = isset($_GET['name']) ? $_GET['name'] : false;
            $email = isset($_GET['email']) ? $_GET['email'] : false;
            $phone = isset($_GET['phone']) ? $_GET['phone'] : false;
            $address = isset($_GET['address']) ? $_GET['address'] : false;
            // jika filed belum lengkap / password salah kembalikan ke register
            if($notif == "require"){
                echo "<div class='notif-require'>sorry, required is empty</div>";
            }elseif($notif == "email"){
                echo "<div class='notif-require'>sorry, your email has registered</div>";
            }elseif($notif == "password"){
                echo "<div class='notif-require'>sorry, your password is not same</div>";
            }
        ?>
        <div class="element-form">
            <label>Full Name</label>
            <span><input type="text" name="name" value="<?= $name ?>"></span>
        </div>
        <div class="element-form">
            <label>Email</label>
            <span><input type="text" name="email" value="<?= $email ?>"></span>
        </div>
        <div class="element-form">
            <label>Phone Number</label>
            <span><input type="text" name="phone" value="<?= $phone ?>"></span>
        </div>
        <div class="element-form">
            <label>Address</label>
            <span><textarea name="address" cols="30" rows="10"><?= $address ?></textarea></span>
        </div>
        <div class="element-form">
            <label>Password</label>
            <span><input type="password" name="password"></span>
        </div>
        <div class="element-form">
            <label>Re-Type Password</label>
            <span><input type="password" name="password2"></span>
        </div>
        <div class="element-form">
            <span><input type="submit" value="Register"></span>
        </div>
    </form>
</div>