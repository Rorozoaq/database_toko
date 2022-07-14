<?php
include '../config.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Detail Barang</title>
</head>
<body>
	<h2><a href = '../index.php'>Kembali Ke Menu</a></h2>
	<h1>Data Detail Barang</h1><br>
	<a href ="add_d_b.php"><button>Tambah Data Detail Barang</button></a>
	<br>
	<br>
<table border="1">
	<thead>
		<tr>
			<th>Nama Barang</th>
			<th>kode Detail</th>
			<th>kode barang</th>
			<th>satuan barang</th>
			<th>Harga</th>
			<th>stok</th>
			<th>aksi</th>
		</tr>
	</thead>

	<tbody>
	<?php
			$sql = "SELECT barang.namab, detail_barang.*
					FROM detail_barang INNER JOIN barang
					ON
					detail_barang.kodeb = barang.kodeb";
			$res = $conn->query($sql);
			if($res->num_rows > 0){
				$i = 0;
				while($dat = $res->fetch_assoc()){
					$i++;
					echo "<tr>
							<td>".$dat["namab"]."</td>
							<td>".$dat["kodedb"]."</td>
							<td>".$dat["kodeb"]."</td>		
							<td>".$dat["satuan"]."</td>
							<td>Rp.".$dat["harga"]."</td>
							<td>".$dat["stok"]."</td> 
							<td><a href = 'upd_d_b.php?kodedb=".$dat['kodedb']."'>edit</a>    || <a href='d_b_pros.php?kodedb=".$dat['kodedb']."'> hapus</a></td>
							</tr>";
				}
			}
	 ?>	
	</tbody>
</table>
</body>
</html> 