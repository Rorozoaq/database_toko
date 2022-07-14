 <?php
include '../config.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Barang</title>
</head>
<body>
	<h2><a href = '../index.php'><button>Kembali Ke Menu</button></a></h2>
	<h1>Data Barang</h1><br>
	<a href ="tambah_barang.php"><button>Tambah Data Barang</button></a>
	<br>
	<br>
<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>kode barang</th>
			<th>nama barang</th>
			<th>kode kategori</th>
			<th>nama kategori</th>
			<th>aksi</th>
		</tr>
	</thead>

	<tbody>
	<?php
			$sql = "CALL tampil_barang()";
			$res = $conn->query($sql);
			if($res->num_rows > 0){
				$i = 0;
				while($dat = $res->fetch_assoc()){
					$i++;
					echo "<tr>
							<td>$i</td>
							<td>".$dat["kodeb"]."</td>
							<td>".$dat["namab"]."</td>
							<td>".$dat["kodektg"]."</td>
							<td>".$dat["namak"]."</td> 
							<td ><a href = 'update_barang.php?kodeb=".$dat['kodeb']."'><button>edit</button></a>    || <a href='barangpros.php?kodeb=".$dat['kodeb']."'><button>hapus</button></a></td>
							</tr>";
				}
			}
	 ?>	
	</tbody>
</table>
</body>
</html> 