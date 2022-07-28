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
<?php
  include 'connect.php';
  $conn = OpenCon();
  $countOf = $_POST['countOf'];
  $sql = "SELECT COUNT(*) FROM $countOf";

  $result_count = $conn->query($sql);

?>

<?php
    $count_section =  $result_count->fetch_assoc();
    echo "
        <h2>Count of $countOf : ".$count_section['COUNT(*)']."</h2>
    ";
    
?>
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