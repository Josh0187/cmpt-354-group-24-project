<?php
  include 'connect.php';
  $conn = OpenCon();
?>
<!doctype html>
<html>
  <head>
    <title>Zoo</title>
    <link rel="stylesheet" href="styles.css?version=2">
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

<h2>Counts:
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
</h2>

<form class='form-style' action='index.php' method='get'>
  <select name='countOf'>
    <option value='zoosections'>Sections</option>
    <option value='enclosures'>Enclosures</option>
    <option value='animals'>Animals</option>
    <option value='guests'>Guests</option>
  </select>
  <input type='submit' value='submit'>
</form>

<h2>Average Animal Weight:
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
</h2>


<form class='form-style' action='index.php' method='get'>
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
    <input type='submit' value='submit'>
</form>
<br>

<form class='form-style' action="index.php" method="get">
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

<h2>Find animals kept by zookeeper:</h2>
  <form class='form-style' action='index.php' method='get'>
    <?php
      $sql = "SELECT  EmployeeID ,EmployeeFirstName, EmployeeLastName FROM zookeepers";
      $result = $conn->query($sql);
    ?>
    <select name="employeeID">
    <?php
      while ($rows = $result->fetch_assoc()) {
            $firstName = $rows['EmployeeFirstName'];
                  $lastName = $rows['EmployeeLastName'];
                  $employeeID = $rows['EmployeeID'];
                  echo "<option value=$employeeID>$firstName $lastName</option>";
              }
          ?>
      </select>
      <input type='submit' value='submit'>
  </form>
<?php 
if (isset($_GET['employeeID'])) {
  $employeeID = $_GET['employeeID'];
  // division query - Find GivenName, Species, and Genus of animals that live in all enclosures kept by zookeeper with employeeID 
  $sql = "SELECT a.GivenName, Species, Genus FROM animals a WHERE NOT EXISTS (SELECT * from zookeepers z WHERE EmployeeID=$employeeID AND NOT EXISTS (SELECT e.EnclosureNum, e.SectionName FROM enclosures e WHERE a.EnclosureNum=e.EnclosureNum AND a.SectionName=e.SectionName AND z.EnclosureNum=e.EnclosureNum AND z.SectionName=e.SectionName))";

  $result_animals = $conn->query($sql);

  if ($result_animals->num_rows > 0) {
    while ($rows = $result_animals->fetch_assoc()) {
      $givenName = $rows['GivenName'];
      $species = $rows['Species'];
      $genus = $rows['Genus'];

      // get common name of animal using species and genus
      $sql_commonName = "SELECT CommonName FROM classification WHERE Species='$species' AND Genus='$genus'";
      $result_commonName = $conn->query($sql_commonName);
      $row = $result_commonName->fetch_assoc();
      $commonName = $row['CommonName'];

      echo "<h3>$givenName - $commonName</h3>";
    }
  }
  else {
    echo "<h3>0 results.</h3>";
  }

}
?>


