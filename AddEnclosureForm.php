<?php
            include 'connect.php';
            $conn = OpenCon();
?>
<link rel='stylesheet' href='styles.css'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='index.php'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link' href='sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link clicked' href='enclosures.php'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link' href='animals.php'>Animals</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Events</a></li>
    <li class='nav-item'><a class='nav-link' href='guest.php'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='employees.php'>Employees</a></li>
</ul> 
<h1>Add Enclosure:</h1>
<form action="AddEnclosure.php" method="post">
    <label>EnclosureNum</label>
    <input name="EnclosureNum" type="text" placeholder="Type Here">
    <br>
    <label>SectionName</label>
    <?php
            $sql = "SELECT SectionName FROM zoosections";
            $result = $conn->query($sql);
        ?>
        <select name="SectionName">
        <?php

            while ($rows = $result->fetch_assoc()) {
                $sectionName = $rows['SectionName'];
                echo "<option value='$sectionName'>$sectionName</option>";
            }
        ?>
    </select>
    <br>
    <label>EnclosureSize</label>
    <input name="EnclosureSize" type="text" placeholder="Type Here">
    <br>
    <label>EnvironmentName</label>
    <?php
            $sql = "SELECT EnvironmentName FROM environment";
            $result = $conn->query($sql);
        ?>
        <select name="EnvironmentName">
        <?php

            while ($rows = $result->fetch_assoc()) {
                $EnvironmentName = $rows['EnvironmentName'];
                echo "<option value='$EnvironmentName'>$EnvironmentName</option>";
            }
        ?>
    </select>
    <br>
    <input type="submit" name="submit" value="Add Enclosure">
</form>
