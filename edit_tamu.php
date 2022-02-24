<?php
    include "koneksi.php";
    $sql = mysqli_query($mysqli, "select * from tb_tamu where id_tamu='$_GET[id_tamu]'");
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
        <title>Edit Data Tamu</title>
        <table style="padding:5px;">
            <body bgcolor = "#EEEDDE">
            <tr>
               <button><a href="index.php">Kembali</a></button>
            </tr>
        </table>
        <h4 style="text-align:center;">EDIT DATA TAMU HOTEL</h4>
        <table>
            <tr>
                <td style="text-align:center;"><b>Daftar Data Tamu</b></td>
            </tr>
            <tr>
                <td>
                <form action="" method="POST">
                    <table>
                        <tr>
                            <td>Id Tamu</td>
                            <td><input type="text" id="id_tamu" name="id_tamu" value="<?php echo "$hasil[id_tamu]";?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Nama Tamu</td>
                            <td><input type="text" id="nama_tamu" name="nama_tamu" placeholder="Masukkan Nama Tamu" value="<?php echo "$hasil[nama_tamu]";?>" required></td>
                        </tr>
                        <tr>
                            <td>No.Telp</td>
                            <td><input type="text" id="tlp" name="tlp" placeholder="Masukkan No Telp" required></td>
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
                        $id_tamu = $_POST['id_tamu'];
                        $nama_tamu = $_POST['nama_tamu'];
                        $tlp = $_POST['tlp'];
                        
                        $sql = mysqli_query ($mysqli,"UPDATE tb_tamu set nama_tamu = '$nama_tamu',tlp='$tlp' where id_tamu='$id_tamu'");
                        if($sql)
                        {
                            echo "<script>alert('Data berhasil diubah.')</script>";
                            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_tamu.php'>";
                        }
                        else
                        {
                            echo "<script>alert('Gagal mengubah data!')</script>";
                            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_tamu.php'>";
                        }
                            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_tamu.php'>";
                    }
                ?>
                <td>
                    <table class="tabel">
                        <tr>
                            <th>No.</th>
                            <th>ID TAMU</th>
                            <th>NAMA TAMU</th>
                            <th>NO.TELP</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <script>
                            function hapus ()
                            { return confirm ("Hapus Data ini ?"); }
                        </script>
                        <?php
                            $no=0;
                            $query = mysqli_query($mysqli,"SELECT * FROM tb_tamu");
                            {
                                while ($hasil = mysqli_fetch_assoc($query))
                                {
                                    $no++;
                                    echo"
                                        <tr>
                                            <td>$no</td>
                                            <td>$hasil[id_tamu]</td>
                                            <td>$hasil[nama_tamu]</td>
                                            <td>$hasil[tlp]</td>
                                            <td><a href='edit_tamu.php?id_tamu=$hasil[id_tamu]'>Edit</td>
                                            <td><a href='hapus_tamu.php?id_tamu=$hasil[id_tamu]' onclick='return hapus()'>Hapus</td>
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