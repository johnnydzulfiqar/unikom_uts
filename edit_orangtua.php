<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<?php include('menu_siswa.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body>
    <div class="card-body">
	<div class="container col-md-6 mt-4">
		<h1>Halaman Pendaftaran Siswa SMA</h1>
		<div class="card">
			<div class="card-header bg-primary text-white">
				Data Orang Tua
			</div>
			<div class="card-body">
            <?php
				if(isset($_GET['id_siswa'])){
                    $id_siswa   =$_GET['id_siswa'];
                }
                else {
                    die ("Error. No ID Selected!");    
                }
                include "koneksi.php";
                $query=mysqli_query($db, "SELECT * FROM orangtua WHERE id_siswa='$id_siswa'");
                $ortu=mysqli_fetch_array($query);
				?>
				<form action="" method="post" role="form" enctype="multipart/form-data">
				<!-- <div class="form-group">
						<label>Foto</label>
						<input type="file" name="image" required="" class="form-control">
					</div> -->
				<div class="form-group">
						<label>Nama ayah</label>
						<input type="text" name="nama_ayah" required="" class="form-control" value="<?= $ortu['nama_ayah'];?>">
					</div>
					<div class="form-group">
						<label>Alamat Ayah</label>
						<input type="text" name="alamat_ayah" required="" class="form-control"  value="<?= $ortu['alamat_ayah'];?>">
					</div>
                    <div class="form-group">
						<label>Pekerjaan Ayah</label>
						<input type="text" name="pekerjaan_ayah" required="" class="form-control"  value="<?= $ortu['pekerjaan_ayah'];?>">
					</div>
                    <div class="form-group">
						<label>Nama Ibu</label>
						<input type="text" name="nama_ibu" required="" class="form-control"  value="<?= $ortu['nama_ibu'];?>">
					</div>
                    <div class="form-group">
						<label>Alamat Ibu</label>
						<input type="text" name="alamat_ibu" required="" class="form-control"  value="<?= $ortu['alamat_ibu'];?>">
					</div>
                    <div class="form-group">
						<label>Pekerjaan Ibu</label>
						<input type="text" name="pekerjaan_ibu" required="" class="form-control"  value="<?= $ortu['pekerjaan_ibu'];?>">
					</div>
					
					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
				</form>

				<?php
				include('koneksi.php');
				$msg = "";
				if (isset($_POST['submit'])) {
					$nama_ayah = $_POST['nama_ayah'];
					$alamat_ayah = $_POST['alamat_ayah'];
					$pekerjaan_ayah = $_POST['pekerjaan_ayah'];
					$nama_ibu = $_POST['nama_ibu'];
                    $alamat_ibu = $_POST['alamat_ibu'];
					$pekerjaan_ibu = $_POST['pekerjaan_ibu'];
					extract($_POST);
					
					$datas = mysqli_query($db, "update orangtua set nama_ayah='$nama_ayah', alamat_ayah='$alamat_ayah', pekerjaan_ayah='$pekerjaan_ayah', nama_ibu='$nama_ibu', alamat_ibu='$alamat_ibu', pekerjaan_ibu='$pekerjaan_ibu' where id_siswa = '$id_siswa'") or die(mysqli_error($db));
					echo "<script>alert('data berhasil disimpan.');window.location='index.php';</script>";
				}
				?>
			</div>
		</div>
	</div>

	
</body>

</html>