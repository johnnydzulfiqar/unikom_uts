<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Tugas 5</title>
    <style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
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
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Foto</th>
      <th scope="col">Nama</th>
      <th scope="col">Kota</th>
      <th scope="col">Pos</th>
      <th scope="col">Tempat Tanggal lahir</th>
      <th scope="col">Kelamin</th>
      <th scope="col">Anak Ke-</th>
      <th scope="col">Asal</th>
      <th scope="col">Kelas</th>
      <th scope="col">Buku Rapor</th>
      <th scope="col">Surat ket Nilai Rapor</th>
      <th scope="col">Ijasah</th>
      <th scope="col">KK</th>
      <th scope="col">Status</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
<?php 
include('koneksi.php');
$no = 1;
$query = mysqli_query($db,"SELECT * FROM siswa");
$data = mysqli_fetch_all ($query, MYSQLI_ASSOC);
if(isset($data)){
foreach ($data as $siswa) {
?>
<tbody>
    <tr>
      <th scope="row"><?= $no; ?></th>
     <td> <?php echo "<div id='img_div'>";
      							  echo "<img src='img/".$siswa['image']."'>";?>
                      </td>
      <td><?= $siswa['nama'];?></td>
      <td><?= $siswa['kota'];?></td>
      <td><?= $siswa['pos'];?></td>
      <td><?= $siswa['ttl'];?></td>
      <td><?= $siswa['jeniskelamin'];?></td>
      <td><?= $siswa['anak'];?></td>
      <td><?= $siswa['asal'];?></td>
      <td><?= $a = $siswa['kelas'];?></td>
      <td><?= $siswa['rapor_buku'];?></td>
      <td><?= $siswa['rapor_nilai'];?></td>
      <td><?= $siswa['ijasah'];?></td>
      <td><?= $siswa['kk'];?></td>
      <td><?php $siswa['status'];//pake <?php biar teu auto summon
        if($siswa['rapor_buku']=="Terisi" && $siswa['rapor_nilai']=="Terisi" && $siswa['ijasah']=="Terisi" && $siswa['kk']=="Terisi"){
          echo"<center><h5> <font color=green>DITERIMA DI KELAS $a</font></h5></center>";
        }else{echo "<center><h5> <font color=red>TIDAK DITERIMA DI KELAS $a</font></h5></center>";}
        ?></td>
      <td> <a href="detail_data.php?id_siswa=<?=$siswa['id_siswa']?>" class="btn btn-primary mb-1">Data Orang Tua Siswa</a></td>
      <?php $no++; } ?>
    </tr>
  </tbody>
  <?php }?> 


        
  </body>
</html>