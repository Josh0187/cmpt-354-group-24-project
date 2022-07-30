<?php
include 'connect.php';

$conn = OpenCon();
$sql = "SELECT * FROM zoosections";
$result = $conn->query($sql);

// nav bar
echo "
<link rel='stylesheet' href='styles.css?version=2'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='index.php'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link clicked' href='sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link' href='enclosures.php'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link' href='animals.php'>Animals</a></li>
    <li class='nav-item'><a class='nav-link' href='events.php'>Events</a></li>
    <li class='nav-item'><a class='nav-link' href='guest.php'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='employees.php'>Employees</a></li>
</ul> 
<h1>Sections:</h1>
";

if ($result->num_rows > 0) {
    echo "
    <table class='table-style'>
    <thead>
        <tr>
            <th class='border-class'>Section Name</th>
            <th class='border-class'>Section Size</th>
            <th class='border-class'>Giftshops</th>
            <th class='border-class'>Concessions</th>
            <th class='border-class'>Enclosures</th>
            <th class='border-class'>Delete</th>
        </tr>
    </thead>
    <tbody>
    ";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td class='border-class'>".$row["SectionName"]."</td>
                <td class='border-class'>".$row["SectionSize"]."</td>
                <td><a href='giftshops.php/?sectionName=".$row["SectionName"]."'>Giftshops</a></td>
                <td><a href='concessions.php/?sectionName=".$row["SectionName"]."'>Concessions</a></td>
                <td><a href='enclosures.php/?sectionName=".$row["SectionName"]."'>Enclosures</a></td>
                <td><a href='delete.php?table=zoosections&col=SectionName&val=".$row["SectionName"]."&back=sections.php'>Delete</a></td>
            </tr>
        ";
    }
    echo "
    <tbody>
    </table>";
    echo "<br><a class='form-link' href='createSectionForm.php'>Create Section</a>";
} else {
    echo "0 results";
}
CloseCon($conn);
?>
