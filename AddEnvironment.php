<?php 
include 'connect.php';

$conn = OpenCon();

$EnvironmentName = $_POST['EnvironmentName'];
$ClimateType = $_POST['ClimateType'];
$Countries = $_POST['Countries'];

$sql = "INSERT INTO `environment` (`EnvironmentName`, `ClimateType`, `Countries`) VALUES ('$EnvironmentName', '$ClimateType', '$Countries')";
$result = $conn->query($sql);

if (!$result) {
    echo "Error:";
    echo "<br>";
    echo $conn->error;
}
else {
    header('Location: enclosures.php'); 
}

?>