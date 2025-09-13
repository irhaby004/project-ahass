<?php
require_once "../../app/Penilaian.php";

header('Content-Type: application/json'); // WAJIB
$alt = new App\Penilaian();

$data = $alt->get_json($_GET['id']);
echo json_encode($data); // WAJIB pakai ini
?>