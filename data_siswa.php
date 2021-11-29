<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<?php include('menu_siswa.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body>
	<div class="container col-md-6 mt-4">
		<h1>Halaman Pendaftaran Calon Siswa</h1>
		<div class="card">
			<div class="card-header bg-primary text-white">
				Data Siswa
			</div>
			<div class="card-body">
				<form action="" method="post" role="form" enctype="multipart/form-data">
				<div class="form-group">
						<label>Foto</label>
						<input type="file" name="image" required="" class="form-control">
					</div>
				<div class="form-group">
						<label>Nama Calon Siswa</label>
						<input type="text" name="nama" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" required="" class="form-control">
					</div>
                    <div class="form-group">
						<label>kota</label>
						<input type="text" name="kota" required="" class="form-control">
					</div>
                    <div class="form-group">
						<label>Kode Pos</label>
						<input type="text" name="pos" required="" class="form-control">
					</div>
                    <div class="form-group">
						<label>Tempat lahir</label>
						<input type="text" name="ttl" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" name="date" required="" class="form-control">
					</div>
					<div class="row form-group">
              <div class="col-md-3 text-md-left">
                <span class="label">Jenis Kelamin*</span>
              </div>
              <div class="col-md-4">
                <select class="form-select" name="jeniskelamin" id="jeniskelamin">
                  <option value="-1">Plih Satu</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>

					<div class="form-group">
						<label>Anak Ke dari berapa saudara</label>
						<input type="text" name="anak" class="form-control">
					</div>
                    <div class="form-group">
						<label>Asal Sekolah</label>
						<input type="text" name="asal" required="" class="form-control">
					</div>
                    <div class="row form-group">
              <div class="col-md-3 text-md-left">
                <span class="label">Diterima di Kelas</span>
              </div>
              <div class="col-md-4">
                <select class="form-select" name="kelas" id="jeniskelamin">
                  <option value="-1">Plih Satu</option>
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
                </select>
              </div>
            </div>
			<div class="form-group">
				<h2>Dokumen Persyaratan</h2>
				<div class="form-check">
				<input name="rapor_buku" type="hidden" name="check[0]" value="Tidak Terisi" />
				<input name="rapor_buku" type="checkbox" name="check[0]" value="Terisi" />
						Buku Rapor
					</label>
					<div class="form-check">
					<input name="rapor_nilai" type="hidden" name="check[0]" value="Tidak Terisi" />
					<input name="rapor_nilai" type="checkbox" name="check[0]" value="Terisi" />
						Surat Keterangan Nilai Rapor
					</label>
					<div class="form-check">
					<input name="ijasah" type="hidden" name="check[0]" value="Tidak Terisi" />
					<input name="ijasah" type="checkbox" name="check[0]" value="Terisi" />
						Ijasah
					</label>
					<div class="form-check">
					<input name="kk" type="hidden" name="check[0]" value="Tidak Terisi" />
					<input name="kk" type="checkbox" name="check[0]" value="Terisi" />
						Kartu Keluarga
					</label>
					<!-- <div class="form-group">
						<input type="text" hidden name="status" value="Diterima " class="form-control">
						</div> -->
					<br>
					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
				</form>

				<?php
				include('koneksi.php');
				$msg = "";
				
				if (isset($_POST['submit'])) {
					
					$nama = $_POST['nama'];
					$alamat = $_POST['alamat'];
					$kota = $_POST['kota'];
					$pos = $_POST['pos'];
                    $ttl = $_POST['ttl'];
					$date = $_POST['date'];
                    $jeniskelamin = $_POST['jeniskelamin'];
					$anak = $_POST['anak'];
					$asal = $_POST['asal'];
					$kelas = $_POST['kelas'];
					
					$rapor_buku = $_POST['rapor_buku'];
					$rapor_nilai = $_POST['rapor_nilai'];
					$ijasah = $_POST['ijasah'];
					$kk = $_POST['kk'];
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
					$datas = mysqli_query($db, "insert into siswa (nama, alamat,kota,pos,ttl,date,jeniskelamin,anak, asal,kelas,image,image_text, rapor_buku, rapor_nilai , ijasah, kk)values('$nama', '$alamat', '$kota', '$pos', '$ttl','$date', '$jeniskelamin', '$anak', '$asal','$kelas','$image','$image_text', '$rapor_buku', '$rapor_nilai', '$ijasah', '$kk')") or die(mysqli_error($db));
					echo "<script>alert('data berhasil disimpan. Silahkan Isi Form Orang Tua');window.location='data_orangtua.php';</script>";
				}
				?>
			</div>
		</div>
	</div>

	
</body>

</html>