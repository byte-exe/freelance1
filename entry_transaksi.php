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
        <title>Data Transaksi Kamar Hotel</title>
        <table style="padding:5px;">
            <body bgcolor = "#EEEDDE">
            <tr>
               <button><a href="index.php">Kembali</a></button>
            </tr>
        </table>
        <h1 style="text-align:center;">DATA TRANSAKSI KAMAR HOTEL</h1>
        <table>
            <tr>
                <td>
                <form action="simpan_transaksi.php" method="POST">
                    <table>
                        <tr>
                            <td>No Faktur</td>
                            <td><input type="text" id="no_transaksi" name="no_transaksi" placeholder="Masukkan No Transaksi" required></td>
                        </tr>
                        <tr>
                            <td>ID TAMU</td>
                            <td>
                                
                                <select name="id_tamu" id="id_tamu" onchange="myfunction1()" required>
                                <option disabled selected>-Pilih ID TAMU-</option>
                                <?php
                                        $sql = mysqli_query ($mysqli,"SELECT * FROM tb_tamu");
                                        while ($data = mysqli_fetch_assoc($sql))
                                        {
                                    ?>
                                    <option data-value[1] = "<?=$data['nama_tamu']?>" data-value[2] = "<?=$data['tlp']?>" value="<?=$data['id_tamu']?>"><?=$data['id_tamu']?></option>
                                    <?php
                                        }
                                ?>
                                </select>
                            </td>
                        </tr>
                        <script>
                            function myfunction1()
                            {
                                var nama_tamu = $('#id_tamu').find(':selected').data('value[1]');
                                $('#nama_tamu').val(nama_tamu);
                                var tlp = $('#id_tamu').find(':selected').data('value[2]');
                                $('#tlp').val(tlp);
                            }
                        </script>
                        <tr>
                            <td>Nama Tamu</td>
                            <td><input type="text" id="nama_tamu" name="nama_tamu" placeholder="Pilih ID Tamu" readonly></td>
                        </tr>
                        <tr>
                            <td>Np. Telp</td>
                            <td><input type="text" id="tlp" name="tlp" placeholder="Ketik No Tlp" readonly></td>
                        </tr>
                        
                        <tr>
                            <td>Kode Kamar</td>
                            <td>
                                <script src="jquery.min.js"></script>
                                <select name="kode_kamar" id="kode_kamar" onchange="myfunction2()" required>
                                <option disabled selected>-Pilih Kode Kamar-</option>
                                <?php
                                        $sql = mysqli_query ($mysqli,"SELECT * FROM tb_kamar");
                                        while ($data = mysqli_fetch_assoc($sql))
                                        {
                                    ?>
                                    <option data-value[1] = "<?=$data['nama_kamar']?>"  data-value[2] = "<?=$data['harga_kamar']?>" value="<?=$data['kode_kamar']?>"><?=$data['kode_kamar']?></option>
                                    <?php
                                        }
                                ?>
                                </select>
                            </td>
                        </tr>
                        <script>
                            function myfunction2()
                            {
                                
                                var nama_kamar = $('#kode_kamar').find(':selected').data('value[1]');
                                $('#nama_kamar').val(nama_kamar);
                                var harga_kamar = $('#kode_kamar').find(':selected').data('value[2]');
                                $('#harga_kamar').val(harga_kamar);
                            }
                        </script>
                        <tr>
                            <td>Nama Kamar</td>
                            <td><input type="text" id="nama_kamar" name="nama_kamar" placeholder="Pilih Kode Kamar" readonly></td>
                        </tr>
                        <tr>
                            <td>Harga Kamar</td>
                            <td><input type="text" id="harga_kamar" name="harga_kamar" placeholder="Pilih Kode Kamar" read></td>
                        </tr>
                        <tr>
                            <td>Tanggal Masuk</td>
                            <td><input type="date" id="tgl_masuk" name="tgl_masuk" value="<?php echo"$hasil[tgl_masuk]";?>"required></td>
                        </tr>
                        <tr>
                            <td>Tanggal Keluar</td>
                            <td><input type="date" id="tgl_keluar" name="tgl_keluar" value="<?php echo"$hasil[tgl_keluar]";?>"required></td>
                        </tr>
                         <tr>
                            <td>Lama Inap</td>
                            <td><input type="text" id="lama_inap" name="lama_inap" placeholder="Lama Inap" require></td>
                        </tr>
                        
                        <tr>
                            <th colspan="4"><input type="submit" name="simpan" id="simpan" value="Simpan [Proses]"></th>
                        </tr>
                    </table>
                </form>
                </td>
            </tr>
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
                            <th colspan="2">Action</th>
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
                                            <td><a href='edit_transaksi.php?no_transaksi=$hasil[no_transaksi]'>Edit</td>
                                            <td><a href='hapus_transaksi.php?no_transaksi=$hasil[no_transaksi]' onclick='return hapus()'>Hapus</td>
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