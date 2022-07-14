<?php
include '../config.php';
date_default_timezone_set('Asia/Jakarta');
//delete 
if (isset($_GET['Nota'])){
	$Nota = $_GET['Nota'];
	$sql = "DELETE FROM m_jual WHERE Nota='$Nota'";
	if(!$res = $conn->query($sql))
		echo $sql;
	else
		header("location: m_jual.php");
}

//tambah
if(isset($_POST['proses']) && $_POST['proses']=='SIMPAN'){
	$Nota = $_POST['Nota'];
	$tgl = date('Y-m-d');

	$sql = "CALL tambah_nota('$Nota','$tgl')";

	if (!$res = $conn->query($sql)) {
		echo $sql;
	}else{
		header("location: m_jual.php");
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