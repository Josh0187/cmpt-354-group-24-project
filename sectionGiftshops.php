<?php
include 'connect.php';
$conn = OpenCon();
$sectionName = $_GET['sectionName'];
$sql = "SELECT * FROM giftshops WHERE SectionName='$sectionName'";
$result = $conn->query($sql);

echo "
    <a href='../sections.php'>Back</a>
    <h1>Giftshops in section: $sectionName</h1>
";

if ($result->num_rows > 0) {
    echo "
    <table>
    <tr>
        <th class='border-class'>Giftshop Number</th>
        <th class='border-class'>Section Name</th>
    </tr>
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
    echo "</table>";

} else {
    echo "0 results";
}
CloseCon($conn);
?>
