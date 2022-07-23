<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT * FROM zoosections";
$result = $conn->query($sql);

// nav bar
echo "
<link rel='stylesheet' href='styles.css'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='index.html'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link clicked' href='sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Animals</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Events</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Employees</a></li>
</ul> 
<h1>Sections:</h1>
";

if ($result->num_rows > 0) {
    echo "
    <table>
    <tr>
        <th class='border-class'>Section Name</th>
        <th class='border-class'>Section Size</th>
    </tr>
    ";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td class='border-class'>".$row["SectionName"]."</td>
                <td class='border-class'>".$row["SectionSize"]."</td>
                <td><a href='giftshops.php/?sectionName=".$row["SectionName"]."'>Giftshops</a><td>
                <td><a href='#'>Concessions</a></td>
                <td><a href='#'>Enclosures</a></td>
            </tr>
        ";
    }
    echo "</table>";
    echo "<br><a href='createSection.html'>Create Section</a>";
} else {
    echo "0 results";
}
CloseCon($conn);
?>
