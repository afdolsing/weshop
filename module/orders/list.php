<?php

if($level == "superadmin"){
    $queryOrders = mysqli_query($conn, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");
}else{
    $queryOrders = mysqli_query($conn, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id='$userId' ORDER BY pesanan.tanggal_pemesanan DESC");
}

if(mysqli_num_rows($queryOrders) == 0){
    echo "<h3>Saat ini belum ada data pesanan</h3>";
}
else{

    echo "<table class='table-list'>
            <tr class='baris-title'>
                <th class='kiri'>Nomor Pesanan</th>
                <th class='kiri'>Status</th>
                <th class='kiri'>Nama</th>
                <th class='kiri'>Action</th>
            </tr>";
    
    $adminButton = "";
    while($row=mysqli_fetch_assoc($queryOrders)){
        if($level == "superadmin"){
            $adminButton = "<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=orders&action=status&order_id=$row[pesanan_id]'>Update Status</a>";
        }
    
        $status = $row['status'];
        echo "<tr>
                <td class='kiri'>$row[pesanan_id]</td>
                <td class='kiri'>$arrayOrderStatus[$status]</td>
                <td class='kiri'>$row[nama]</td>
                <td class='kiri'>
                    <a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=orders&action=detail&order_id=$row[pesanan_id]'>Detail Pesanan</a>
                    $adminButton
                </td>
             </tr>";
    }
    
    echo "</table>";
}

?>