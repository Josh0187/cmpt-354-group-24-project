<?php 
include 'connect.php';

$conn = OpenCon();

$sectionName = $_POST['SectionName'];
$sectionSize = $_POST['SectionSize'];

$sql = "INSERT INTO zoosections VALUES ('$sectionName', $sectionSize)";
echo $sql;
$result = $conn->query($sql);

if ($result) {
    echo "Error:";
    echo "<br>";
    echo $conn->error;
}
else {
    //header('Location: sections.php');
}
?>