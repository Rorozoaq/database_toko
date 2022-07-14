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
	<h2><a href = '../index.php'>Kembali Ke Menu</a></h2>
	<h1>Data Barang</h1><br>
	<a href ="tambah_djual.php"><button>Tambah Data</button></a>
	<br>
	<br>
<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>detail jual</th>
			<th>nota</th>
			<th>barang</th>
			<th>jumlah</th>
			<th>aksi</th>
		</tr>
	</thead>

	<tbody>
	<?php
			$sql = "SELECT * FROM d_jual";
			$res = $conn->query($sql);
			if($res->num_rows > 0){
				$i = 0;
				while($dat = $res->fetch_assoc()){
					$i++;
					echo "<tr>
							<td>$i</td>
							<td>".$dat["Djual"]."</td>
							<td>".$dat["Nota"]."</td>
							<td>".$dat["kodedb"]."</td>
							<td>".$dat["jml"]."</td> 
							<td><a href = 'update_djual.php?Djual=".$dat['Djual']."'>edit</a>    || <a href='d_jual_pros.php?Djual=".$dat['Djual']."'> hapus</a></td>
							</tr>";
				}
			}
	 ?>	
	</tbody>
</table>
</body>
</html> 