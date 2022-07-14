<?php
include "../config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Data transaksi</title>
</head>
<body>
<h2><a href = '../index.php'>Kembali Ke Menu</a></h2><br>
<a href="m_jual.php">lihat data</a>

<br><br><br>

<form action="mjual_pros.php" method="post">
	Nota :<br>
	<input type="text" name="Nota"><br><br>
	<!-- Tanggal : <br>
	<input type = "text" name="tgl"><br><br> -->	
	<input type="submit" name="proses" value="SIMPAN">
</form>

</body>
</html>