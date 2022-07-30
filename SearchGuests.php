<?php 
include 'connect.php';

$conn = OpenCon();

// nav bar
echo "
<link rel='stylesheet' href='styles.css?version=2'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='index.php'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link' href='sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link' href='enclosures.php'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link' href='Animals.php'>Animals</a></li>
    <li class='nav-item'><a class='nav-link' href='events.php'>Events</a></li>
    <li class='nav-item'><a class='nav-link clicked' href='guest.php'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='employees.php'>Employees</a></li>
</ul> 
<h1>Guests:</h1>
";

$GuestName = $_POST['GuestName'];

$sql = "SELECT * FROM guests, memberships WHERE GuestName = '$GuestName' AND guests.GuestID = memberships.GuestID";
$result = $conn->query($sql);

if (!$result) {
    echo "Error:";
    echo "<br>";
    echo $conn->error;
}

//  	GuestID 	Gender 	GuestPhoneNum 	GuestAge 	GuestName
if ($result->num_rows > 0) {
    echo "
    <table class='table-style'>
    <thead>
        <tr>
            <th class='border-class'></th>
            <th class='border-class'>GuestID</th>
            <th class='border-class'>Gender</th>
            <th class='border-class'>PhoneNum</th>
            <th class='border-class'>Age</th>
            <th class='border-class'>Name</th>
            <th class='border-class'>MembershipType</th>
            <th class='border-class'>ExpiryDate</th>
        </tr>
    </thead>
    <tbody>
    ";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <th class='border-class'></th>
                <td class='border-class'>".$row["GuestID"]."</td>
                <td class='border-class'>".$row["Gender"]."</td>
                <td class='border-class'>".$row["GuestPhoneNum"]."</td>
                <td class='border-class'>".$row["GuestAge"]."</td>
                <td class='border-class'>".$row["GuestName"]."</td>
                <td class='border-class'>".$row["MemberType"]."</td>
                <td class='border-class'>".$row["ExpiryDate"]."</td>
            </tr>
        ";
    }
    echo "
    </tbody>
    </table>";

} else {
    echo "0 results";
}
?>