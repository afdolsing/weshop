<?php 
    // jika sudah login
    if($userId){
        $module = isset($_GET['module']) ? $_GET['module'] : false;
        $action = isset($_GET['action']) ? $_GET['action'] : false;
        $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
    }else{
        // jika belum login, kembalikan ke login
        header("location:".BASE_URL."index.php?page=login");
    }
?>
<!-- semua transaksi ada di file ini -->
<div id="bg-page-profile">
    <div id="menu-profile">
        <ul><?php
                // ambil level dari index
                if($level == "superadmin") : ?>
                    <li>
                        <a <?php if($module == "category") {echo "class='active'";} ?>
                        href="<?= BASE_URL."index.php?page=my_profile&module=category&action=list" ?>">Category</a>
                    </li>
                    <li>
                        <a <?php if($module == "product") {echo "class='active'";} ?>
                        href="<?= BASE_URL."index.php?page=my_profile&module=product&action=list" ?>">Product</a>
                    </li>
                    <li>
                        <a <?php if($module == "city") {echo "class='active'";} ?>
                        href="<?= BASE_URL."index.php?page=my_profile&module=city&action=list" ?>">City</a>
                    </li>
                    <li>
                        <a <?php if($module == "user") {echo "class='active'";} ?>
                        href="<?= BASE_URL."index.php?page=my_profile&module=user&action=list" ?>">User</a>
                    </li>
                    <li>
                        <a <?php if($module == "banner") {echo "class='active'";} ?>
                        href="<?= BASE_URL."index.php?page=my_profile&module=banner&action=list" ?>">Banner</a>
                    </li>
            <?php endif ?>
            <li>
                <a <?php if($module == "orders") {echo "class='active'";} ?>
                href="<?= BASE_URL."index.php?page=my_profile&module=orders&action=list" ?>">Orders</a>
            </li>
        </ul>
    </div>
    <div id="profile-content">
        <?php 
            $file = "module/$module/$action.php";
            if(file_exists($file)){
                include($file);
            }else{
                echo "<h3>Sorry, page not found</h3>";
            }
        ?>
    </div>
</div>