<?php

$host		= "localhost:3306";
$user		= "tugas_tugas1";
$pass		= "CaT892k3t,lh";
$db 		= "tugas_tugas1";

$koneksi  	= mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){//cek koneksi

die("Tidak bisa koneksi");
} 
$nim = "";
$nama = "";
$alamat = "";
$fakultas = "";
$error = "";
$sukses = "";


if(isset($_GET['op'])){
	$op  =  $_GET['op'];
}else{
	$op = "";
}


if($op == 'delete'){

		$id   		 =  $_GET['id'];
		$sql1		= "delete from  mahasiswa where id = '$id'";
		$q1			= mysqli_query($koneksi,$sql1);
	
		if ($q1){		
			$sukses = "berhasil hapus data";

			# code...
		}else{
			$error   = "gagal menghapus Data";
		}
	}

if($op == 'edit'){

		$id   		 =  $_GET['id'];
		$sql1		= "select * from mahasiswa where id = '$id'";
		$q1			= mysqli_query($koneksi,$sql1);
		$r1     	= mysqli_fetch_array($q1);
		$nim 		= $r1['nim'];
		$nama   	= $r1['nama'];
		$alamat 	= $r1['alamat'];
		$fakultas 	= $r1['fakultas'];

		if($nim == ''){
			$error = "Data Tidak Ditemukan";


		}

}

if(isset($_POST['simpan'])){   //create data
	$nim    = $_POST['nim'];
	$nama   = $_POST['nama'];
	$alamat    = $_POST['alamat'];
	$fakultas    = $_POST['fakultas'];

	if ($nim && $nama && $alamat && $fakultas){
			if($op == 'edit'){
				$sql1  		= "update mahasiswa set nim = '$nim', nama = '$nama', alamat = '$alamat', fakultas = '$fakultas' where id = '$id'";
				$q1		= mysqli_query($koneksi,$sql1);
				if($q1){
					$sukses = "Data berhasil diupdate";
				}else {

					$error = "data gagal diupdate";
				}

				}else{//insert data

					$sql1 = "insert into mahasiswa(nim,nama,alamat,fakultas) values ('$nim','$nama','$alamat','$fakultas')";
					$q1  = mysqli_query($koneksi,$sql1);
					if($sql1){
					$sukses = "Berhasil memasukan data baru";
		}else{
			$error	= "Gagal Memasukan data";
		}


				}

			}
		else {
			$error  = "Silahkan Masukan Semua Data";
		}
		}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="device-widh, initial-scale 1.0">
	<title>Data Mahasiswa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<style>	

	.mx-auto {width: 800px}
	.card{margin-top: 10px}
	</style>


</head>
<body>
	<div class="mx-auto">
	    <B><div>TUGAS MATA KULIAH PEMOGRAMAN WEB</div>
	    <div>NAMA : MUHAMMAD SYAFRIZAL</div>
	    <div>NPM  : 2014050002</div>
	    <div></div>
	    <div><center>APLIKASI INPUT DATA MAHASISWA BERBASIS WEB</center></div></B>
		<!-- Untuk memasukan data -->
		<div class="card">
  <div class="card-header">
    Create / Edit Data
  </div>
  <div class="card-body">
  	
  	<?php
  	if($error){
  		?>
  		<div class="alert alert-danger" role="alert">
  		<?php echo $error	?>
</div>
  	<?php
  		header("refresh:1;url=akademik.php");//5detik
  	}
 		
?>
<?php


  	if($sukses){
  		?>
  		<div class="alert alert-success" role="alert">
  		<?php echo $sukses?>
</div>

  		<?php
  		header("refresh:1;url=akademik.php");//5DETIK
  	}

  	?>
    	<form action="" method="POST">
  <div class="mb-3 row">
    <label for="nim	" class="col-sm-2 col-form-label">NIM</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="nim" 
      name="nim"	value=" <?php echo$nim  ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="nama	" class="col-sm-2 col-form-label">NAMA</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="nama" 
      name="nama"	value=" <?php echo$nama  ?>">
    </div>
  </div>


