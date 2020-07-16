<?php

$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : false;

$category = "";
$status = "";
$button = "Add";

if($category_id){
    $queryCategory = mysqli_query($conn, "SELECT * FROM kategori WHERE kategori_id='$category_id'");
    $row = mysqli_fetch_assoc($queryCategory);
    
    $category = $row['kategori'];
    $status = $row['status'];
    $button = "Update";
}

?>
<form action="<?php echo BASE_URL."module/category/action.php?category_id=$category_id"; ?>" method="POST">

<div class="element-form">
    <label>Category</label>
    <span><input type="text" name="category" value="<?= $category ?>" /></span>
</div>

<div class="element-form">
    <label>Status</label>
    <span>
        <input type="radio" name="status" value="on" <?php if($status == "on"){ echo "checked='true'"; } ?> /> On
        <input type="radio" name="status" value="off" <?php if($status == "off"){ echo "checked='true'"; } ?> /> Off
    </span>
</div>	

<div class="element-form">
    <span><input type="submit" name="button" value="<?= $button ?>" /></span>
</div>

</form>