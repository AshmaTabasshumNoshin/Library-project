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

    <h2> Issue Book </h2>           
            <form action="#" method="POST">
                Member 
                <select name="takeMember">
                    <option> Select Member </option> 
                    <?php
                        $sql = mysqli_query($con, "SELECT mem_no FROM membership;");
                        while($row = mysqli_fetch_array($sql)){
                            echo "<option value= ".$row['mem_no'] .">". $row['mem_no']. "</option>";     
                        }
                    ?> 
                </select>
                <br>
                Book &nbsp &nbsp
                <select name="takeBook">
                    <option> Select Book </option>  
                    <?php
                        $sql = mysqli_query($con, "SELECT book_no FROM book;");
                        while($row = mysqli_fetch_array($sql)){
                            echo "<option value= ".$row['book_no'] .">". $row['book_no']. "</option>";    
                        }
                    ?> 
                </select>
                <br>
                <button type="submit" name="submit"> Issue Book </button>
            </form> 


    

    </div>
  </div>
</div>


<?php include "includes/footer.php"?>

