<?php
$tmpPath = $_FILES['fileToUpload']['tmp_name'];
$month = $_POST['month'];

require_once 'functions.php';
$result = runPythonScript($tmpPath);
$data["rfc"] = $result[0];
$data["date"] = $result[1];

// getDataForTable($data["rfc"]);

// require_once 'functions.php';
// $result = getDataForTable("MEFI851023M9A");

// echo "<pre>";
// var_dump($result);
// echo "</pre>";

echo json_encode($data);
?>