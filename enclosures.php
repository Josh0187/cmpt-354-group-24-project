<?php
include 'connect.php';
$conn = OpenCon();

// if sectionName given, query only enclosures in given sectionName
if (isset($_GET['sectionName'])) {
    $sectionName = $_GET['sectionName'];
    $sql = "SELECT * FROM enclosures WHERE SectionName='$sectionName'";
    // nav bar
    echo "
    <link rel='stylesheet' href='../styles.css'>
    <ul class='nav-list'>
        <li class='nav-item'><a class='nav-link' href='../index.php'>Dashboard</a></li>
        <li class='nav-item'><a class='nav-link' href='../sections.php'>Sections</a></li>
        <li class='nav-item'><a class='nav-link clicked' href='../enclosures.php'>Enclosures</a></li>
        <li class='nav-item'><a class='nav-link' href='../animals.php'>Animals</a></li>
        <li class='nav-item'><a class='nav-link' href='#'>Events</a></li>
        <li class='nav-item'><a class='nav-link' href='#'>Guests</a></li>
        <li class='nav-item'><a class='nav-link' href='#'>Employees</a></li>
    </ul> 
    <h1>Enclosures in section: $sectionName</h1>
";
}
// otherwise get all giftshops
else {
    $sql = "SELECT * FROM enclosures";

    // nav bar
    echo "
    <link rel='stylesheet' href='styles.css'>
    <ul class='nav-list'>
        <li class='nav-item'><a class='nav-link' href='index.php'>Dashboard</a></li>
        <li class='nav-item'><a class='nav-link' href='sections.php'>Sections</a></li>
        <li class='nav-item'><a class='nav-link clicked' href='enclosures.php'>Enclosures</a></li>
        <li class='nav-item'><a class='nav-link' href='animals.php'>Animals</a></li>
        <li class='nav-item'><a class='nav-link' href='events.php'>Events</a></li>
        <li class='nav-item'><a class='nav-link' href='guest.php'>Guests</a></li>
        <li class='nav-item'><a class='nav-link' href='employees.php'>Employees</a></li>
    </ul> 
    <h1>Enclosures:</h1>
";
}

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "
    <table>
    <tr>
        <th class='border-class'>Enclosure Num</th>
        <th class='border-class'>Section Name</th>
        <th class='border-class'>Enclosure Size</th>
        <th class='border-class'>Environment Name</th>
    </tr>
    ";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td class='border-class'>".$row["EnclosureNum"]."</td>
                <td class='border-class'>".$row["SectionName"]."</td>
                <td class='border-class'>".$row["EnclosureSize"]."</td>
                <td class='border-class'>".$row["EnvironmentName"]."</td>
                <td class='border-class'><a href='updateEnclosureForm.php/?sectionName=".$row["SectionName"]."&enclosureNum=".$row["EnclosureNum"]."'>Update</a></td>
            </tr>
        ";
    }
    echo "</table>";
    echo "<br><a href='AddEnclosureForm.php'>Add Enclosure</a>";
    echo "<br><a href='AddEnvironmentForm.php'>Add Environment</a>";
} else {
    echo "0 results";
}
CloseCon($conn);
?>
