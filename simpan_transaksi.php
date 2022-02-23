<?php
    include 'koneksi.php';

    if (isset($_POST['simpan']))
    {
        $no_transaksi       = $_POST['no_transaksi'];
        $id_tamu           = $_POST['id_tamu'];
        $nama_tamu     = $_POST['nama_tamu'];
        $tlp     = $_POST['tlp'];
        $kode_kamar       = $_POST['kode_kamar'];
        $nama_kamar            = $_POST['nama_kamar'];
        $harga_kamar        = $_POST['harga_kamar'];
        $tgl_masuk          = $_POST['tgl_masuk'];
        $tgl_keluar        = $_POST['harga_kamar'];
        $lama_inap   = $_POST['lama_inap'];

        $sql = mysqli_query($mysqli,"INSERT INTO tb_pemesanan(no_transaksi,id_tamu,nama_tamu,tlp,kode_kamar,nama_kamar,harga_kamar,tgl_masuk,tgl_keluar,lama_inap) 
                                                    VALUES ('$no_transaksi','$id_tamu','$nama_tamu','$tlp','$kode_kamar','$nama_kamar','$harga_kamar','$tgl_masuk','$tgl_keluar','$lama_inap')");
        if ($sql)
        {
            echo "<script>alert('Berhasil Simpan Data')</script>";
            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_transaksi.php'>";
        }
        else
        {
            echo "<script>alert('Gagal')</script>";
            echo "<META HTTP-EQUIV='refresh' Content='0; url=entry_transaksi.php'>";
        }
        echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_transaksi.php'>";
    }
?>