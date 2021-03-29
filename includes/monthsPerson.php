<?php
// Receive temporary file location sent by fetchData() JavaScript function
$tmpPath = $_FILES['fileToUpload']['tmp_name'];

// For being able to use the runPythonScript() PHP function
require_once 'functions.php';

// Decode QR code & Get Date from Uploaded Tax Receipt
$result = runPythonScript($tmpPath);
// Check if there was an error in the Python Script
if(count($result) == 1) {
    $data["error"]["id"] = 1;
    $data["error"]["type"] = $result[0];
    echo json_encode($data);    
    exit;
}
// If Python Script goes well we have the RFC and Date
$rfc = $result[0];
$date = $result[1];
$dateSplit = explode("-", $date);
$year = $dateSplit[0];
$month = $dateSplit[1];


try {    
    // Import connexion
    require 'database.php';

    // SQL query
    // Check if Tax Receipt Already Exists
    $queryTaxExists = "SELECT 
        EXTRACT (YEAR FROM fecha_emision) AS anio_emision,
        EXTRACT (MONTH FROM fecha_emision) AS mes_emision
        FROM comprobante_fiscal
        WHERE rfc_emisor = '$rfc' 
        AND EXTRACT(MONTH FROM fecha_emision) = $month 
        AND EXTRACT(YEAR FROM fecha_emision) = $year;";

    // $queryTaxExists = "SELECT 
    //     EXTRACT (YEAR FROM fecha_emision) AS anio_emision,
    //     EXTRACT (MONTH FROM fecha_emision) AS mes_emision
    //     FROM comprobante_fiscal
    //     WHERE rfc_emisor = 'SUCC961125A15' 
    //     AND EXTRACT(MONTH FROM fecha_emision) = 1 
    //     AND EXTRACT(YEAR FROM fecha_emision) = 2019;";
    
    // Obtain Results
    $resultTaxExists = pg_query($dbconn, $queryTaxExists);
    $row = pg_fetch_assoc($resultTaxExists);
    // Create an Error Message if Tax Receipt Already Exists
    if($row) {
        $data["error"]["id"] = 3;
        $data["error"]["type"] = "Tax Receipt Already Exists";
        echo json_encode($data);    
        exit;
    }

    // Insert Date and RFC to Tax Receipt Table
    $data["rfc"] = $rfc;
    $data["date"] = $date;
    $data["error"] = null;
    echo json_encode($data);
} catch(Exception $e) {
    // Couldn't stablish Database Connexion & Creates Error Message
    $data["error"]["id"] = 2;
    $data["error"]["type"] = "Database Error";
    echo json_encode($data);    
    exit;
}
?>