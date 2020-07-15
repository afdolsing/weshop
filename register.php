<div class="container-user-access">
    <form action="<?= BASE_URL . "register_process.php" ?>" method="POST">
        <div class="element-form">
            <label>Full Name</label>
            <span><input type="text" name="name"></span>
        </div>
        <div class="element-form">
            <label>Email</label>
            <span><input type="text" name="email"></span>
        </div>
        <div class="element-form">
            <label>Phone Number</label>
            <span><input type="text" name="name"></span>
        </div>
        <div class="element-form">
            <label>Address</label>
            <span><textarea name="address" cols="30" rows="10"></textarea></span>
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
            <span><button type="submit">Register</button></span>
        </div>
    </form>
</div>