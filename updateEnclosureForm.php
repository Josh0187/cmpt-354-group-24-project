<?php
        include 'connect.php';
        $conn = OpenCon();

        if (isset($_GET['sectionName'])) {
            $sectionName = $_GET['sectionName'];
            $enclosureNum = $_GET['enclosureNum'];
            $sql = "SELECT * FROM enclosures WHERE SectionName='$sectionName' AND EnclosureNum='$enclosureNum'";
        }
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
?>
<link rel='stylesheet' href='../styles.css'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='../index.php'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link' href='../sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link' href='../enclosures.php'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link clicked' href='../animals.php'>Animals</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Events</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Employees</a></li>
</ul> 
<h1>Update Enclosure:</h1>
<?php
    echo "<form action='../updateEnclosure.php/?sectionName=".$row["SectionName"]."&enclosureNum=".$row["EnclosureNum"]."' method='post'>";
?>
        <Label>Enclosure Num</Label>
        <?php
            echo "<input type='text' name='EnclosureNum' value='".$row["EnclosureNum"]."'>";
        ?>
        <br>
        <Label>Section Name</Label>
        <?php
            echo "<input type='text' name='SectionName' value='".$row["SectionName"]."'>";
        ?>
        <br>
        <Label>Enclosure Size</Label>
        <?php
            echo "<input type='text' name='EnclosureSize' value='".$row["EnclosureSize"]."'>";
        ?>
        <br>
        <Label>Environment Name</Label>
        <?php
            echo "<input type='text' name='EnvironmentName' value='".$row["EnvironmentName"]."'>";
        ?>
        <br>
        <input type="submit" name="submit" value="Update Enclosure">
</form>
