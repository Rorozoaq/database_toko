<?php
include '../config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT DATA KATEGORI</title>
</head>
<body>
<h2><a href = '../index.php'>Kembali Ke Menu</a></h2>
<?php
$kodektg = $_GET['kodektg'];
$data = mysqli_query($conn,"SELECT * FROM kategori WHERE kodektg='$kodektg'");
while($d = mysqli_fetch_array($data)){
//var_dump($d);
 ?>
<br>
<a href="kateogori.php">Lihat Data Kategori</a>
<br><br><br>
<form action="ktg_pros.php" method="post">
	Kode Kategori:<br>
	<input type="text" name="kodektg" value="<?php echo $d['kodektg'];?>"readonly>
	<br>
	<br>
	Nama Kategori:<br>
	<input type="text" name="namak" value="<?=$d['namak']?>">
	<br><br>
	<br><br><br>	
	<input type="submit" name="proses" value="UPDATE">
	
</form>
<?php
}
?>
</body>
</html>