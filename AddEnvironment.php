<?php 
include 'connect.php';

$conn = OpenCon();

$EnvironmentName = $_POST['EnvironmentName'];
$ClimateType = $_POST['ClimateType'];
$Countries = $_POST['Countries'];

$sql = "INSERT INTO `environment` (`EnvironmentName`, `ClimateType`, `Countries`) VALUES ('$EnvironmentName', '$ClimateType', '$Countries')";
$result = $conn->query($sql);

header('Location: enclosures.php'); 
?>