<?php
const BASE_URL = "http://localhost/weshop/";

$arrayOrderStatus[0] = "waiting for payment";
$arrayOrderStatus[1] = "payment is being validated";
$arrayOrderStatus[2] = "paid out";
$arrayOrderStatus[3] = "payment declined";
// fungsi untuk membuat koma di kolom harga
function rupiah($defaultPrice = 0)
{
    $string = "Rp." . number_format($defaultPrice);
    return $string;
}

function category($categoryId = false)
{
    global $conn;
    $string  = "<div id='menu-category'>";
    $string .= "<ul>";
    $query = mysqli_query($conn, "SELECT * FROM kategori WHERE status='on'");

    while ($row = mysqli_fetch_assoc($query)) {
        if ($categoryId == $row['kategori_id']) {
            $string .= "<li><a href='" . BASE_URL . "index.php?category_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
        } else {
            $string .= "<li><a href='" . BASE_URL . "index.php?category_id=$row[kategori_id]'>$row[kategori]</a></li>";
        }
    }
    $string .= "</ul>";
    $string .= "</div>";
    return $string;
}

// digunakan di my_profile.php
function adminOnly($module, $level)
{
    // agar user tidak mengakses module melalui url
    if ($level != "superadmin") {
        // modul pages yang hanya bisa diakses oleh admin
        $admin_pages = array("category", "product", "city", "user", "banner");
        // variabel modul di url memiliki nilai yang sama dengan salah satu array admin_pages
        if (in_array($module, $admin_pages)) {
            header("location:" . BASE_URL);
        }
    }
}
