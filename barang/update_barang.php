<?php
include '../config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT DATA BARANG</title>
</head>
<body>
<h2><a href = '../index.php'>Kembali Ke Menu</a></h2>	
<?php
$kodeb = $_GET['kodeb'];
$data = mysqli_query($conn,"SELECT * FROM barang WHERE kodeb='$kodeb'");
while($d = mysqli_fetch_array($data)){
//var_dump($d);
 ?>
<!-- <a href="update_barang.php?kodeb=<?php echo $kodeb ?>">UPDATE DATA BARANG</a> -->
<br>
<a href="barang.php">Lihat Data Barang</a>
<br><br><br>
<form action="barangpros.php" method="post">
	Kode Barang:<br>
	<input type="text" name="kodeb" value="<?php echo $d['kodeb'];?>"readonly>
	<br>
	<br>
	Nama Barang:<br>
	<input type="text" name="namab" value="<?=$d['namab']?>">
	<br><br>
	Kategori Barang :
	<select name="kodektg" value="<?=$d['kodektg']?>" >
		<?php
		$sql = "SELECT * FROM kategori";
		$res = $conn->query($sql);
		while ($dat= $res->fetch_assoc()){?><option value="<?=$dat['kodektg']?>"<?php if($dat['kodektg'] == $d['kodektg']){echo "selected";} ?>><?=$dat['namak']?>		
		</option>
		<?php } ?>
		?>
		
	</select>
	<br><br><br>	
	<input type="submit" name="proses" value="UPDATE">
	
</form>
<?php
}
?>
</body>
</html>