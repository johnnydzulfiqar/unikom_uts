<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body>
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
<div class="mx-auto" style="width: 500px;">
<div class="card mb-3" style="max-width: 540px;">
    <h5 class="card-title">Nama Orang Tua Siswa</h5>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-text">Nama Ayah            :<?= $ortu['nama_ayah'];?></p>
        <p class="card-text">Alamat Ayah          : <?= $ortu['alamat_ayah'];?></p>
        <p class="card-text">Pekerjaan Ayah       : <?= $ortu['pekerjaan_ayah'];?></p>
        <p class="card-text">Nama Ibu             :<?= $ortu['nama_ibu'];?></p>
        <p class="card-text">Alamat Ibu           : <?= $ortu['alamat_ibu'];?></p>
        <p class="card-text">Pekerjaan Ibu        : <?= $ortu['pekerjaan_ibu'];?></p>
        <a href="index.php" class="btn btn-primary">Kembali</a>
        
  </div>
</div>
    </div>
    </div>
</body>
</html>