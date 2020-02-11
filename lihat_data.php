<?php
require_once 'setting_server.php';
$query = "Select * from datas";
$sql = mysqli_query($con, $query); 

$ray = array();

while ($row = mysqli_fetch_array($sql)){
    array_push($ray, array(
        "id" => $row ['id'],
        "mac" => $row ['mac'],
        "suhu" => $row ['suhu'],
        "kelembaban" => $row ['kelembaban'],
        "volt" => $row ['volt'],
        "amper" => $row ['amper'],
        "watt" => $row ['watt'],
        "kwh" => $row ['kwh'],
        "hertz" => $row ['hertz'],
        "pff" => $row ['pff']
    ));
}
echo json_encode($ray);
mysqli_close($con);
?>