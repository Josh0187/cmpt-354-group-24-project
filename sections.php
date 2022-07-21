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
    <ul>
    ";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
            <li>
                <a href='#'>".$row["SectionName"]."</a>
            </li>
        ";
    }
    echo "</ul>";

} else {
    echo "0 results";
}
CloseCon($conn);
?>
