<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT * FROM zoosections";
$result = $conn->query($sql);

echo "
    <a href='index.html'>Home</a>
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
                <td><a href='sectionGiftshops.php/?sectionName=".$row["SectionName"]."'>Giftshops</a><td>
                <td><a href='#'>Concessions</a></td>
                <td><a href='#'>Enclosures</a></td>
            </tr>
        ";
    }
    echo "</table>";
    echo "<a href='createSection.html'>Create Section</a>";
} else {
    echo "0 results";
}
CloseCon($conn);
?>
