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
    <li class='nav-item'><a class='nav-link' href='#'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='#'>Employees</a></li>
</ul> 
<h1>Add Environment:</h1>
<form action="AddEnvironment.php" method="post">
    <label>EnvironmentName</label>
    <input name="EnvironmentName" type="text" placeholder="Type Here">
    <br>
    <label>ClimateType</label>
    <input name="ClimateType" type="text" placeholder="Type Here">
    <br>
    <label>Countries</label>
    <input name="Countries" type="text" placeholder="Type Here">
    <br>
    <input type="submit" name="submit" value="Add Environment">
</form>
