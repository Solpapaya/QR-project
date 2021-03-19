
<?php
    session_start();
    function runPythonScript($uploadFile, $month) {
        $output=null;
        exec("py ../py/readQR.py $uploadFile", $output);
        
        $start = strpos($output[0], "re=");
        
        $end = strpos($output[0], "&rr=");

        $rfc = substr($output[0], $start + 3, ($end - ($start + 3)));
        $_SESSION["data"] = [$rfc, $month];
        include 'connect.php';
    }

    if($_FILES["fileToUpload"]["error"] == 0) {
        // $file = $_FILES["fileToUpload"];
        // foreach ($file as $key => $value) {
        //     echo "{$key} => {$value} <br>";
        // }
        
        // $uploadDir = 'tmpPdf/';
        // $uploadFile = $uploadDir . basename($_FILES['fileToUpload']['name']);    
        // echo "<p>";
        $tmpPath = $_FILES['fileToUpload']['tmp_name'];
        $month = $_POST['month'];
        // echo $month;
        runPythonScript($tmpPath, $month);

        // if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadFile)) {
        //     // echo "File is valid, and was successfully uploaded.";
        //     // echo "<p>";
        //     // echo $uploadFile;
        //     runPythonScript($uploadFile);
        // } else {
        //     echo "Upload failed";
        // }
    } else {
        echo "Please submit a File";
    }
?>
