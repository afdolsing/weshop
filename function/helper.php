<?php
    const BASE_URL = "http://localhost/weshop/";
    

    // fungsi untuk membuat koma di kolom harga
    function rupiah($defaultPrice = 0){
        $string = "Rp." . number_format($defaultPrice);
        return $string;
    }

    function category($categoryId = false){ 
        global $conn;
        $string  = "<div id='menu-category'>";
            $string .= "<ul>";
                    $query = mysqli_query($conn, "SELECT * FROM kategori WHERE status='on'");

                    while($row = mysqli_fetch_assoc($query)){
                        if($categoryId == $row['kategori_id']){
                            $string .= "<li><a href='" . BASE_URL . "index.php?category_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
                        } else{
                            $string .= "<li><a href='" . BASE_URL . "index.php?category_id=$row[kategori_id]'>$row[kategori]</a></li>";
                        }
                        
                    }
            $string .= "</ul>";
        $string .= "</div>";
        return $string;
    }