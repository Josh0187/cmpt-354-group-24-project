<?php 
include 'connect.php';

$conn = OpenCon();

$EnclosureNum = $_POST['EnclosureNum'];
$SectionName = $_POST['SectionName'];
$EnclosureSize = $_POST['EnclosureSize'];
$EnvironmentName = $_POST['EnvironmentName'];

$sql = "INSERT INTO `enclosures` (`EnclosureNum`, `SectionName`, `EnclosureSize`, `EnvironmentName`) VALUES ('$EnclosureNum', '$SectionName', '$EnclosureSize','$EnvironmentName')";
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