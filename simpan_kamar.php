<?php
    include 'koneksi.php';

    if (isset($_POST['simpan']))
    {
        $kode_kamar       = $_POST['kode_kamar'];
        $nama_kamar           = $_POST['nama_kamar'];
        $harga_kamar     = $_POST['harga_kamar'];

        $sql = mysqli_query($mysqli,"INSERT INTO tb_kamar(kode_kamar,nama_kamar,harga_kamar) 
                                                    VALUES ('$kode_kamar','$nama_kamar','$harga_kamar')");
        if ($sql)
        {
            echo "<script>alert('Berhasil Simpan Data')</script>";
            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_kamar.php'>";
        }
        else
        {
            echo "<script>alert('Gagal')</script>";
            echo "<META HTTP-EQUIV='refresh' Content='0; url=entry_kamar.php'>";
        }
        echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_kamar.php'>";
    }
?>