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

$sql = "SELECT * FROM iss_rec";
         $result = $con->query($sql) or die($con->error);
         
         echo "<h2>Issue Records</h2>";
         echo "<center><table id='table' style='margin-top:1rem;'><tr><th>Issue No.</th><th>Issue Date</th><th>Member ID</th><th>Book No.</th>";
             // output data of each row
             while ($row = $result->fetch_assoc()) {
                 echo "<tr><td>" . $row["iss_no"]. "</td><td>" . $row["iss_date"]. "</td><td>" . $row["Mem_no"]."</td><td>" . $row["book_no"]."</td>";
             }
         
         echo "</table></center>";
    

$con->close();
?>

    </div>
  </div>
</div>



<?php include "includes/footer.php"?>

