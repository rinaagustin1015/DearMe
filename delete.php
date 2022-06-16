<?php
	require './config.php';

	switch ($_GET['action']) 
	{
		case 'deleteDiary':
            $id=$_POST['id_update'];
            $sql = "DELETE FROM diary WHERE id_judul=$id";
            if (mysqli_query($db, $sql)) {
                echo json_encode(array("statusCode"=>200));
            } 
            else {
                echo json_encode(array("statusCode"=>201));
            }
            mysqli_close($db);
		break;

		case 'deleteWishlist':
            $id=$_GET['id'];
            $sql = "DELETE FROM wish_list WHERE id=$id";
            if (mysqli_query($db, $sql)) {     
                echo ("<script LANGUAGE='JavaScript'>
                        window.alert('WISHLIST kamu berhasil dihapus >.<');
                        window.location.href='wishlist.php';
                        </script>");
            } 
            else {
                echo json_encode(array("statusCode"=>201));
            }
            mysqli_close($db);
		break;

		case 'deleteTodolist':
            $id=$_GET['id'];
            $sql = "DELETE FROM to_do_list WHERE id=$id";
            if (mysqli_query($db, $sql)) {     
                echo ("<script LANGUAGE='JavaScript'>
                        window.alert('TODO kamu berhasil dihapus >.<');
                        window.location.href='todolist.php';
                        </script>");
            } 
            else {
                echo json_encode(array("statusCode"=>201));
            }
            mysqli_close($db);
		break;
	}	
?>