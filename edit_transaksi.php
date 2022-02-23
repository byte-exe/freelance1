<?php
    include "koneksi.php";
    $sql = mysqli_query($mysqli, "select * from tb_pemesanan where no_transaksi='$_GET[no_transaksi]'");
    $hasil = mysqli_fetch_array($sql);
?>
<html>
    <style>
        .tabel { border-collapse:collapse; }
        .tabel table, .tabel tr, .tabel th, .tabel td { border: 1px solid black;}
        .tabel table, .tabel tr, .tabel th, .tabel td { padding-right:20px; padding-left:20px; text-align:center;}
        th { padding-right:20px; padding-left:20px; text-align:center;}
        td { padding:5px; }
    </style>
    <head>
        <title>Edit Pemesanan Hotel</title>
        <table style="padding:5px;">
            <body bgcolor = "#EEEDDE">
            <tr>
                 <button><a href="index.php">Kembali</a></button>
            </tr>
        </table>
        <h4 style="text-align:center;">DATA PEMESANAN KAMAR HOTEL</h4>
        <table>
            <tr>
                <td style="text-align:center;"><b>Daftar Data Pemesanan</b></td>
            </tr>
            <tr>
                <td>
                <form action="" method="POST">
                    <table>
                        <tr>
                            <td>No Faktur</td>
                            <td><input type="text" id="no_transaksi" name="no_transaksi" value="<?php echo "$hasil[no_transaksi]";?>" readonly></td>
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
                            <td>Kode Tamu</td>
                            <td>
                                <script src="jquery.min.js"></script>
                                <select name="id_tamu" id="id_tamu" onchange="myfunction1()" required>
                                <option disabled selected>-Pilih Kode Tamu-</option>
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
                            <td><input type="text" id="nama_tamu" name="nama_tamu" placeholder="Pilih id_tamu" readonly></td>
                        </tr>
                        <tr>
                            <td>tlp</td>
                            <td><input type="text" id="tlp" name="tlp" placeholder="Pilih tlp" readonly></td>
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
                                    <option data-value[1] = "<?=$data['nama_kamar']?>"  data-value[4] = "<?=$data['harga_kamar']?>" value="<?=$data['kode_kamar']?>"><?=$data['kode_kamar']?></option>
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
                            <td><input type="text" id="nama_kamar" name="nama_kamar" placeholder="Nama Kamar" readonly></td>
                        </tr>
                        <tr>
                            <td>Harga_Kamar</td>
                            <td><input type="text" id="harga_kamar" name="harga_kamar" placeholder="Pilih Harga" readonly></td>
                        </tr>
                        <tr>
                            <td>Lama Inap</td>
                            <td><input type="number" id="lama_inap" name="lama_inap" placeholder="Masukkan lama Inap" min="1" required></td>
                        </tr>
                        <tr>
                            <th colspan="4"><input type="submit" name="Ubah" id="ubah" value="UBAH"></th>
                        </tr>
                    </table>
                    <?php
                    if(isset($_POST['ubah']))
                    {
                        $no_transaksi = $_POST['no_transaksi'];
                        $tgl_masuk= $_POST['tgl_masuk'];
                        $tgl_keluar= $_POST['tgl_keluar'];
                        $id_tamu = $_POST['id_tamu'];
                        $nama_tamu = $_POST['nama_tamu'];
                        $tlp = $_POST['tlp'];
                        $kode_kamar = $_POST['kode_kamar'];
                        $nama_kamar = $_POST['nama_kamar']; 
                        $harga_kamar= $_POST['harga_kamar'];
                        $lama_inap = $_POST['lama_inap'];
                        
                        $sql = mysqli_query ($mysqli,"UPDATE tb_pemesanan set id_tamu='$id_tamu',nama_tamu='$nama_tamu',tlp='$tlp',kota='$kota',tgl_pesan='$tgl_pesan',kode_kamar='$kode_kamar',nama_kamar='$nama_kamar',tujuan='$tujuan' ,harga_tiket='$harga_tiket',lama_inap='$lama_inap' where no_transaksi='$no_transaksi'");
                        if($sql)
                        {
                            echo "<script>alert('Data berhasil diubah.')</script>";
                            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_transaksi.php'>";
                        }
                        else
                        {
                            echo "<script>alert('Gagal mengubah data!')</script>";
                            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_transaksi.php'>";
                        }
                            echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_transaksi.php'>";
                    }
                ?>
                        <table class="tabel">
                    < <tr>
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
                            <th colspan="3">Action</th>
                        </tr>
                </form>
                </td>
            </tr>

                        <script>
                            function hapus ()
                            { return confirm ("Hapus Data ini ?"); }
                        </script>
                        <?php
                            $no=0;
                            $query = mysqli_query($mysqli,"SELECT * FROM tb_pemesanan");
                            {
                                while ($hasil = mysqli_fetch_assoc($query))
                                {
                                    $no++;
                                    $total_bayar = $hasil["harga_kamar"] * $hasil["lama_inap"];
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
                    <center><font face = candara color = black> Create by Valdo </font> </center>
                </td>
            </tr>
        </table>
    </head>
</html>