<?php
include '../config.php';

//delete detail barang
if (isset($_GET['kodedb'])){
	$kodedb = $_GET['kodedb'];
	$sql = "DELETE FROM detail_barang WHERE kodedb = '$kodedb' ";
	if(!$res = $conn->query($sql))
		echo $sql;
	else
		header("location: detail_barang.php");
}

//tambah detail barang
if(isset($_POST['proses']) && $_POST['proses']=='SIMPAN'){
	$kodedb = $_POST['kodedb'];
	$kodeb = $_POST['kodeb'];
	$satuan = $_POST['satuan'];
	$harga = $_POST['harga'];
	$stok =$_POST['stok'];

	$sql = "CALL tambah_db_barang('$kodedb','$kodeb','$satuan','$harga','$stok')";

	if (!$res = $conn->query($sql)) {
		echo $sql;
	}else{
		header("location: detail_barang.php");
	}
}


//update/edit tabel detail barang
if (isset($_POST['proses']) && $_POST['proses']=='UPDATE'){
	$kodedb = $_POST['kodedb'];
	$kodeb = $_POST['kodeb'];
	$satuan = $_POST['satuan'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$sql = "UPDATE detail_barang SET kodedb = '$kodedb', kodeb = '$kodeb' , satuan='$satuan', harga='$harga', stok='$stok'
			WHERE kodedb= '$kodedb'";

	if (!$res = $conn->query($sql)) {
		echo $sql;
	}else{
		header("location: detail_barang.php");
	}
}
?>