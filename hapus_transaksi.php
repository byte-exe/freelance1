<?php
    include "koneksi.php";
    $sql = mysqli_query($mysqli,"delete from tb_pemesanan where no_transaksi='$_GET[no_transaksi]'");
    if($sql)
    {
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='1; url=entry_transaksi.php'>";
    }
    else
    {
        echo "<script>alert('Gagal')</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='1; url=entry_transaksi.php'>";
    }
?>