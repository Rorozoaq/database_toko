<?php
include '../config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT DATA DETAIL BARANG</title>
</head>
<body>
<h2><a href = '../index.php'>Kembali Ke Menu</a></h2>	
<?php
$kodedb = $_GET['kodedb'];
$data = mysqli_query($conn,"SELECT * FROM detail_barang WHERE kodedb='$kodedb'");
while($d = mysqli_fetch_array($data)){
//var_dump($d);
 ?>
<a href="upd_d_b.php?kodedb=<?php echo $kodedb ?>">UPDATE DATA DETAIL BARANG</a>
<br>
<a href="detail_barang.php">Lihat Data Detail Barang</a>
<br><br><br>
<form action="d_b_pros.php" method="post">
	Kode Detail Barang:<br>
	<input type="text" name="kodedb" value="<?php echo $d['kodedb'];?>"readonly>
	<br>
	<br>
	Nama Barang:
	<select name="kodeb" value="<?=$d['kodeb'] ?>">
		<?php
		$sql = "SELECT * FROM barang";
		$res = $conn->query($sql);
		while ($dat= $res->fetch_assoc()){?><option value="<?=$dat['kodeb']?>"<?php if($dat['kodeb'] == $d['kodeb']){echo "selected";} ?>><?=$dat['namab']?>		
		</option>
		<?php } ?>
		?>	
	</select>
	<br><br>
	Satuan :
	<input type="text" name="satuan" value="<?=$d['satuan'];?>"><br><br>
	Harga : Rp.
	<input type="int" name="harga" value="<?=$d['harga'];?>"><br><br>
	Stok :
	<input type="text" name="stok" value="<?=$d['stok']?>">
	<br><br><br>	
	<input type="submit" name="proses" value="UPDATE">
	
</form>
</body>
<?php
}
?>
</html>