<div class="mb-3 row">
    <label for="alamat	" class="col-sm-2 col-form-label">ALAMAT</label>
    <div class="col-sm-10">
  <input type="text"  class="form-control" id="alamat" 
  name="alamat"	value=" <?php echo$alamat  ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="fakultas" class="col-sm-2 col-form-label">FAKULTAS</label>
    <div class="col-sm-10">
      <select class="form-control" name ="fakultas" id="fakultas">
      	
      	<option value="">- Pilih Jurusan -</option>
      	<option value="Teknik Komputer"<?php if ($fakultas == "Teknik Komputer") echo "selected"?>>Teknik Komputer</option>
		<option value="soshum"<?php if ($fakultas == "Teknik Kimia") echo "selected"?>>Teknik Kimia</option>
		<option value="Teknik Kimia"<?php if ($fakultas == "Teknik Sipil") echo "selected"?>>Teknik Sipil</option>
		<option value="Teknik Sipil"<?php if ($fakultas == "Teknik Elektro") echo "selected"?>>Teknik Elektro</option>
		<option value="Teknik Elektro"<?php if ($fakultas == "Teknik Lingkungan Hidup") echo "selected"?>>Teknik Lingkungan Hidup</option>
		<option value="eknik Elektro"<?php if ($fakultas == "Teknik Mesin") echo "selected"?>>Teknik Mesin</option>
      </select>
    </div>
  </div>

  <div class="col-12">
  		<input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">

  </div>

  <a href="export.php?op=Print&id=<?php echo $id?>">	<button type="button" class="btn btn-warning">Export</button>	</a>


   		 </form>

  </div>
</div>

<div class="mx-auto">
	<!-- Untuk Mengeluarkan data -->
		<div class="card">
  <div class="card-header text-white bg-secondary">
    Data Mahasiswa Fakultas Teknik
  </div>
  <div class="card-body">
    	<table class="table">
    		<thead>
    			<tr>
    				<th scope= "col">NO</th>
    				<th scope= "col">NIM</th>
    				<th scope= "col">NAMA</th>
    				<th scope= "col">ALAMAT</th>
    				<th scope= "col">FAKULTAS</th>
    				<th scope= "col">Aksi</th>

    			</tr>
    			<tbody>
    				<?php
    				$sql2	= "select * from mahasiswa order by id desc";

    				$q2	= mysqli_query($koneksi,$sql2);
    				$urut = 1;

    				while ($r2 = mysqli_fetch_array($q2)){
    					$id  	 	= $r2['id'];
    					$nim   		= $r2['nim'];
    					$nama   	= $r2['nama'];
    					$alamat   	= $r2['alamat'];
    					$fakultas   	= $r2['fakultas'];
    					?>
    					<tr>

    						<th scope="row"><?php echo $urut++ ?></th>;
    						<td scope="nim"><?php echo $nim ?></td>;
    						<td scope="nama"><?php echo $nama?></td>;
    						<td scope="alamat"><?php echo $alamat ?></td>;
    						<td scope="fakultas"><?php echo $fakultas ?></td>;
    						<td scope="row">
 							<a href="akademik.php?op=edit&id=<?php echo $id?>">	<button type="button" class="btn btn-warning">Edit</button>	</a>

 							<a href="akademik.php?op=delete&id=<?php echo $id?>" onclick="return confirm('yakin Mau delete?')"><button type="button" class="btn btn-danger">Delete</button>	</a>

    						</td>
    					</tr>
    					<?php
    				
    				}


    				?>


    		</thead>
    	</table>
    </tbody>
  </div>
</div>

	</div>
	<div></div>
	<div></div>
	<center>2022 © Tugas Mata Kuliah Pemograman Web by Muhammad Syafrizal</center>
</body>
		</html>