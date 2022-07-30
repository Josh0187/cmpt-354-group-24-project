<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT * FROM guests, memberships WHERE guests.GuestID = memberships.GuestID";
$result = $conn->query($sql);

// nav bar
echo "
<link rel='stylesheet' href='styles.css'>
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

//  	GuestID 	Gender 	GuestPhoneNum 	GuestAge 	GuestName
// memberships:  	MemberID 	DateCreated 	ExpiryDate 	MemberType 	BoothNum 	GuestID 	
if ($result->num_rows > 0) {
    echo "
    <table>
    <tr>
        <th class='border-class'></th>
        <th class='border-class'>GuestID</th>
        <th class='border-class'>Name</th>
        <th class='border-class'>MembershipType</th>
        <th class='border-class'>ExpiryDate</th>
    </tr>
    ";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <th class='border-class'></th>
                <td class='border-class'>".$row["GuestID"]."</td>
                <td class='border-class'>".$row["GuestName"]."</td>
                <td class='border-class'>".$row["MemberType"]."</td>
                <td class='border-class'>".$row["ExpiryDate"]."</td>
            </tr>
        ";
    }
    echo "</table>";

} else {
    echo "0 results";
}

echo "
<h1>Search Guests:</h1>
<form action='SearchGuests.php' method='post'>
<label>GuestName</label>
<input name='GuestName' type='text' placeholder='Type Here'>
<input type='submit' name='submit' value='Search'>
</form>
<br>
";

echo "
    <form action='GuestView.php' method='post'>
        <select name='view'>
            <option value='GuestPhoneNum'>Phone Number</option>
            <option value='GuestAge'>Age</option>
            <option value='Gender'>Gender</option>
        </select>
        <input type='submit' name='submit' value='Submit'>
    </form>
";

CloseCon($conn);
?>
