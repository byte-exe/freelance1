<?php
    include 'koneksi.php';
    
    if (isset($_POST['simpan'])) {
        $id_tamu   = mysqli_real_escape_string($mysqli, trim($_POST['id_tamu']));
        $nama_tamu  = mysqli_real_escape_string($mysqli, trim($_POST['nama_tamu']));
        $tlp  = mysqli_real_escape_string($mysqli, trim($_POST['tlp']));
        

        $sql = mysqli_query($mysqli,"INSERT INTO tb_tamu(id_tamu,nama_tamu,tlp) VALUES ('$id_tamu','$nama_tamu','$tlp')");
        if ($sql)
        {
            echo "<script>alert('Berhasil Simpan Data')</script>";
			echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_tamu.php'>";
        }
        else
		{
	        echo "<script>alert('Gagal')</script>";
		    echo "<META HTTP-EQUIV='refresh' Content='0; url=entry_tamu.php'>";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='0; url=entry_tamu.php'>";
    }
?>