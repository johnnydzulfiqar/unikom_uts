<?php				
			include 'koneksi.php'; //menghubungkan ke file koneksi untuk ke database
			$id_siswa = $_GET['id_siswa']; //menampung id

			//query hapus
			$datas = mysqli_query($db, "delete from siswa where id_siswa ='$id_siswa'") or die(mysqli_error($db));

			//alert dan redirect ke index.php
			echo "<script>alert('data berhasil dihapus.');window.location='index.php';</script>";
	?>