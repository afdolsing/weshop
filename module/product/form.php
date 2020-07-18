<?php
// ambil product_id dari url untuk di edit
$productId = isset($_GET['product_id']) ? $_GET['product_id'] : false;

$productName = "";
$categoryId = "";
$specification = "";
$image = "";
$stock = "";
$price = "";
$status = "";
$setImage = "";
// kirim button Add ke action.php dan exit
$button = "Add"; 
// jika ada product id di url -> ganti button menjadi update dan kirim ke action.php
if ($productId) {
    $query = mysqli_query($conn, "SELECT * FROM barang WHERE barang_id='$productId'");
    $row = mysqli_fetch_assoc($query);
    // dibawah ini produk yang akan diganti
    $productName = $row['nama_barang'];
    $categoryId = $row['kategori_id'];
    $specification = $row['spesifikasi'];
    $image = $row['gambar'];
    $price = $row['harga'];
    $stock = $row['stok'];
    $status = $row['status'];
    // ambil image dan tambahkan inline style css
    $image = "<img src='". BASE_URL . "images/products/$image' style='height: 200px;' >";
    $setImage = "(click choose file, if you want to change this image)";

    $button = "Update";    
}
?>

<script src="<?= BASE_URL . "js/ckeditor/ckeditor.js"?>"></script>

<form action="<?php echo BASE_URL . "module/product/action.php?product_id=$productId" ?>" method="POST" enctype="multipart/form-data">
    <div class="element-form">
        <label>Category</label>
        <span>
            <select name="category_id">
                <?php 
                    $query = mysqli_query($conn, "SELECT kategori_id, kategori FROM kategori WHERE status = 'on' ORDER BY kategori ASC");
                    while($row = mysqli_fetch_assoc($query)){
                        if($categoryId == $row['kategori_id']){
                            echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
                        }else{
                            echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                        }
                    }
                ?>
            </select>
        </span>

    </div>
    <div class="element-form">
        <label>Product Name</label>
        <span><input type="text" name="product_name" value="<?= $productName ?>" /></span>
    </div>
    <div style="margin-bottom:10px">
        <label style="font-weight:bold">Specification</label>
        <span><textarea name="specification" id="editor" rows="10"><?= $specification ?></textarea></span>
    </div>
    <div class="element-form">
        <label>Stock</label>
        <span><input type="text" name="stock" value="<?= $stock ?>" /></span>
    </div>
    <div class="element-form">
        <label>Price</label>
        <span><input type="text" name="price" value="<?= $price ?>" /></span>
    </div>
    <div class="element-form">
        <label>Image <?= $setImage ?></label>
        <span><input type="file" name="file_image"/><?= $image ?></span>
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

<script>
    CKEDITOR.replace("editor");
</script>