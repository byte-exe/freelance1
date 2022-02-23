<?php
    include "koneksi.php";
    $sql = mysqli_query($mysqli,"delete from tb_kamar where kode_kamar='$_GET[kode_kamar]'");
    if($sql)
    {
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='1; url=entry_kamar.php'>";
    }
    else
    {
        echo "<script>alert('Gagal')</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='1; url=entry_kamar.php'>";
    }
?>