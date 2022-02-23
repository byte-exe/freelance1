<?php
    include "koneksi.php";
    $sql = mysqli_query($mysqli,"delete from tb_tamu where id_tamu='$_GET[id_tamu]'");
    if($sql)
    {
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='1; url=entry_tamu.php'>";
    }
    else
    {
        echo "<script>alert('Gagal')</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='1; url=entry_tamu.php'>";
    }
?>