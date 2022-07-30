<?php
include 'connect.php';

$conn = OpenCon();
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// nav bar
echo "
<link rel='stylesheet' href='styles.css'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='index.php'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link' href='sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link' href='enclosures.php'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link' href='animals.php'>Animals</a></li>
    <li class='nav-item'><a class='nav-link clicked' href='events.php'>Events</a></li>
    <li class='nav-item'><a class='nav-link' href='guest.php'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='employees.php'>Employees</a></li>
</ul> 
<h1>Events:</h1>
";

//  EventName 	EventTime 	DurationMin 	
if ($result->num_rows > 0) {
    echo "
    <table>
    <tr>
        <th class='border-class'>EventName</th>
        <th class='border-class'>EventTime</th>
        <th class='border-class'>DurationMin</th>
    </tr>
    ";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td class='border-class'>".$row["EventName"]."</td>
                <td class='border-class'>".$row["EventTime"]."</td>
                <td class='border-class'>".$row["DurationMin"]."</td>
            </tr>
        ";
    }
    echo "</table>";
} else {
    echo "0 results";
}
CloseCon($conn);
?>
