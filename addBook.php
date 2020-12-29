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

        <h2> Add Book To Library </h2>
        <form action="#" method="POST">
            Book No &nbsp &nbsp&nbsp
            <input type="text" name="book_no" placeholder="Enter Book Name">  
            <br>
            Book Name
            <input type="text" name="book_name" placeholder="Book Name....">
            <br>
            Author &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="text" name="author" placeholder="Author">
            <button type="submit" name="submit"> Add New Book </button>

        </form>


    

    </div>
  </div>
</div>


<?php include "includes/footer.php"?>

