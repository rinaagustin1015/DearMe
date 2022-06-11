<?php
	require './config.php';
	$tanggal=$_POST['tanggal'];
	$judul=$_POST['judul'];
	$isi=$_POST['isi'];
	$kategori_id=$_POST['kategori_id'];
	$sql = "INSERT INTO `diary`( `tanggal`, `judul`, `isi`, `kategori_id`) 
	VALUES ('$tanggal','$judul','$isi','$kategori_id')";
	if (mysqli_query($db, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($db);
?>