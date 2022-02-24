<?php
    include "koneksi.php";
    $sql = mysqli_query($mysqli, "select * from tb_kamar where kode_kamar='$_GET[kode_kamar]'");
    $hasil = mysqli_fetch_array($sql);
?>
<html>
    <style>
        .tabel { border-collapse:collapse; }
        .tabel table, .tabel tr, .tabel th, .tabel td { border: 1px solid black;}
        .tabel table, .tabel tr, .tabel th, .tabel td { padding-right:30px; padding-left:30px; text-align:center;}
        th { padding-right:30px; padding-left:30px; text-align:center;}
        td { padding:10px; }
    </style>
    <head>
        <title>Edit Kamar</title>
        <BODY>
        <table style="padding:5px;">
        	<body bgcolor = "#EEEDDE">
            <tr>
                <button><a href="index.php">Kembali</a></button>
            </tr>
        </table>
        <h4 style="text-align:center;">EDIT DATA KAMAR</h4>
        <table>
            <tr>
                <td>
                <form action="" method="POST">
                    <table>
                        <tr>
                            <td>Kode Kamar</td>
                            <td><input type="text" id="kode_kamar" name="kode_kamar" value="<?php echo "$hasil[kode_kamar]";?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Nama Kamar</td>
                            <td><input type="text" id="nama_kamar" name="nama_kamar" placeholder="Masukkan Nama Kamar" value="<?php echo "$hasil[nama_kamar]";?>" required></td>
                        </tr>
                        <tr>
                            <td>Harga Kamar</td>
                            <td><input type="text" id="harga_kamar" name="harga_kamar" placeholder="Masukkan Harga Kamar" required></td>
                        </tr>
                        <tr>
                            <th colspan="4"><input type="submit" name="ubah" id="ubah" value="EDIT"></th>
                        </tr>
                    </table>
                </form>
                </td>
                <?php
                    if(isset($_POST['ubah']))
                    {
                        $kode_kamar = $_POST['kode_kamar'];
                        $nama_kamar = $_POST['nama_kamar'];
                        $harga_kamar = $_POST['harga_kamar'];
                        
                        $sql = mysqli_query ($mysqli,"UPDATE tb_kamar set nama_kamar = '$nama_kamar',harga_kamar='$harga_kamar' where kode_kamar='$kode_kamar'");
                        if($sql)   
                        {
                            echo "<script>alert('Data berhasil diubah.')</script>";
                            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_kamar.php'>";
                        }
                        else
                        {
                            echo "<script>alert('Gagal mengubah data!')</script>";
                            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_kamar.php'>";
                        }
                            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_kamar.php'>";
                    }
                ?>
                <td>
                    <table class="tabel">
                        <tr>
                            <th>NO.</th>
                            <th>KODE KAMAR</th>
                            <th>NAMA KAMAR</th>
                            <th>HARGA KAMAR</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <script>
                            function hapus ()
                            { return confirm ("Hapus Data ini ?"); }
                        </script>
                        <?php
                            $no=0;
                            $query = mysqli_query($mysqli,"SELECT * FROM tb_kamar");
                            {
                                while ($hasil = mysqli_fetch_assoc($query))
                                {
                                    $no++;
                                    echo"
                                        <tr>
                                            <td>$no</td>
                                            <td>$hasil[kode_kamar]</td>
                                            <td>$hasil[nama_kamar]</td>
                                            <td>$hasil[harga_kamar]</td>
                                            <td><a href='edit_kamar.php?kode_kamar=$hasil[kode_kamar]'>Edit</td>
                                            <td><a href='hapus_kamar.php?kode_kamar=$hasil[kode_kamar]' onclick='return hapus()'>Hapus</td>
                                        </tr>
                                    ";
                                }
                            }
                        ?>
                    </table>
                    <center><font face = candara color = black>Create By. Nobp&namalengkap</font> </center>
                </td>
            </tr>
        </table>
    </head>
</html>