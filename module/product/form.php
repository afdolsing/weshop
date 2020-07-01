<?php

$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : false;

$product = "";
$status = "";
$button = "Add";

if ($product_id) {
    $query = mysqli_query($conn, "SELECT * FROM barang WHERE barang_id='$product_id'");
    $row = mysqli_fetch_assoc($query);

    $category = $row['kategori'];
    $status = $row['status'];
    $button = "Update";
}

?>
<form action="<?php echo BASE_URL . "module/category/action.php?product_id=$product_id"; ?>" method="POST">

    <div class="element-form">
        <label>Product</label>
        <span>
            <select name="category_id">
                <?php 
                    $query = mysqli_query($conn, "SELECT * FROM kategori WHERE status = 'on'");
                    while($row = mysqli_fetch_assoc($query)){
                        echo "<option value='$row[kategori]'>$row[kategori]</option>";
                    }
                    
                ?>
            </select>
        </span>

    </div>

    <div class="element-form">
        <label>Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if ($status == "on") {
                                                                echo "checked='true'";
                                                            } ?> /> On
            <input type="radio" name="status" value="off" <?php if ($status == "off") {
                                                                echo "checked='true'";
                                                            } ?> /> Off
        </span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="<?= $button ?>" /></span>
    </div>

</form>