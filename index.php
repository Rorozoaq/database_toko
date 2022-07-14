<?php
include 'config.php';
include 'menu.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Penjualan</title>
</head>
<body>

	<h1 text align="center">Data Penjualan</h1><br>
	<!-- <a href ="add_transaksi.php"><button>Tambah Data</button></a> -->
<table border="1" width="100%">
	<thead>
		<tr>
			<th>Nota</th>
			<th>tanggal</th>
			<th>kode_transaksi</th>
			<th>barang</th>
			<th>satuan</th>
			<th>harga</th>
			<th>jumlah</th>
			<th>Total</th>
		</tr>
	</thead>

	<tbody>
	<?php
			$sql = "CALL tampil_index()";
			$res = $conn->query($sql);
			if($res->num_rows > 0){
				$i = 0;
				while($dat = $res->fetch_assoc()){
					$i++;
					echo "<tr>
							<td>".$dat["Nota"]."</td>
							<td>".$dat["tgl"]."</td>
							<td>".$dat["Djual"]."</td>
							<td>".$dat["namab"]."</td>
							<td>".$dat["satuan"]."</td>
							<td>".$dat["harga"]."</td>
							<td>".$dat["jml"]."</td>
							<td>".$dat["total"]."</td>
							</tr>";
				}
			}
	 ?>	
	</tbody>
</table>
</body>
</html> 