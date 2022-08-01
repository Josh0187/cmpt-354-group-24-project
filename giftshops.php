<?php
include 'connect.php';
$conn = OpenCon();

// Nav bar
echo "   
<link rel='stylesheet' href='../styles.css?version=2'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='../index.php'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link' href='../sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link' href='../enclosures.php'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link' href='../Animals.php'>Animals</a></li>
    <li class='nav-item'><a class='nav-link' href='../events.php'>Events</a></li>
    <li class='nav-item'><a class='nav-link' href='../guest.php'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='../employees.php'>Employees</a></li>
</ul>
";

// if sectionName given, query only giftshops in given sectionName
if (isset($_GET['sectionName'])) {
    $sectionName = $_GET['sectionName'];
    $sql = "SELECT * FROM giftshops WHERE SectionName='$sectionName'";
}
// otherwise get all giftshops
else {
    $sectionName = "All Sections";
    $sql = "SELECT * FROM giftshops";
}

$result = $conn->query($sql);

echo "
    <h1>Giftshops in section: $sectionName</h1>
";

if ($result->num_rows > 0) {
    echo "
    <table class='table-style'>
    <thead>
    <tr>
        <th class='border-class'>Giftshop Number</th>
        <th class='border-class'>Section Name</th>
    </tr>
    </thead>
    <tbody>
    ";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td class='border-class'>".$row["GiftshopNum"]."</td>
                <td class='border-class'>".$row["SectionName"]."</td>
            </tr>
        ";
    }
    echo "
    </tbody>
    </table>";

} else {
    echo "0 results";
}
CloseCon($conn);
?>
