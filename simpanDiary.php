<?php
	require './config.php';

	switch ($_GET['action']) 
	{
		case 'simpanDiary':
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
		break;

		case 'simpanTodolist':
			$tanggal=$_POST['tanggal'];
			$to_do =$_POST['to_do'];
			$catatan=$_POST['catatan'];
			$kategori=$_POST['kategori'];
			$sql = "INSERT INTO `to_do_list`( `to_do`, `tanggal`, `catatan`, `status`) 
			VALUES ('$to_do','$tanggal','$catatan','$kategori')";
			if (mysqli_query($db, $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
			mysqli_close($db);
		break;

		case 'simpanWishlist':
			$nama_item =$_POST['nama_item'];
			$status =$_POST['status'];
			$link_item =$_POST['link_item'];
			$catatan =$_POST['catatan'];
			$harga =$_POST['harga'];
			$jumlah =$_POST['jumlah'];
			$sql = "INSERT INTO wish_list( `nama_item`, `link_item`, `catatan`, `harga`, `jumlah`, `status`) 
			VALUES ('$nama_item','$link_item','$catatan','$harga', '$jumlah', '$status');";
			if (mysqli_query($db, $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
			mysqli_close($db);
		break;
	}	
?>