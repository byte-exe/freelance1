<?php include "koneksi.php"; ?>
<html>
    <style>
        .tabel { border-collapse:collapse; }
        .tabel table, .tabel tr, .tabel th, .tabel td { border: 1px solid black;}
        .tabel table, .tabel tr, .tabel th, .tabel td { padding-right:20px; padding-left:20px; text-align:center;}
        th { padding-right:20px; padding-left:20px; text-align:center;}
        td { padding:5px; }
    </style>
    <head>
        <title>Data Transaksi Kamar Hotel - Ummi</title>
        <table style="padding:5px;">
            <body bgcolor = "#EEEDDE">
            <tr>
               <button><a href="index.php">Kembali</a></button>
            </tr>
        </table>
        <h1 style="text-align:center;">DATA TRANSAKSI KAMAR HOTEL</h1>
        <table>
            
            <tr><td style="text-align:center;"><b>Daftar Data Pemesanan Kamar Hotel</b></td></tr>
            <tr>
                <td>
                    <table class="tabel">
                        <tr>
                            <th>Kode Faktur</th>
                            <th>Tgl Masuk</th>
                            <th>Tgl Keluar</th>
                            <th>Kode Tamu</th>
                            <th>Nama Tamu</th>
                            <th>Tlp</th>
                            <th>Kode Kamar</th>
                            <th>Nama Kamar</th>
                            <th>Harga Kamar</th>
                            <th>Lama Inap</th>
                            <th>Jumlah bayar</th>
                        </tr>
                        <script>
                            function hapus ()
                            { return confirm ("Hapus Data ini ?"); }
                        </script>
                        <?php
                            $no=0;
                            $total_bayar = 0;
                            $query = mysqli_query($mysqli,"SELECT * FROM tb_pemesanan");
                            {
                                while ($hasil = mysqli_fetch_assoc($query))
                                {
                                    $no++;
                                    $total_bayar = $hasil["lama_inap"] * $hasil["harga_kamar"];
                                    echo"
                                        <tr>
                                            <td>$hasil[no_transaksi]</td>
                                            <td>$hasil[tgl_masuk]</td>
                                            <td>$hasil[tgl_keluar]</td>
                                            <td>$hasil[id_tamu]</td>
                                            <td>$hasil[nama_tamu]</td>
                                            <td>$hasil[tlp]</td>
                                            <td>$hasil[kode_kamar]</td>
                                            <td>$hasil[nama_kamar]</td>
                                            <td>$hasil[harga_kamar]</td>
                                            <td>$hasil[lama_inap]</td>
                                            <td>$total_bayar</td>
                                        </tr>
                                    ";
                                }
                            }
                        ?>
                        
                    </table>
                    <center><font face = candara color = black> Create bye. 18101152610047 Ummi Aldiah </font> </center>
                </td>
            </tr>
        </table>
    </head>
</html>