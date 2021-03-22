<?php 
error_reporting(E_ERROR | E_PARSE);
include 'index.php';
// $uploads_dir = 'tmp';
if($_FILES["fileToUpload"]["error"] == 0) {
    $tmpPath = $_FILES['fileToUpload']['tmp_name'];
    $month = $_POST['month'];
    require_once 'includes/functions.php';
    $rfc = runPythonScript($tmpPath);

    $data = getDataForTable($rfc); 
    if(in_array($month, $data["mes"])) {
        echo "Este mes ya ha sido subido antes";
    }
    ?>

    <div class="table-container container">
        <table class="person-table">
            <tr class="row-title">
                <th>Nombre(s)</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>RFC</th>
                <th>Mes</th>
            </tr>
            <?php for($i = 0; $i < count($data["mes"]); $i++) { ?>
                <tr class="data-row">
                    <td> <?php echo $data["primer_nombre"] . " " . $data["segundo_nombre"] ?> </td>
                    <td> <?php echo $data["primer_apellido"] ?> </td>
                    <td> <?php echo $data["segundo_apellido"] ?> </td>
                    <td> <?php echo $data["rfc"] ?> </td>
                    <td> <?php echo $data["mes"][$i] ?> </td>
                </tr>

            <?php } ?>
        </table>
    </div>
<?php
    // $name = explode("tmp", basename($tmpPath))[0] . "pdf";
    // echo "<br>";
    // echo $name;
    // $filePath = "$uploads_dir/$name";
    // move_uploaded_file($tmpPath, $filePath);
} else {
    echo "Please submit a File";
}
?>

    