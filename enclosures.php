<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT * FROM enclosures";
$result = $conn->query($sql);

// nav bar
echo "
<link rel='stylesheet' href='styles.css'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='index.html'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link' href='sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link clicked' href='enclosures.php'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link' href='animals.php'>Animals</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Events</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Employees</a></li>
</ul> 
<h1>Enclosures:</h1>
";

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
            </tr>
        ";
    }
    echo "</table>";
    echo "<br><a href='AddEnclosure.html'>Add Enclosure</a>";
} else {
    echo "0 results";
}
CloseCon($conn);
?>
