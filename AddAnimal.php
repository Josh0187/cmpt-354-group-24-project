<?php 
include 'connect.php';

$conn = OpenCon();

$AnimalID = $_POST['AnimalID'];
$Sex = $_POST['Sex'];
$GivenName = $_POST['GivenName'];
$Weight = $_POST['Weight'];
$DateBorn = $_POST['DateBorn'];
$EnclosureNum = $_POST['EnclosureNum'];
$SectionName = $_POST['SectionName'];
$Species = $_POST['Species'];
$Genus = $_POST['Genus'];

$sql = "INSERT INTO `animals` (`AnimalID`, `Sex`, `GivenName`, `Weight`, `DateBorn`, `EnclosureNum`, `SectionName`, `Species`, `Genus`) VALUES ('$AnimalID', '$Sex', '$GivenName','$Weight', '$DateBorn', '$EnclosureNum', '$SectionName', '$Species', '$Genus')";
$result = $conn->query($sql);

if (!$result) {
    echo "Error:";
    echo "<br>";
    echo $conn->error;
}
else {
    header('Location: Animals.php'); 
}

?>