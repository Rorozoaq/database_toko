<?php
include '../config.php';

//delete 
if (isset($_GET['Djual'])){
	$Djual = $_GET['Djual'];
	$sql = "DELETE FROM d_jual WHERE Djual = '$Djual' ";
	if(!$res = $conn->query($sql))
		echo $sql;
	else
		header("location: d_jual.php");
}

//tambah djual
if(isset($_POST['proses']) && $_POST['proses']=='SIMPAN'){
	$Djual = $_POST['Djual'];
	$Nota = $_POST['Nota'];
	$kodedb = $_POST['kodedb'];
	$jml = $_POST['jml'];

	$sql = "INSERT INTO d_jual
			VALUES ('$Djual','$Nota','$kodedb','$jml')";

	if (!$res = $conn->query($sql)) {
		echo $sql;
	}else{
		header("location: d_jual.php");
	}
}


//update/edit tabel detail barang
if (isset($_POST['proses']) && $_POST['proses']=='UPDATE'){
	$Djual = $_POST['Djual'];
	$Nota = $_POST['Nota'];
	$kodedb = $_POST['kodedb'];
	$jml = $_POST['jml'];

	$sql = "UPDATE d_jual SET Djual = '$Djual', Nota = '$Nota' , kodedb='$kodedb', jml='$jml'
			WHERE Djual= '$Djual'";

	if (!$res = $conn->query($sql)) {
		echo $sql;
	}else{
		header("location: d_jual.php");
	}
}
?>