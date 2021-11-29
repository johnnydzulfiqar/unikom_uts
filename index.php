<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<?php include('menu_siswa.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body>
<style type="text/css">
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: center;
   	margin: 5px;
   	width: 100px;
   	height: 125px;
   }
</style>
<?php 
include('koneksi.php');
$no = 1;
$query = mysqli_query($db,"SELECT * FROM siswa");
$data = mysqli_fetch_all ($query, MYSQLI_ASSOC);
if(isset($data)){
foreach ($data as $siswa) {
?>
<div class="mx-auto" style="width: 500px;">
<div class="card mb-3" style="max-width: 500px;">
  <div class="row no-gutters">
    <center>
    <?php echo "<div id='img_div'>";
      							  echo "<img src='img/".$siswa['image']."'>";?>
    </center>
    <div class="col-md-10">
      <div class="card-body">
        <h5 class="card-title">Nama : <?= $siswa['nama'];?></h5>
        <p class="card-text">Alamat                 : <?= $siswa['alamat'];?></p>
        <p class="card-text">Kota                   : <?= $siswa['kota'];?></p>
        <p class="card-text">Kode Pos               : <?= $siswa['pos'];?></p>
        <p class="card-text">Tempat Tanggal Lahir   : <?= $siswa['ttl'];?><br><?= $siswa['date'];?></p>
        <p class="card-text">Jenis Kelamin          : <?= $siswa['jeniskelamin'];?></p>
        <p class="card-text">Anak                   : <?= $siswa['anak'];?></p>
        <p class="card-text">Asal                   : <?= $siswa['asal'];?></p>
        <p class="card-text">Kelas                  : <?= $a = $siswa['kelas'];?></p>
        <p class="card-text">Buku Rapor             : <?= $siswa['rapor_buku'];?></p>
        <p class="card-text">Surat Keterangan Nilai Rapor : <?= $siswa['rapor_nilai'];?></p>
        <p class="card-text">Ijasah                 : <?= $siswa['ijasah'];?></p>
        <p class="card-text">Kartu Keluarga         : <?= $siswa['kk'];?></p>
        <p class="card-text">Status                 : <?php $siswa['status'];//pake <?php biar teu auto summon
        if($siswa['rapor_buku']=="Terisi" && $siswa['rapor_nilai']=="Terisi" && $siswa['ijasah']=="Terisi" && $siswa['kk']=="Terisi"){
          echo"<center><h2> <font color=green>DITERIMA DI KELAS $a</font></h2></center>";
        }else{echo "<center><h2> <font color=red>TIDAK DITERIMA DI KELAS $a</font></h2></center>";}
        ?></p>
        
        <a href="detail_data.php?id_siswa=<?=$siswa['id_siswa']?>" class="btn btn-primary mb-1">Data Orang Tua Siswa</a>
        <a href="edit_data.php?id_siswa=<?=$siswa['id_siswa']?>" class="btn btn-warning mb-1">Edit data Calon Siswa</a>
        <a href="edit_orangtua.php?id_siswa=<?=$siswa['id_siswa']?>" class="btn btn-warning mb-1">Edit data Orang Tua</a>
        <a href="hapus.php?id_siswa=<?=$siswa['id_siswa']?>" class="btn btn-danger mb-1">Hapus</a>
      </div>
      </div>
    </div>
    </div>
<?php } ?>
<?php } ?>
</body>

</html>