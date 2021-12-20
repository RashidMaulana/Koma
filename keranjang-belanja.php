<?php
require 'php/fungsi.php';
$sesi = $_SESSION['id'];

    
if (isset($_GET['kode_produk']) && isset($_GET['jumlah'])) {

    $kode_produk=$_GET['kode_produk'];
    $jumlah=$_GET['jumlah'];

    include 'database.php';

    $sql= "select * from barang where kode_produk='$kode_produk'";

    $query = mysqli_query($kon,$sql);
    $data = mysqli_fetch_array($query);
    $kode_produk=$data['kode_produk'];
    $nama_barang=$data['nama_barang'];
    $harga=$data['harga_barang'];
    $stok=$data['stok_barang'];

}else {
    $kode_produk="";
    $jumlah=0;
}

if (isset($_GET['aksi'])) {
    $aksi=$_GET['aksi'];
}else {
    $aksi="";
}


switch($aksi){	
    //Fungsi untuk menambah penyewaan kedalam cart
    case "tambah_produk":
    $itemArray = array($kode_produk=>array('kode_produk'=>$kode_produk,'nama_barang'=>$nama_barang,'jumlah'=>$jumlah,'harga_barang'=>$harga,'stok_barang'=>$stok));
    if(!empty($_SESSION["keranjang_belanja"])) {
        if(in_array($data['kode_produk'],array_keys($_SESSION["keranjang_belanja"]))) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                if($data['kode_produk'] == $k) {
                    $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
                }
            }
        } else {
            $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
        }
    } else {
        $_SESSION["keranjang_belanja"] = $itemArray;
    }
    break;
    //Fungsi untuk menghapus item dalam cart
    case "hapus":

        if(!empty($_SESSION["keranjang_belanja"])) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                    if($_GET["kode_produk"] == $k)
                        unset($_SESSION["keranjang_belanja"][$k]);
                    if(empty($_SESSION["keranjang_belanja"]))
                        unset($_SESSION["keranjang_belanja"]);
            }
        }
    break;

    case "update":
        $itemArray = array($kode_produk=>array('kode_produk'=>$kode_produk,'nama_barang'=>$nama_barang,'jumlah'=>$jumlah,'harga_barang'=>$harga));
        if(!empty($_SESSION["keranjang_belanja"])) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                if($_GET["kode_produk"] == $k)
                $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
            }
        }
        
    break;

 
}

if (isset($_POST['Bayar'])) {
    $tanggal = date('Y-m-d');
    foreach ($_SESSION["keranjang_belanja"] as $item){
            $jumlah = (int)$item['jumlah'];
            $hargabarang = (int)$item['harga_barang'];
            $totalbarang = $jumlah * $hargabarang;
            $query = "INSERT INTO transaksi (tanggal_transaksi, kode_barang, id_user, nama_barang, jumlah_barang, total_harga) VALUES ('".$tanggal."'," 
            ."'".$item['kode_produk']
            ."',$sesi,'".
            $item['nama_barang']."',
            $jumlah,
            $totalbarang)";

            $queryupdatebarang = "UPDATE barang SET stok_barang = (stok_barang - '".$jumlah."')"."WHERE kode_produk = '".$item['kode_produk']."'";
            mysqli_query($conn,$query);
            mysqli_query($conn,$queryupdatebarang);
        }

        unset($_SESSION["keranjang_belanja"]);
    
}
?>
<section class="checkout">
<div class="small-container">
    <h2  style="margin-bottom:30px; color:white;">Keranjang Belanja</h2>
    <table class="tabel" style = "background-color: white">
        <thead>
        <tr>
            <th>No</th>
            <th style="text-align:center;">Kode</th>
            <th style="text-align:center;" width="40%">Nama</th>
            <th style="text-align:center;">Harga</th>
            <th style="text-align:center;" width="10%">Jumlah</th>
            <th style="text-align:center;">Sub Total</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no=0;
            $sub_total=0;
            $total=0;
            $total_berat=0;
            if(!empty($_SESSION["keranjang_belanja"])):
            foreach ($_SESSION["keranjang_belanja"] as $item):
                $no++;
                $sub_total = $item["jumlah"]*$item['harga_barang'];
                $total+=$sub_total;
        ?>
            <input type="hidden" name="kode_produk[]" class="kode_produk" value="<?php echo $item["kode_produk"]; ?>"/>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $item["kode_produk"]; ?></td>
                <td><?php echo $item["nama_barang"]; ?></td>
                <td>Rp. <?php echo number_format($item["harga_barang"],0,',','.');?> </td>
                <td>
                <input type="number" min="1" value="<?php echo $item["jumlah"]; ?>" class="form-control" id="jumlah<?php echo $no; ?>" name="jumlah[]" >
                <script>
                    $("#jumlah<?php echo $no; ?>").bind('change', function () {
                        var jumlah<?php echo $no; ?>=$("#jumlah<?php echo $no; ?>").val();
                        $("#jumlaha<?php echo $no; ?>").val(jumlah<?php echo $no; ?>);
                    });
                    $("#jumlah<?php echo $no; ?>").keydown(function(event) { 
                        return false;
                    });
                    
                </script>

                </td>
                <td>Rp. <?php echo number_format($sub_total,0,',','.');?> </td>

                <td>
                    <form method="get">
                        <input type="hidden" name="kode_produk"  value="<?php echo $item['kode_produk']; ?>" class="form-control">
                        <input type="hidden" name="aksi"  value="update" class="form-control">
                        <input type="hidden" name="halaman"  value="keranjang-belanja" class="form-control">
                        <input type="hidden" name="jumlah" value="<?php echo $item["jumlah"]; ?>" id="jumlaha<?php echo $no; ?>" value="" class="form-control">
                        <input type="submit" style="background-color: #4CAF50;
                                                    border: none;
                                                    color: white;
                                                    font-size: 2.5rem;
                                                    text-decoration: none;
                                                    align : center;
                                                    cursor: pointer;" value="Update">
                    </form>
                    <a href="marketplace.php?halaman=keranjang-belanja&kode_produk=<?php echo $item['kode_produk']; ?>&aksi=hapus"  role="button">Hapus</a>
                </td>
            </tr>
        <?php 
            endforeach;
            endif;
        ?>
        </tbody>
    </table>
    <h3>Total Pembayaran Rp. <?php echo number_format($total,0,',','.');?> </h3>
    <form method="POST">
                        <input type="hidden" name="kode_produk"  value="<?php echo $item['kode_produk']; ?>" class="form-control">
                        <input type="hidden" name="aksi"  value="update" class="form-control">
                        <input type="hidden" name="halaman"  value="keranjang-belanja" class="form-control">
                        <input type="hidden" name="jumlah" value="<?php echo $item["jumlah"]; ?>" id="jumlaha<?php echo $no; ?>" value="" class="form-control">
                        <input type="submit" class="btn btn-warning btn-x" name ="Bayar" value="Bayar">
    </form>
</section>
</div>