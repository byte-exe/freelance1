<?php include "koneksi.php"; ?>
<html>
    <style>
        .tabel { border-collapse:collapse; }
        .tabel table, .tabel tr, .tabel th, .tabel td { border: 1px solid black;}
        .tabel table, .tabel tr, .tabel th, .tabel td { padding-right:30px; padding-left:30px; text-align:center;}
        th { padding-right:30px; padding-left:30px; text-align:center;}
        td { padding:10px; }
    </style>
    <head>
        <title>Data Kamar</title>
        <table style="padding:5px;">
            <body bgcolor = "#EEEDDE">
            <button><a href="index.php">Kembali</a></button>
        </table>
        <h1 style="text-align:center;">DATA TAMU HOTEL</h1>
        <table>
            <tr>
                <td style="text-align:center;"><b>Daftar Data Kamar</b></td>
            </tr>
            <tr>
                <td>
                <form action="simpan_kamar.php" method="POST">
                    <table>
                        <tr>
                            <td>Kode Kamar</td>
                            <td><input type="text" id="kode_kamar" name="kode_kamar" placeholder="Masukkan Kode Kamar" required></td>
                        </tr>
                        <tr>
                            <td>Nama Kamar</td>
                            <td><input type="text" id="nama_kamar" name="nama_kamar" placeholder="Masukkan Nama Kamar" required></td>
                        </tr>
                        <tr>
                            <td>Harga Kamar</td>
                            <td><input type="number" id="harga_kamar" name="harga_kamar" placeholder="Masukkan Harga Kamar" required></td>
                        </tr>
                        <tr>
                            <th colspan="4"><input type="submit" name="simpan" id="simpan" value="SIMPAN"></th>
                        </tr>
                    </table>
                </form>
                </td>
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
                    <center><font face = candara color = black> Create Valdo </font> </center>
                </td>
            </tr>
        </table>
    </head>
</html>