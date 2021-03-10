
<?php
    session_start();
    function runPythonScript($uploadFile, $month) {
        $output=null;
        $retval=null;
        exec("py ../py/readQR.py $uploadFile", $output, $retval);
        // echo "Returned with status $retval and output:\n";
        // print_r($output);
        // var_dump(strpos($output[0], "re="));
        $start = strpos($output[0], "re=");
        // var_dump(strpos($output[0], "&rr="));
        $end = strpos($output[0], "&rr=");
        // echo "<br>";
        // echo "Start: {$start} End: {$end}";
        // echo "<br>";
        // echo "Sum: " . ($end - ($start + 3));
        // echo "<br>";
        // var_dump(substr($output[0], $start + 3, ($end - ($start + 3))));
        // var_dump(substr($output[0], $end, 2));
        // var_dump(substr($output[0], 0 + 3, 1));

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
