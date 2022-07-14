<?php
include '../config.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Kategori Barang</title>
</head>
<body>
	<h2><a href = '../index.php'>Kembali Ke Menu</a></h2>
	<h1>Data Kategori</h1><br>
	<a href ="tambah_ktg.php"><button>Tambah Data Kategori</button></a>
	<br>
	<br>
	<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>kode Kategori</th>
			<th>Nama Kategori </th>
			<th>aksi</th>
		</tr>
	</thead>

	<tbody>
	<?php
			$sql = "CALL tampilktg();";
			$res = $conn->query($sql);
			if($res->num_rows > 0){
				$i = 0;
				while($dat = $res->fetch_assoc()){
					$i++;
					echo "<tr>
							<td>$i</td>
							<td>".$dat["kodektg"]."</td>
							<td>".$dat["namak"]."</td> 
							<td><a href = 'update_ktg.php?kodektg=".$dat['kodektg']."'>edit</a>    || <a href= 'ktg_pros.php?kodektg=".$dat['kodektg']."'> hapus</a></td>
							</tr>";
				}
			}
	 ?>	
	</tbody>
</table>

</body>
</html>