<?php 
include 'connect.php';

$conn = OpenCon();

if (isset($_GET['sectionName'])) {
    $originalSectionName = $_GET['sectionName'];
    $originalEnclosureNum = $_GET['enclosureNum'];
}

$EnclosureNum = $_POST['EnclosureNum'];
$SectionName = $_POST['SectionName'];
$EnclosureSize = $_POST['EnclosureSize'];
$EnvironmentName = $_POST['EnvironmentName'];

$sql = "UPDATE `enclosures` SET EnclosureNum='$EnclosureNum', SectionName='$SectionName', EnclosureSize='$EnclosureSize', EnvironmentName='$EnvironmentName' WHERE EnclosureNum='$originalEnclosureNum' AND SectionName='$originalSectionName'";
$result = $conn->query($sql);

if (!$result) {
    echo "Error:";
    echo "<br>";
    echo $conn->error;
}
else {
    header('Location: ../enclosures.php'); 
}

?>