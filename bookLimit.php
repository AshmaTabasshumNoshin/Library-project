<?php include "includes/db.php";?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

 <nav class="navbar navbar-expand-sm bg-light navbar-dark">
 
  
</nav> 


<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
    
      
      <h3>Queries</h3>
     
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link" href="borrowList.php">Borrow List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bookLimit.php">Borrow Limit Reached</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="issuedToday.php">Issued Today</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="search.php"> Search</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
  
<?php

$sql = "SELECT Student.Stud_no, Stud_name, Mem_no
FROM student, membership 
WHERE student.Stud_no = membership.Stud_no
AND Membership.Mem_no IN 
    ( SELECT iss_rec.Mem_no
    FROM iss_rec
    GROUP BY iss_rec.Mem_no
    HAVING COUNT(*) = 3 )";
$result = $con->query($sql) or die($con->error);

echo "<h2>Borrow Limit(3) Reached</h2>";
echo "<center><table id='table' style='margin-top:1rem;'><tr><th>Student ID</th><th>Student Name</th><th>Member ID</th>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Stud_no"]. "</td><td>" . $row["Stud_name"]. "</td><td>" . $row["Mem_no"]."</td>";
    }

echo "</table></center>";
$con->close();
?>

    </div>
  </div>
</div>


<?php include "includes/footer.php"?>

