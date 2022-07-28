<?php 
include 'connect.php';

$conn = OpenCon();

// nav bar
echo "
<link rel='stylesheet' href='styles.css'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='index.php'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link' href='sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link' href='enclosures.php'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link' href='Animals.php'>Animals</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Events</a></li>
    <li class='nav-item'><a class='nav-link clicked' href='guest.php'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Employees</a></li>
</ul> 
<h1>Guests:</h1>
";

$view = $_POST['view'];

$sql = "SELECT $view, GuestID, GuestName FROM guests";
$result = $conn->query($sql);

if (!$result) {
    echo "Error:";
    echo "<br>";
    echo $conn->error;
}

//  	GuestID 	Gender 	GuestPhoneNum 	GuestAge 	GuestName
if ($result->num_rows > 0) {
    echo "
    <table>
    <tr>
        <th class='border-class'></th>
        <th class='border-class'>GuestID</th>
        <th class='border-class'>$view</th>
        <th class='border-class'>Name</th>
    </tr>
    ";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <th class='border-class'></th>
                <td class='border-class'>".$row["GuestID"]."</td>
                <td class='border-class'>".$row["$view"]."</td>
                <td class='border-class'>".$row["GuestName"]."</td>
            </tr>
        ";
    }
    echo "</table>";

} else {
    echo "0 results";
}
?>