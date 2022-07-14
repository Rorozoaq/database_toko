<?php
include "../config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Data Barang</title>
</head>
<body>
<h2><a href = '../index.php'>Kembali Ke Menu</a></h2><br><br>
<a href="barang.php">Lihat Data Barang</a>

<br><br><br>

<form action="barangpros.php" method="post">
	Kode Barang:<br>
	<input type="text" name="kodeb"><br><br>
	Nama Barang:<br>
	<input type="text" name="namab"><br><br>
	Kategori Barang :
	<select name="kodektg">
		<?php
		$sql = "SELECT * from kategori";
		$res = $conn->query($sql);
		while ($dat=$res->fetch_array(MYSQLI_BOTH)) {
			echo "<option value='".$dat['kodektg']."'>".$dat['namak']."</option>";
		}
		?> 
		<br>	
	</select><br><br>
	<input type="submit" name="proses" value="SIMPAN">
</form>

</body>
</html>