<?php
include 'connect.php';
$conn = OpenCon();
$sql_salesworkers = "SELECT * FROM salesworker";
$sql_zookeepers = "SELECT * FROM zookeepers";
$sql_managers = "SELECT * FROM manager";

$result_salesworkers = $conn->query($sql_salesworkers);
$result_zookeepers = $conn->query($sql_zookeepers);
$result_managers = $conn->query($sql_managers);

// nav bar
echo "
<link rel='stylesheet' href='styles.css?version=2'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='index.php'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link' href='sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link' href='enclosures.php'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link' href='Animals.php'>Animals</a></li>
    <li class='nav-item'><a class='nav-link' href='events.php'>Events</a></li>
    <li class='nav-item'><a class='nav-link' href='guest.php'>Guests</a></li>
    <li class='nav-item'><a class='nav-link clicked' href='employees.php'>Employees</a></li>
</ul> 
";

// salesworkers:  	EmployeeID 	PhoneNum 	EmployeeFirstName 	EmployeeLastName 	HireDate 	EmployeeAge 	SectionName 	GiftShopNum 	ConcessionNum 	BoothNum 	Role 	
// Managers: EmployeeID 	PhoneNum 	EmployeeFirstName 	EmployeeLastName 	HireDate 	EmployeeAge 	SectionName 	
// zookeepers: EmployeeID 	PhoneNum 	EmployeeFirstName 	EmployeeLastName 	HireDate 	EmployeeAge 	SectionName 	ZooKeeperType 	EnclosureNum 	

// display salesworkers
if ($result_salesworkers->num_rows > 0) {
    echo "
    <h1>Sales Workers:</h1>
    <table class='table-style'>
    <thead>
        <tr>
            <th class='border-class'>EmployeeID</th>
            <th class='border-class'>PhoneNum</th>
            <th class='border-class'>EmployeeFirstName</th>
            <th class='border-class'>EmployeeLastName</th>
            <th class='border-class'>HireDate</th>
            <th class='border-class'>EmployeeAge</th>
            <th class='border-class'>SectionName</th>
            <th class='border-class'>GiftShopNum</th>
            <th class='border-class'>ConcessionNum</th>
            <th class='border-class'>BoothNum</th>
            <th class='border-class'>Role</th>
        </tr>
    </thead>
    <tbody>
    ";
    // output data of each row
    while($row = $result_salesworkers->fetch_assoc()) {

        // if value is null set it to N/A
        if ($row['GiftShopNum'] === NULL) {
            $row['GiftShopNum'] = "N/A";
        }
        if ($row['ConcessionNum'] === NULL) {
            $row['ConcessionNum'] = "N/A";
        }
        if ($row['BoothNum'] === NULL) {
            $row['BoothNum'] = "N/A";
        }

        echo "
            <tr>
                <td class='border-class'>".$row["EmployeeID"]."</td>
                <td class='border-class'>".$row["PhoneNum"]."</td>
                <td class='border-class'>".$row["EmployeeFirstName"]."</td>
                <td class='border-class'>".$row["EmployeeLastName"]."</td>
                <td class='border-class'>".$row["HireDate"]."</td>
                <td class='border-class'>".$row["EmployeeAge"]."</td>
                <td class='border-class'>".$row["SectionName"]."</td>
                <td class='border-class'>".$row["GiftShopNum"]."</td>
                <td class='border-class'>".$row["ConcessionNum"]."</td>
                <td class='border-class'>".$row["BoothNum"]."</td>
                <td class='border-class'>".$row["Role"]."</td>
            </tr>
        ";
    }
    echo "
    </tbody>
    </table>";
} else {
    echo "0 results";
}

// display zookeepers
if ($result_zookeepers->num_rows > 0) {
    echo "
    <h1>Zookeepers:</h1>
    <table class='table-style'>
    <thead>
        <tr>
            <th class='border-class'>EmployeeID</th>
            <th class='border-class'>PhoneNum</th>
            <th class='border-class'>EmployeeFirstName</th>
            <th class='border-class'>EmployeeLastName</th>
            <th class='border-class'>HireDate</th>
            <th class='border-class'>EmployeeAge</th>
            <th class='border-class'>SectionName</th>
            <th class='border-class'>ZooKeeperType</th>
            <th class='border-class'>EnclosureNum</th>
        </tr>
    </thead>
    <tbody>
    ";
    // output data of each row
    while($row = $result_zookeepers->fetch_assoc()) {
        echo "
            <tr>
                <td class='border-class'>".$row["EmployeeID"]."</td>
                <td class='border-class'>".$row["PhoneNum"]."</td>
                <td class='border-class'>".$row["EmployeeFirstName"]."</td>
                <td class='border-class'>".$row["EmployeeLastName"]."</td>
                <td class='border-class'>".$row["HireDate"]."</td>
                <td class='border-class'>".$row["EmployeeAge"]."</td>
                <td class='border-class'>".$row["SectionName"]."</td>
                <td class='border-class'>".$row["ZooKeeperType"]."</td>
                <td class='border-class'>".$row["EnclosureNum"]."</td>
            </tr>
        ";
    }
    echo "
    </tbody>
    </table>";
} else {
    echo "0 results";
    
}

// display managers
if ($result_managers->num_rows > 0) {
    echo "
    <h1>Managers:</h1>
    <table class='table-style'>
    <thead>
        <tr>
            <th class='border-class'>EmployeeID</th>
            <th class='border-class'>PhoneNum</th>
            <th class='border-class'>EmployeeFirstName</th>
            <th class='border-class'>EmployeeLastName</th>
            <th class='border-class'>HireDate</th>
            <th class='border-class'>EmployeeAge</th>
            <th class='border-class'>SectionName</th>
        </tr>
    </thead>
    <tbody>
    ";
    // output data of each row
    while($row = $result_managers->fetch_assoc()) {
        echo "
            <tr>
                <td class='border-class'>".$row["EmployeeID"]."</td>
                <td class='border-class'>".$row["PhoneNum"]."</td>
                <td class='border-class'>".$row["EmployeeFirstName"]."</td>
                <td class='border-class'>".$row["EmployeeLastName"]."</td>
                <td class='border-class'>".$row["HireDate"]."</td>
                <td class='border-class'>".$row["EmployeeAge"]."</td>
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
