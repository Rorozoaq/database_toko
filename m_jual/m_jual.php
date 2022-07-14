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
	<a href ="tambah_mjual.php"><button>Tambah Nota</button></a>
	<br>
	<br>
<table border="1">
	<thead>
		<tr>
			<th>Nota</th>
			<th>tanggal</th>
			<th>aksi</th>
		</tr>
	</thead>

	<tbody>
	<?php
			$sql = "SELECT * FROM m_jual";
			$res = $conn->query($sql);
			if($res->num_rows > 0){
				$i = 0;
				while($dat = $res->fetch_assoc()){
					$i++;
					echo "<tr>
							<td>".$dat["Nota"]."</td>
							<td>".$dat["tgl"]."</td> 
							<td><a href='mjual_pros.php?Nota=".$dat['Nota']."'>hapus</a></td>
							</tr>";
				}
			}
	 ?>	
	</tbody>
</table><br><br>
	 <a href="../d_jual/tambah_djual.php"><button>lanjut ke transaksi</button></a>
</body>
</html> 