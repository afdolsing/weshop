<?php
    const BASE_URL = "http://localhost/weshop/";

    // fungsi untuk membuat koma di kolom harga
    function rupiah($defaultPrice = 0){
        $string = "Rp." . number_format($defaultPrice);
        return $string;
    }