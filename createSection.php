<?php 
include 'connect.php';

$conn = OpenCon();

$sectionName = $_POST['sectionName'];
$sectionSize = $_POST['sectionSize'];

$sql = "INSERT INTO zoosections VALUES ('$sectionName', $sectionSize)";
$result = $conn->query($sql);

if ($result) {
    echo "Error:";
    echo "<br>";
    echo $conn->error;
}
else {
    header('Location: sections.php');
}
?>