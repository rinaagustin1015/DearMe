<?php

switch ($_GET['action']) 
{
    case "pageDiary" :
        // PAGINATION DIARY
        require_once("./config.php");

        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $query = "SELECT * FROM diary ORDER BY tanggal DESC LIMIT {$page}, 4";
        $sql = $db->query($query);
        $data = [];

        while ($row = $sql->fetch_assoc()) {
            array_push($data, $row);
        }

        header("Content-Type: application/json");
        echo json_encode($data);
    break;
}