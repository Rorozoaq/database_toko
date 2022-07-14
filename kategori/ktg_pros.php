<?php
include '../config.php';

//delete kategori
if (isset($_GET['kodektg'])){
	$kodektg = $_GET['kodektg'];
	$sql = "CALL hapusktg('$kodektg')";
	if(!$res = $conn->query($sql))
		echo $sql;
	else
		header("location: kategori.php");
}

//tambah kategori
if(isset($_POST['proses']) && $_POST['proses']=='SIMPAN'){
	$kodektg = $_POST['kodektg'];
	$namak = $_POST['namak'];

	$sql = "INSERT INTO kategori VALUES ('$kodektg','$namak')";

	if (!$res = $conn->query($sql)) {
		echo $sql;
	}else{
		header("location: kategori.php");
	}
}


//update/edit tabel barang
 if (isset($_POST['proses']) && $_POST['proses']=='UPDATE'){
	$kodektg =$_POST['kodektg'];
	$namak =$_POST['namak'];

	$sql = "UPDATE kategori
			SET kodektg='$kodektg', namak='$namak'
			WHERE kodektg='$kodektg' ";

	if (!$res = $conn->query($sql)) {
		echo $sql;
	}else{
		header("location: kategori.php");
	}
}

?>