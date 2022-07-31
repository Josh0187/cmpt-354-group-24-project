<?php 
include 'connect.php';

$conn = OpenCon();

if (isset($_GET['sectionName'])) {
    $originalSectionName = $_GET['sectionName'];
    $originalEnclosureNum = $_GET['enclosureNum'];
}

$EnclosureSize = $_POST['EnclosureSize'];
$EnvironmentName = $_POST['EnvironmentName'];

$sql = "UPDATE `enclosures` SET EnclosureSize='$EnclosureSize', EnvironmentName='$EnvironmentName' WHERE EnclosureNum='$originalEnclosureNum' AND SectionName='$originalSectionName'";
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