<?php 
include 'connect.php';

$conn = OpenCon();

$EnclosureNum = $_POST['EnclosureNum'];
$SectionName = $_POST['SectionName'];
$EnclosureSize = $_POST['EnclosureSize'];
$EnvironmentName = $_POST['EnvironmentName'];

$sql = "INSERT INTO `enclosures` (`EnclosureNum`, `SectionName`, `EnclosureSize`, `EnvironmentName`) VALUES ('$EnclosureNum', '$SectionName', '$EnclosureSize','$EnvironmentName')";
$result = $conn->query($sql);

header('Location: enclosures.php'); 
?>