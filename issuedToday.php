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
 $sql = "SELECT DISTINCT Book.book_no, book_name
 FROM Book, iss_rec
 WHERE Book.book_no = iss_rec.book_no
 AND DATE(iss_date) = CURRENT_DATE();
 ";
 $result = $con->query($sql) or die($con->error);
 
 echo "<h2>Books Issued Today</h2>";
 echo "<center><table id='table' style='margin-top:1rem;'><tr><th>Book ID</th><th>Book Name</th>";
     // output data of each row
     while ($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["book_no"]. "</td><td>" . $row["book_name"]. "</td>";
     }
 
 echo "</table></center>";
    

$con->close();

?> 
    </div>
  </div>
</div>

<?php include "includes/footer.php"?>

