<?php
	require './config.php';

	switch ($_GET['action']) 
	{
		case 'updateDiary':
            $id_update=$_POST['id_update'];
			$tanggal=$_POST['tanggal'];
			$judul=$_POST['judul'];
			$isi=$_POST['isi'];
			$kategori_id=$_POST['kategori_id'];
			$sql = "UPDATE `diary` SET `tanggal`='$tanggal',
                            `judul`='$judul',
                            `isi`='$isi',
                            `kategori_id`='$kategori_id' WHERE id_judul=$id_update";
			if (mysqli_query($db, $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
			mysqli_close($db);
		break;

		case 'updateWishlist':
            $id_update=$_POST['id_update'];
			$nama_item =$_POST['nama_item'];
			$kategori =$_POST['kategori'];
			$img =$_POST['img'];
			$harga =$_POST['harga'];
			$jumlah =$_POST['jumlah'];
			$catatan =$_POST['catatan'];
			$sql = "UPDATE `wish_list` SET 
            `nama_item`='$nama_item',
            `img`='$img',
            `catatan`='[value-4]',
            `harga`='$harga',
            `jumlah`='$jumlah',
            `status`='$kategori' WHERE id='$id_update'";
			if (mysqli_query($db, $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
			mysqli_close($db);
		break;

		case 'updateTodolist':
            $id_update=$_POST['id_update'];
			$tanggal=$_POST['tanggal'];
			$to_do =$_POST['to_do'];
			$catatan=$_POST['catatan'];
			$kategori=$_POST['kategori'];
			$sql = "UPDATE `to_do_list` SET `to_do`='$to_do',
            `tanggal`='$tanggal',`catatan`='$catatan',`status`='$kategori' WHERE id='$id_update'";
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