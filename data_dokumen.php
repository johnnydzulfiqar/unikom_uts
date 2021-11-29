<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body>
	<div class="container col-md-6 mt-4">
		<h1>Table Tambah Anggota</h1>
		<div class="card">
			<div class="card-header bg-dark text-white">
				Tambah Anggota
			</div>
			<div class="card-body">
				<form action="" method="post" role="form" enctype="multipart/form-data">
				<div class="form-group">
						<label>Foto</label>
						<input type="file" name="image" required="" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
				</form>

				<?php
				 if(isset($_GET['id_siswa'])){
					$id_siswa   =$_GET['id_siswa'];
				}
				else {
					die ("Error. No ID Selected!");    
				}
				include('koneksi.php');
				$msg = "";
				
				if (isset($_POST['submit'])) {
					extract($_POST);
					$image = $_FILES['image']['name'];
  					$image_text = mysqli_real_escape_string($db, $_POST['image_text']);
  					$target = "img/".basename($image);
  					mysqli_query($db, $sql);

  					if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  					$msg = "Image uploaded successfully";
  						}else{
  							$msg = "Failed to upload image";
  								}
					$datas = mysqli_query($db, "insert into siswa (image, image_text)values('$image', '$image_text')") or die(mysqli_error($db));
					echo "<script>alert('data berhasil disimpan.');window.location='index.php';</script>";
				}
				?>
			</div>
		</div>
	</div>

	
</body>

</html>