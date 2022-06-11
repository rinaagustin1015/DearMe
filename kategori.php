<?php

require './config.php';

$query = "SELECT * FROM kategori ORDER BY kategori";
$sql = $db->query($query);
$data = [];

while ($row = $sql->fetch_assoc()) {
    array_push($data, $row);
}

header("Content-Type: application/json");
echo json_encode($data);
