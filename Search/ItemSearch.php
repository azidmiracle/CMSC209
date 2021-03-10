<form method="POST" action="" >
  <div class="form-group">
    <div class="form-row">
      <div class="form-group col-sm">
          <input type="text" class="form-control" id="searchID" name="SearchItem" placeholder="Type Item or Product Code"   autofocus="">
      </div>
        <input type="submit" value="search" class="btn col-sm" name="SearchItemBtn" onclick="document.cookie='searchTab=1'">             
    </div>          
  </div>
</form>

<?php
    include('../database_connection.php');
    if (isset($_POST['SearchItemBtn'])) {
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
      //echo '<script> document.cookie = "searchTab=1";</script>';   

     $itemName = trim($_POST['SearchItem']);    
	
	  $sql = "SELECT itemlist.id as id,itemlist.productCode as productCode,itemlist.productName as productName,itemlist.product_desc as product_desc,maininventory.currentCount as currentCount 
            ,itemlist.unit as unit,itemlist.reorder as reorder,itemlist.price as price,itemlist.status as status
            FROM itemlist JOIN maininventory on itemlist.productCode=maininventory.productCode 
            WHERE itemlist.productName LIKE '%$itemName%' or itemlist.productCode LIKE '%$itemName%'";

    $result = $conn -> query($sql);	
    	
	if ($result -> num_rows > 0) {			
	// Build table for display
				
		echo "<table>";
		echo "<tr>";
    echo "	<th>SO#</th>					
            <th>Product Code</th>	
            <th>Product Name</th>		
            <th>Product Description</th>					
            <th>Current Quantity</th>					
            <th>Unit</th>
            <th>Reorder</th>					
            <th>Price</th>					
            <th>Status</th>	
            <th></th>					
    ";
		echo "</tr>";
			
		while ($row = $result -> fetch_assoc()) {

      echo	"<td>" . $row["id"] .
            "</td><td>" . $row["productCode"] . 
            "</td><td>" . $row["productName"] . 
            "</td><td>" . $row["product_desc"] . 
            "</td><td>" . $row["currentCount"] .  		
            "</td><td>" . $row["unit"] . 
            "</td><td>" . $row["reorder"] . 
            "</td><td>" . $row["price"] . 
            "</td><td>" . $row["status"] . 
            "</td><td>" . 
  
            "<td><a href=\"../php_action/editProduct.php?id=$row[id]\">Edit</a> | <a href=\"../php_action/deleteProduct.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>" .

      "</td></tr>";
		}			
			
		echo "</table>";
			
		// Free result set
		$result -> free_result();
  }
  
  else{
    echo "Cannot find $itemName.";
  }
    $conn -> close();	

}
?>