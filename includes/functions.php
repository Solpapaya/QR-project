<?php 
function runPythonScript($uploadFile) {
    $output=null;
    exec("py ../py/readQR.py $uploadFile 2>&1", $output);
    
    if(count($output) == 1) return $output;

    $start = strpos($output[0], "re=");
    
    $end = strpos($output[0], "&rr=");

    $rfc = substr($output[0], $start + 3, ($end - ($start + 3)));

    $date = $output[1];

    return [$rfc, $date];
}

function getDataForTable($rfc) {
    try{
        // Import connexion
        require_once 'database.php';
    
        // SQL query
        $sqlPerson = "SELECT * FROM persona WHERE rfc = '{$rfc}'";
        $queryPerson = pg_query($dbconn, $sqlPerson);
    
        $sqlMonth = "SELECT mes FROM comprobante_fiscal WHERE rfc_emisor = '{$rfc}' ORDER BY mes ASC";
        $queryMonth = pg_query($dbconn, $sqlMonth);
        
        // Obtain Results
        $result = pg_fetch_assoc($queryPerson);
        $i = 0;
        while($row = pg_fetch_assoc($queryMonth)) {
            $result["mes"][$i] = $row["mes"];
            $i++;
        }
        
        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";
    
        return $result;
    }catch(Exception $e) {
        echo $e->getMessage();
    }
}
?>