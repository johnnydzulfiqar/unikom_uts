<!DOCTYPE html>
<html>
<?php include('menu_siswa.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style type="text/css">
   img{
   	float: left;
   	margin: 5px;
   	width: 70px;
   	height: 75px;
   }
</style>
<body>
	<div class="container col-md-6 mt-4">
		<h1>Table Edit Data Anggota</h1>
		<div class="card">
			<div class="card-header bg-primary text-white ">
				Edit Anggota
			</div>
			<div class="card-body">
				<?php
				include('koneksi.php');
                if(isset($_GET['id_siswa'])){
                    $id_siswa   =$_GET['id_siswa'];
                }
                else {
                    die ("Error. No ID Selected!");    
                }
				$data = mysqli_query($db, "select * from siswa where id_siswa = '$id_siswa'");
				$siswa = mysqli_fetch_assoc($data);
				?>
				<label>Foto</label>
				<form action="" method="post" role="form" enctype="multipart/form-data">
                <?php echo "<div id='img_div'>";
      							  echo "<img src='img/".$siswa['image']."'>";?>
						<input type="file" name="image" required="" class="form-control">
					</div>
				<div class="form-group">
						<label>Nama Calon Siswa</label>
						<input type="text" name="nama" required="" class="form-control" value="<?= $siswa['nama'];?>">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" required="" class="form-control" value="<?= $siswa['alamat'];?>">
					</div>
                    <div class="form-group">
						<label>kota</label>
						<input type="text" name="kota" required="" class="form-control" value="<?= $siswa['kota'];?>">
					</div>
                    <div class="form-group">
						<label>Kode Pos</label>
						<input type="text" name="pos" required="" class="form-control" value="<?= $siswa['pos'];?>">
					</div>
                    <div class="form-group">
						<label>Tempat lahir</label>
						<input type="text" name="ttl" required="" class="form-control" value="<?= $siswa['ttl'];?>">
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" name="date" required="" class="form-control" value="<?= $siswa['date'];?>">
					</div>
					<div class="row form-group">
              <div class="col-md-3 text-md-left">
                <span class="label">Jenis Kelamin*</span>
              </div>
              <div class="col-md-4" >
                <select class="form-select" name="jeniskelamin" id="jeniskelamin" required="" >
                  <option value="Belum Memilih">Plih Satu</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>

					<div class="form-group">
						<label>Anak Ke dari berapa saudara</label>
						<input type="text" name="anak" class="form-control" value="<?= $siswa['anak'];?>">
					</div>
                    <div class="form-group">
						<label>Asal Sekolah</label>
						<input type="text" name="asal" required="" class="form-control" value="<?= $siswa['asal'];?>">
					</div>
                    <div class="row form-group">
              <div class="col-md-3 text-md-left">
                <span class="label">Diterima di Kelas</span>
              </div>
              <div class="col-md-4">
                <select class="form-select" name="kelas" id="jeniskelamin">
                  <option value="Belum Memilih">Plih Satu</option>
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
			</div> 
					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
				</form>
			
				<?php
				
				include('koneksi.php');
				$msg="";
				if(isset($_POST['submit'])) {
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
  					mysqli_query($db, $sql);
					
					mysqli_query($db, "update siswa set nama='$nama', alamat='$alamat', kota='$kota', pos='$pos', ttl='$ttl' ,date='$date' ,  jeniskelamin='$jeniskelamin', anak='$anak', asal='$asal', kelas='$kelas', rapor_buku='$rapor_buku', rapor_nilai='$rapor_nilai', ijasah='$ijasah', kk='$kk', image='$image', image_text='$image_text' where id_siswa = '$id_siswa'") or die(mysqli_error($db));
					
					echo "<script>alert('data berhasil diupdate.');window.location='index.php';</script>";
				}
				?>
			</div>
		</div>
	</div>
</body>

</html>