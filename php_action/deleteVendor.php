
<?php
include('../database_connection.php');


//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
 $stmt = $conn->prepare("DELETE FROM supplier WHERE id=$id");
 $stmt->execute();
 $stmt->close();
$conn->close();
//redirecting to the display page (index.php in our case)
header("Location:../Inventory/vendor.php");

?>