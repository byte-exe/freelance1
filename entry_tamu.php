<?php include "koneksi.php"; ?>
<html>
    <style>
        .tabel { border-collapse:collapse; }
        .tabel table, .tabel tr, .tabel th, .tabel td { border: 1px solid black;}
        .tabel table, .tabel tr, .tabel th, .tabel td { padding-right:20px; padding-left:30px; text-align:center;}
        th { padding-right:20px; padding-left:20px; text-align:center;}
        td { padding:5px; }
    </style>
    <head>
        <title>Data Tamu </title>
        <table style="padding:5px;">
        <body bgcolor = "#EEEDDE">
            <tr>
                
                <script>
                    function logout()
                    {
                        return confirm('Anda berencana ingin logout ?');
                    }
                </script>
               <button><a href="index.php">Kembali</a></button>
            </tr>
        </table>
        <h1 style="text-align:center;">Data Tamu Hotel</h1>
        <table>
            
            <tr>
                <td>
                <form action="simpan_tamu.php" method="POST">
                    <table>
                        <tr>
                            <td>ID Tamu</td>
                            <td><input type="text" id="id_tamu" name="id_tamu" placeholder="Masukkan ID Tamu" required></td>
                        </tr>
                        <tr>
                            <td>Nama Tamu</td>
                            <td><input type="text" id="nama_tamu" name="nama_tamu" placeholder="Masukkan Nama Tamu" required></td>
                        </tr>
                        <tr>
                            <td>No.Telp</td>
                            <td><input type="text" id="tlp" name="tlp" placeholder="Masukkan Alamat Pelanggan" required></td>
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
                            $query = mysqli_query($mysqli, "SELECT * FROM tb_tamu");
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