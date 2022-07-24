<?php
            include 'connect.php';
            $conn = OpenCon();
?>
<link rel='stylesheet' href='styles.css'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='index.html'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link' href='sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link clicked' href='#'>Animals</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Events</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Employees</a></li>
</ul> 
<h1>Add Animal:</h1>
<form action="AddAnimal.php" method="post">
    <label>AnimalID</label>
    <input name="AnimalID" type="text" placeholder="Type Here">
    <br>
    <label>Sex</label>
    <input name="Sex" type="text" placeholder="Type Here">
    <br>
    <label>Given Name</label>
    <input name="GivenName" type="text" placeholder="Type Here">
    <br>
    <label>Weight</label>
    <input name="Weight" type="text" placeholder="Type Here">
    <br>
    <label>DateBorn</label>
    <input name="DateBorn" type="date" placeholder="Type Here">
    <br>
    <label>EnclosureNum</label>
    <?php
            $sql = "SELECT EnclosureNum FROM enclosures";
            $result = $conn->query($sql);
        ?>
        <select name="EnclosureNum">
        <?php

            while ($rows = $result->fetch_assoc()) {
                $enclosureNum = $rows['EnclosureNum'];
                echo "<option value='$enclosureNum'>$enclosureNum</option>";
            }
        ?>
    </select>
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
    <label>Species</label>
    <?php
            $sql = "SELECT Species FROM classification";
            $result = $conn->query($sql);
        ?>
        <select name="Species">
        <?php

            while ($rows = $result->fetch_assoc()) {
                $species = $rows['Species'];
                echo "<option value='$species'>$species</option>";
            }
        ?>
    </select>
    <br>
    <label>Genus</label>
        <?php
            $sql = "SELECT Genus FROM classification";
            $result = $conn->query($sql);
        ?>
        <select name="Genus">
        <?php

            while ($rows = $result->fetch_assoc()) {
                $genus = $rows['Genus'];
                echo "<option value='$genus'>$genus</option>";
            }
        ?>
    </select>
    <br>

    <input type="submit" name="submit" value="Add Animal">
</form>
