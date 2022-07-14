<?php
include '../config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT DATA DJUAL</title>
</head>
<body>
<h2><a href = '../index.php'>Kembali Ke Menu</a></h2>	
<?php
$Djual = $_GET['Djual'];
$data = mysqli_query($conn,"SELECT * FROM d_jual WHERE Djual='$Djual'");
while($d = mysqli_fetch_array($data)){
//var_dump($d);
 ?>
<a href="update_djual.php?kodeb=<?php echo $Djual ?>">UPDATE DATA Penjualan</a>
<br>
<a href="d_jual.php">Lihat Data </a>
<br><br><br>
<form action="d_jual_pros.php" method="post">
	Detail jual:
	<input type="text" name="Djual" value="<?php echo $d['Djual'];?>"readonly>
	<br>
	<br>
	Nota:
	<select name="Nota" value = "<?php echo $d['Nota']?>">
		<?php
		$sql = "SELECT * FROM m_jual";
		$res = $conn->query($sql);
		while ($dat= $res->fetch_assoc()){?><option value="<?=$dat['Nota']?>"<?php if($dat['Nota'] == $d['Nota']){echo "selected";} ?>><?=$dat['Nota']?>		
		</option>
		<?php } ?>
		?>	
	</select>
	<br><br>
	Barang :
	<select name="kodedb" value="<?=$d['kodedb']?>" >
		<?php
		$sql = "SELECT * FROM detail_barang";
		$res = $conn->query($sql);
		while ($dat= $res->fetch_assoc()){?><option value="<?=$dat['kodedb']?>"<?php if($dat['kodedb'] == $d['kodedb']){echo "selected";} ?>><?=$dat['kodedb']?>		
		</option>
		<?php } ?>
		?>	
	</select><br><br>
	Jumlah : 
	<input type="number" name="jml" value="<?php echo $d['jml']?>">
	<br><br><br>	
	<input type="submit" name="proses" value="UPDATE">
	
</form>
<?php
}
?>
</body>
</html>