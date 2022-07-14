<?php
include '../config.php';

//delete barang
if (isset($_GET['kodeb'])){
	$kodeb = $_GET['kodeb'];
	$sql = "CALL hapusbarang('$kodeb')";
	if(!$res = $conn->query($sql))
		echo $sql;
	else
		header("location: barang.php");
}

//tambah barang
if(isset($_POST['proses']) && $_POST['proses']=='SIMPAN'){
	$kodeb = $_POST['kodeb'];
	$namab = $_POST['namab'];
	$kodektg =$_POST['kodektg'];

	$sql = "CALL tambahbarang('$kodeb','$namab','$kodektg')";

	if (!$res = $conn->query($sql)) {
		echo $sql;
	}else{
		header("location: barang.php");
	}
}


//update/edit tabel barang
if (isset($_POST['proses']) && $_POST['proses']=='UPDATE'){
	$kodeb = $_POST['kodeb'];
	$namab = $_POST['namab'];
	$kodektg =$_POST['kodektg'];

	$sql = "CALL updatbarang('$kodeb','$namab','$kodektg')";

	if (!$res = $conn->query($sql)) {
		echo $sql;
	}else{
		header("location: barang.php");
	}
}
?>