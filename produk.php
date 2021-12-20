<link rel="stylesheet" href="Styles/marketstyle.css">

<link rel="stylesheet" href="Styles/checkoutstyle.css">


    <?php   
    include 'database.php';
    $sql="select * from barang where stok_barang !=0 order by ID desc";
    $hasil=mysqli_query($kon,$sql);
    $jumlah = mysqli_num_rows($hasil);
    if ($jumlah>0){
        while ($data = mysqli_fetch_array($hasil)):
    ?>
        <div class="box">
            <div class="">
                <div class="image">
                    <a href="#"><img src="Images/<?php echo $data['gambar_barang'];?>" width="100%" alt="Cinque Terre"></a>
                </div>
                <div class="content">
                    <h3><?php echo $data['nama_barang'];?></h3>
                    <div class="price">
                        <h4>Rp. <?php echo number_format($data['harga_barang'],2,',','.'); ?> </h4>
                        <h5>Stok tersisa : <?php echo $data['stok_barang'];?></h5>
                    </div>
                    <p><a href="marketplace.php?halaman=keranjang-belanja&kode_produk=<?php echo $data['kode_produk'];?>&aksi=tambah_produk&jumlah=1" class="btn btn-primary btn-block" role="button">Masukan Keranjang</a></p>
                </div>
            </div>
        </div>
        <?php 
        endwhile;
    }else {
        echo "<div class='alert alert-warning'> Tidak ada produk pada kategori ini.</div>";
    };
    ?>
