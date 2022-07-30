<?php 
include 'connect.php';

$conn = OpenCon();

$EmployeeID = $_POST['EmployeeID'];
$PhoneNum = $_POST['PhoneNum'];
$EmployeeFirstName = $_POST['EmployeeFirstName'];
$EmployeeLastName = $_POST['EmployeeLastName'];
$HireDate = $_POST['HireDate'];
$EmployeeAge = $_POST['EmployeeAge'];
$SectionName = $_POST['SectionName'];
$ZooKeeperType = $_POST['ZooKeeperType'];
$EnclosureNum = $_POST['EnclosureNum'];


$sql = "INSERT INTO `zookeepers` (`EmployeeID`, `PhoneNum`, `EmployeeFirstName`, `EmployeeLastName`, `HireDate`, `EmployeeAge`, 'SectionName','ZooKeeperType', 'EnclosureNum') 
VALUES ('$EmployeeID', '$PhoneNum', '$EmployeeFirstName','$EmployeeLastName', '$HireDate', '$EmployeeAge','$SectionName', '$ZooKeeperType', '$EnclosureNum')";
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