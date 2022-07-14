<?php
include "../config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Data Detail Barang</title>
</head>
<body>
<h2><a href = '../index.php'>Kembali Ke Menu</a></h2><br>
<a href="detail_barang.php">Lihat Data</a>

<br><br><br>

<form action="d_b_pros.php" method="post">
	Kode Detail Barang:<br>
	<input type="text" name="kodedb"><br><br>
	Nama Barang:<br>
	<select name ="kodeb">
		<?php
		$sql = "SELECT * FROM barang";
		$res = $conn->query($sql);
		while ($dat=$res->fetch_array(MYSQLI_BOTH)) {
			echo "<option value='".$dat['kodeb']."'>".$dat['kodeb']." || ".$dat['namab']."</option>";
		}
		?>
	</select><br><br>
	Satuan :
	<input type="text" name="satuan"><br><br>
	Harga :
	<input type="text" name="harga"><br><br>
	Stok :
	<input type="text" name="stok"><br><br>
	<input type="submit" name="proses" value="SIMPAN">
</form>

</body>
</html>