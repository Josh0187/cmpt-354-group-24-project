<!doctype html>
<html>
  <head>
    <title>Zoo</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <ul class="nav-list">
      <li class="nav-item"><a class="nav-link clicked" href="index.php">Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" href="sections.php">Sections</a></li>
      <li class="nav-item"><a class="nav-link" href="enclosures.php">Enclosures</a></li>
      <li class="nav-item"><a class="nav-link" href="Animals.php">Animals</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
      <li class="nav-item"><a class="nav-link" href="guest.php">Guests</a></li>
      <li class="nav-item"><a class="nav-link" href="employees.php">Employees</a></li>
    </ul> 
    <h1>Dashboard</h1>
    <h2>(summary data and useful info)</h2>
  </body>
</html>

<h1>Counts:<h1>
<form action='DashboardCount.php' method='post'>
  <select name='countOf'>
    <option value='zoosections'>Sections</option>
    <option value='enclosures'>Enclosures</option>
    <option value='animals'>Animals</option>
    <option value='guests'>Guests</option>
    <input type='submit' name='submit' value='submit'></input>
  </select>
</form>

<h1>Average Weight:</h1>
<form action='DashboardAverageWeight.php' method='post'>
  <?php
            include 'connect.php';
            $conn = OpenCon();
            $sql = "SELECT DISTINCT Genus FROM animals";
            $result = $conn->query($sql);
        ?>
        <select name="weightOf">
        <?php

            while ($rows = $result->fetch_assoc()) {
                $weightOf = $rows['Genus'];
                echo "<option value='$weightOf'>$weightOf</option>";
            }
        ?>
    </select>
    <input type='submit' name='submit' value='submit'></input>
  </select>
</form>

<a href="DashboardAllAvgs.php">Display All Average Weights</a>
<?php
    $sql = "SELECT AVG(Weight), Genus FROM animals GROUP BY Genus;";
    $result = $conn->query($sql);

    while ($rows = $result->fetch_assoc()) {
        $genus = $rows['Genus'];
        $avgWeight = $rows['AVG(Weight)'];
        echo "<h2>$genus: $avgWeight kg</h2><br>";
    }
?>