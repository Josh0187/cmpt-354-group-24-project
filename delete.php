<?php

include 'connect.php';

$conn = OpenCon();

// example of url to delete a section: "delete.php?table=zoosections&col=SectionName&val='NW'&back=sections.php"

// table to delete from
if (isset($_GET['table'])) {
    $table = $_GET['table'];
}

// column containing value
if (isset($_GET['col'])) {
    $col = $_GET['col'];
}

// value to delete for
if (isset($_GET['val'])) {
    $val = $_GET['val'];
}

// url to link to in back button
if (isset($_GET['back'])) {
    $back = $_GET['back'];
}

echo "<a href='$back'>Go back</a><br>";

$sql = "DELETE FROM $table WHERE $col='$val'";
$result = $conn->query($sql);

if (!$result) {
    echo "Deletion Error:";
    echo "<br>";
    echo $conn->error;
}

else {
    echo "Successfully deleted.";
}

?>