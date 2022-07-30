<?php
  include 'connect.php';
  $conn = OpenCon();
?>
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
      <li class="nav-item"><a class="nav-link" href="events.php">Events</a></li>
      <li class="nav-item"><a class="nav-link" href="guest.php">Guests</a></li>
      <li class="nav-item"><a class="nav-link" href="employees.php">Employees</a></li>
    </ul> 
    <h1>Dashboard:</h1>
  </body>
</html>

<h1>Counts:
<?php
if (isset($_GET['countOf'])) {
  $countOf = $_GET['countOf'];
  $sql = "SELECT COUNT(*) FROM $countOf";

  $result_count = $conn->query($sql);
  $count_section =  $result_count->fetch_assoc();
  echo "
      ".$count_section['COUNT(*)']." $countOf
  ";
}
?>
</h1>

<form action='index.php' method='get'>
  <select name='countOf'>
    <option value='zoosections'>Sections</option>
    <option value='enclosures'>Enclosures</option>
    <option value='animals'>Animals</option>
    <option value='guests'>Guests</option>
    <input type='submit' value='submit'></input>
  </select>
</form>

<h1>Average Animal Weight:
<?php 
if (isset($_GET['weightOf'])) {
  $weightOf = $_GET['weightOf'];
  $sql = "SELECT AVG(Weight) FROM animals WHERE Genus='$weightOf'";

  $result_avg_weight = $conn->query($sql);

  $avg_weight =  $result_avg_weight->fetch_assoc();
  echo "
      $weightOf - ".$avg_weight['AVG(Weight)']." kg
  ";  
}
?>
</h1>

<form action='index.php' method='get'>
  <?php
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
    <input type='submit' value='submit'></input>
  </select>
</form>
<br>
<form action="index.php" method="get">
  <input type="submit" name="AllAverageWeights" value="Display All Average Weights">
</form>

<?php 
if (isset($_GET['AllAverageWeights'])) {
  $sql = "SELECT AVG(Weight), Genus FROM animals GROUP BY Genus;";
  $result = $conn->query($sql);

  while ($rows = $result->fetch_assoc()) {
      $genus = $rows['Genus'];
      $avgWeight = $rows['AVG(Weight)'];
      echo "<h2>$genus: $avgWeight kg</h2>";
  }
}
?>