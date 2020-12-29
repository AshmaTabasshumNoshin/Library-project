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

$sql = "SELECT Student.Stud_no, Stud_name, Membership.Mem_no, COUNT(*) AS Total_book
         FROM iss_rec, Student, Book, Membership
         WHERE Student.Stud_no = Membership.Stud_no
         AND Membership.Mem_no = iss_rec.Mem_no
         AND Book.book_no = iss_rec.book_no
         GROUP BY Student.Stud_no";

         $result = $con->query($sql) or die($con->error);
         
         echo "<h2>Borrow List of Each Student</h2>";
         echo "<center><table id='table' style='margin-top:1rem;'><tr><th>Student ID</th><th>Studnet Name</th><th>Member ID</th><th>Total Book Borrowed</th>";
             // output data of each row
             while ($row = $result->fetch_assoc()) {
                 echo "<tr><td>" . $row["Stud_no"]. "</td><td>" . $row["Stud_name"]. "</td><td>".$row['Mem_no']. "</td><td>" . $row["Total_book"]."</td>";
             }
         
         echo "</table></center>";    

$con->close();
?>


    </div>
  </div>
</div>

<?php include "includes/footer.php"?>

