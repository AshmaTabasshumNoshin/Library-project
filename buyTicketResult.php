<?php include "includes/db.php";?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php" ?>


<h1>

Purchase Ticket

</h1>
<?php
    $sfrom = $_POST['sfrom'];
    $sto = $_POST['sto'];
    $date = $_POST['date'];
    $class = $_POST['class'];

    
if($class = 'ac'){
    $sql = "SELECT sfrom, sto, AC FROM payment";
    $result = $con->query($sql) or die($con->error);

echo "<h2>Purchase Information</h2>";
echo "<center><table id='table' style='margin-top:1rem;'><tr><th>Station From</th><th>Station To</th><th>Date</th><th>Class</th><th>Fare</th>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["sfrom"]. "</td>
        <td>" . $row["sto"]. "</td>
        <td>" . $date ."</td>
        <td>" . $class. "</td>
        <td>" . $row["AC"]. "</td></tr>"
    }

echo "</table></center>";
echo "<h3>Purchased Successfully!!!</h3>";   
}

    //mysqli_query($con, $sql);
    
    //header("Location: indexnew.php?addBook=success");

    

    ?>

<?php include "includes/footer.php"?>