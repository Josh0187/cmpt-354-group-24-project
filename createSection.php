<?php 
include 'connect.php';

$conn = OpenCon();

$sectionName = $_POST['sectionName'];
$sectionSize = $_POST['sectionSize'];

$sql = "INSERT INTO zoosections VALUES ('$sectionName', $sectionSize)";

if (!$conn->query($sql)) {
    echo "<script>alert('Something went wrong, please try again.');</script>";
    header('Location: createSection.html');
}
else {
    header('Location: sections.php');
}
?>