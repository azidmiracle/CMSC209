<form method="POST" action="" >
  <div class="form-group">
    <div class="form-row">
      <div class="form-group col-sm">
          <input type="text" class="form-control" id="searchID" name="SearchItemPO" placeholder="Type Item"   autofocus="">
      </div>
        <input type="submit" value="search" class="btn col-sm" name="SearchPObtn" onclick="document.cookie='searchTab=4'">             
    </div>          
  </div>
</form>

<?php

  include('../database_connection.php');
  //if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['SearchPObtn'])) {
     
    //get the item list from database for dropdown list binding
    $itemNamePO = trim($_POST['SearchItemPO']);    

  $sqlPO = "SELECT * FROM purchaseordersingles join itemlist on purchaseordersingles.productCode=itemlist.productCode 
  WHERE productName LIKE '%$itemNamePO%' or itemlist.productCode LIKE '%$itemNamePO%' ORDER BY purchaseDate ASC";

    $resultPO = $conn -> query($sqlPO);	
    	
	if ($resultPO -> num_rows > 0) {			
	// Build table for display
				
		echo "<table>";
		echo "<tr>";
		echo "<th>No. </th><th>Product ID</th><th>Product Name</th><th>Receipt Date</th><th>Bought Quantity</th><th>Price</th>";
		echo "</tr>";
		$no=1;		
		while ($row = $resultPO -> fetch_assoc()) {

            echo "<tr><td>" . $no . 
                "</td><td>" .  $row["productCode"] .
                "</td><td>" . $row["productName"] .
                "</td><td>" . $row["purchaseDate"] .    
                "</td><td>" .  $row["qtyBought"] .
                "</td><td>" . $row["price"] .                                             
                "</td></tr>";
                $no++;
		}			
			
		echo "</table>";
		// Free result set
		$resultPO -> free_result();
  }
  else{
    echo "Cannot find $itemNamePO.";
  }	
    $conn -> close();	
}
?>