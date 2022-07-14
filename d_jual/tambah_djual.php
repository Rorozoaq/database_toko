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
<h2><a href = '../index.php'>Kembali Ke Menu</a></h2><br>

<a href="d_jual.php">Lihat Data</a>

<br><br><br>

<form action="d_jual_pros.php" method="post">
	Nota:
	<select name="Nota">
		<?php
		$sql = "SELECT * FROM m_jual";
		$res = $conn->query($sql);
		while($dat=$res->fetch_array(MYSQLI_BOTH)) {
			echo "<option value='".$dat['Nota']."'>".$dat['tgl']."|".$dat['Nota']."</option>";
		}	
		?>
	</select><br><br><br>
	Detail jual:
	<input type="text" name="Djual"><br><br><br>
	Barang:
	<select name="kodedb">
		<?php
		$sql = "SELECT detail_barang.*, barang.namab
				FROM detail_barang 
				INNER JOIN barang
				ON barang.kodeb = detail_barang.kodeb ";
		$res = $conn->query($sql);
		while($dat=$res->fetch_array(MYSQLI_BOTH)) {
			echo "<option value='".$dat['kodedb']."'>".$dat['namab']."  ".$dat['satuan']."</option>";
		}	
		?>
	</select><br><br><br>
	Jumlah :
	<input type="number" name="jml"><br><br>

		<br><br><br>
	<input type="submit" name="proses" value="SIMPAN">
</form>
</body>
</html>