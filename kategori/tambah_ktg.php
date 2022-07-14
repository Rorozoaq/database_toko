<?php
include "../config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Data Kategori</title>
</head>
<body>
<h2><a href = '../index.php'>Kembali Ke Menu</a></h2>
<a href="kategori.php">Lihat Data</a>
<br><br><br>

<form action="ktg_pros.php" method="post">
	Kode Kategori:<br>
	<input type="text" name="kodektg"><br><br>
	Nama Kategori:<br>
	<input type="text" name="namak"><br><br>
		<br>	
	</select><br><br>
	<input type="submit" name="proses" value="SIMPAN">
</form>

</body>
</html>