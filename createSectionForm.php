<link rel='stylesheet' href='styles.css?version=2'>
<ul class='nav-list'>
    <li class='nav-item'><a class='nav-link' href='index.php'>Dashboard</a></li>
    <li class='nav-item'><a class='nav-link clicked' href='sections.php'>Sections</a></li>
    <li class='nav-item'><a class='nav-link' href='enclosures.php'>Enclosures</a></li>
    <li class='nav-item'><a class='nav-link' href='Animals.php'>Animals</a></li>
    <li class='nav-item'><a class='nav-link' href='events.php'>Events</a></li>
    <li class='nav-item'><a class='nav-link' href='guest.php'>Guests</a></li>
    <li class='nav-item'><a class='nav-link' href='employees.php'>Employees</a></li>
</ul> 
<h1>Create Section:</h1>
<form class="form-style" action="createSection.php" method="post">
    <label>SectionName</label>
    <input name="Section Name:" type="text" placeholder="Type Here">
    <br>
    <label>SectionSize</label>
    <input name="Section Size" type="text" placeholder="Type Here">
    <br>
    <input type="submit" name="submit" value="Create Section">
</form>

