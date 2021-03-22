<?php 
$data = $_SESSION["data"];
$rfc = $data[0];
$month = $data[1];

$dbconn = pg_connect("host=localhost port=5432 dbname=qr user=postgres password=password");

$queryPerson = "SELECT * FROM persona WHERE rfc = '{$rfc}'";
$result = pg_query($dbconn, $queryPerson);
$person = pg_fetch_all($result);
$fullName =  $person[0]['primer_nombre']
    . " " . $person[0]['segundo_nombre']
    . " " . $person[0]['primer_apellido']
    . " " . $person[0]['segundo_apellido'];


$queryMonths = "SELECT mes FROM comprobante_fiscal WHERE rfc_emisor = '{$rfc}'";
$result = pg_query($dbconn, $queryMonths);
$monthsResult = pg_fetch_all($result);
$months = [];
foreach($monthsResult as $m) {
    array_push($months, $m['mes']);
}
?>

<?php
if(in_array($month, $months)) { ?>
    <h1>Ya existe el Comprobante Fiscal de </h1> 
    <h2> <?php echo $fullName ?> </h2>
    <h1>Del Mes de </h1>
    <h2> <?php echo $month ?> </h2>
<?php
} else { ?>
    <ul>
        <li><?php echo $fullName ?></li>
        <ul>
            <?php foreach($months as $month) {  ?>
                <li> <?php echo $month ?> </li>
            <?php
            } ?>
        </ul>
    </ul>
<?php
} ?>