<?php
//import koneksi ke database

$host   = "localhost:3306";
$user   = "tugas_tugas1";
$pass   = "CaT892k3t,lh";
$db     = "tugas_tugas1";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){//cek koneksi

die("Tidak bisa koneksi");
} 
?>
<html>
<head>
  <title>DATA MAHASISWA</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>DATA MAHASISWA</h2>
			<h4>(AKADEMIK)</h4>
				<div class="data-tables datatable-dark">
					
					<table class="table table bordered" id="menuexport" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th scope= "col">NO</th>
            <th scope= "col">NIM</th>
            <th scope= "col">NAMA</th>
            <th scope= "col">ALAMAT</th>
            <th scope= "col">FAKULTAS</th>
      

          </tr>
          <tbody>
            <?php
            $sql2 = "select * from mahasiswa order by id desc";

            $q2 = mysqli_query($koneksi,$sql2);
            $urut = 1;

            while ($r2 = mysqli_fetch_array($q2)){
              $id     = $r2['id'];
              $nim      = $r2['nim'];
              $nama     = $r2['nama'];
              $alamat     = $r2['alamat'];
              $fakultas     = $r2['fakultas'];
              ?>
              <tr>

                <th scope="row"><?php echo $urut++ ?></th>;
                <td scope="nim"><?php echo $nim ?></td>;
                <td scope="nama"><?php echo $nama?></td>;
                <td scope="alamat"><?php echo $alamat ?></td>;
                <td scope="fakultas"><?php echo $fakultas ?></td>;
              
              
  

                </td>
              </tr>
              <?php
            
            }


            ?>


        </thead>
      </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#menuexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>