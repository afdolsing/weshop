<div id="left">
    <duv id="menu-category">
        <ul>
            <?php 
                $query = mysqli_query($conn, "SELECT * FROM kategori WHERE status='on'");

                while($row = mysqli_fetch_assoc($query)){
                    if($categoryId == $row['kategori_id']){
                        echo "<li><a href='" . BASE_URL . "index.php?category_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
                    } else{
                        echo "<li><a href='" . BASE_URL . "index.php?category_id=$row[kategori_id]'>$row[kategori]</a></li>";
                    }
                    
                }
            ?>
        </ul>
    </duv>
</div>
<div id="right">
    <div id="slides">
        <?php 
            $queryBanner = mysqli_query($conn, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 3");
            while($rowBanner = mysqli_fetch_assoc($queryBanner)){
                echo "<a href='" . BASE_URL . "$rowBanner[link]'>
                <img src='" . BASE_URL . "images/slide/$rowBanner[gambar]' /></a>";
            }
        ?>
    </div>
    <div id="frame-product">
        <ul>
        <?php
            if($categoryId){
                $query = mysqli_query($conn, "SELECT * FROM barang WHERE status='on' AND kategori_id = '$categoryId' ORDER BY rand() DESC LIMIT 9");
            } else {
                $query = mysqli_query($conn, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");
            }
            $no = 1 ;

            while($row=mysqli_fetch_assoc($query)){
                // membuat style agar gambar ketiga pas di layar
                $style = false;
                if($no == 3){
                    $style = "style='margin-right:0px'";
                    //reset no
                    $no = 0;
                }
                echo "<li $style>
                        <p class='price'>" . rupiah($row['harga']) . "</p>
                        <a href='" . BASE_URL . "index.php?page=detail&product_id=$row[barang_id]'>
                            <img src='" . BASE_URL . "images/products/$row[gambar]'/>
                        </a>
                        <div class='caption'>
                            <p><a href='" . BASE_URL . "index.php?page=detail&product_id=$row[nama_barang]'>$row[nama_barang]</a></p>
                            <span>Stok : $row[stok]</span>
                        </div>
                        <div class='button-add-cart'>
                            <a href='".BASE_URL."add_cart.php?product_id=$row[barang_id]'>+ add to cart</a>
                        </div>
                        ";
                // tambahkan no -> 1
                $no++; 
            }
        ?>
        </ul>

    </div>
</div>