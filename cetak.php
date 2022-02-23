<!DOCTYPE html>
<html>
<head>
    <title>Laporan - Report Valdo</title>
</head>
<body>
 <body bgcolor = "#EEEDDE">
    <center>
  <button><a href="index.php">Kembali</a></button>
  <button><a href="cetak.php">Cetak</a></button>
        
        <h2>Report Rekapitulasi</h2>
        <h4>Valdo</h4>
 
    </center>
 
    <?php 
    include 'koneksi.php';
    ?>
 
    <table border="1" style="width: 100%">
        <tr>
                           <th width="1%">No</th>
                            <th>Kode Faktur</th>
                            <th>Tgl Pesan</th>
                            <th>Kode Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Kode Kendaraan</th>
                            <th>Merk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Jumlah Transaksi</th>
                            <th>Jumlah Bayar</th>
                            <th>Total Bayar</th>
                        </tr>
        <?php 
        $no = 1;
        $sql = mysqli_query($mysqli,"select * from tb_pemesanan");
        while($data = mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['no_transaksi']; ?></td>
            <td><?php echo $data['tgl_pesan']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['nama_pelanggan']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['kota']; ?></td>
            <td><?php echo $data['nomor_polisi']; ?></td>
            <td><?php echo $data['jurusan']; ?></td>
            <td><?php echo $data['tujuan']; ?></td>
            <td><?php echo $data['harga_tiket']; ?></td>
            <td><?php echo $data['jumlah_penumpang']; ?></td>
            <td><?php echo $data['total_bayar']; ?></td>
        </tr>
        <?php 
        }
        ?>
    </table>
 
    <script>
        window.print();
    </script>
 
</body>
</html>

