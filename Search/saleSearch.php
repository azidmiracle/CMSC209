<form method="POST" action="" >
  <div class="form-group">
    <div class="form-row">
      <div class="form-group col-sm">
          <input type="text" class="form-control"  name="SearchItemSale" placeholder="Type Item"   autofocus="">
      </div>
        <input type="submit" value="search" class="btn col-sm" name="SearchSalebtn" onclick="document.cookie='searchTab=3'">             
    </div>          
  </div>
</form>

<?php

  include('../database_connection.php');
  //if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['SearchSalebtn'])) {

   

    //get the item list from database for dropdown list binding
    $itemNameSale = trim($_POST['SearchItemSale']);    

    $sqlSale = "SELECT * FROM salesordersingles join itemlist on salesordersingles.productCode=itemlist.productCode 
        WHERE productName LIKE '%$itemNameSale%' or itemlist.productCode LIKE '%$itemNameSale%' ORDER BY saleDate ASC";

    $resultSale = $conn -> query($sqlSale);	
    	
	if ($resultSale -> num_rows > 0) {			
	// Build table for display
				
		echo "<table>";
		echo "<tr>";
		echo "<th>No. </th><th>Product ID</th><th>Product Name</th><th>Issued Date</th><th>Sold Quantity</th><th>Price</th>";
		echo "</tr>";
		$no=1;		
		while ($row = $resultSale -> fetch_assoc()) {

            echo "<tr><td>" . $no . 
                "</td><td>" .  $row["productCode"] .
                "</td><td>" . $row["productName"] .
                "</td><td>" . $row["saleDate"] .    
                "</td><td>" .  $row["qtySold"] .
                "</td><td>" . $row["price"] .                                             
                "</td></tr>";
                $no++;
		}			
			
		echo "</table>";
		// Free result set
		$resultSale -> free_result();
  }
  else{
    echo "Cannot find $itemNameSale.";
  }	
    $conn -> close();
}	
?>