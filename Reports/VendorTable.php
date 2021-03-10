<br>
<button onclick="exportTableToExcel('supplierTable', 'Supplier Reports')" class="btn">Print</button>	
<?php
	include('../database_connection.php');

	////join the two tables mainventory and itemlist. Project a row where the current count is equals to 0 
	$sql = "SELECT supplier.supplierName, supplier.supplierId,purchaseordersingles.purchaseDate, itemlist.productCode,  
	itemlist.productName,purchaseordersingles.qtyBought,purchaseordersingles.transactionAmount  
	FROM supplier join purchaseordersingles on supplier.supplierId=purchaseordersingles.supplierId 
	JOIN itemlist on itemlist.productCode=purchaseordersingles.productCode
	order by supplierName ASC";

	$result = $conn -> query($sql);		
	if ($result -> num_rows > 0) {			
	// Build table for display
	echo "<table id='supplierTable'>";
	echo "<tr>";
	echo "<th>No. </th><th>supplier ID </th><th>Supplier Name</th><th>Transaction Date</th>
		<th>Product Code </th><th>Product Name</th><th>Quantity</th><th>Transaction Amount</th>";
	echo "</tr>";
	$no=1;		
	while ($row = $result -> fetch_assoc()) {

		echo "<tr><td>" . $no  . 
			"</td><td>" .  $row["supplierId"] .
			"</td><td>" .  $row["supplierName"] .                  
			"</td><td>" .  $row["purchaseDate"] .   
			"</td><td>" . $row["productCode"] .  				             
			"</td><td>" . $row["productName"] .   
			"</td><td>" . $row["qtyBought"] .  
			"</td><td>" . $row["transactionAmount"] .  				                            
			"</td></tr>";
			

			$no++;
	}					
			
		echo "</table>";
			
		// Free result set
		$result -> free_result();
	}
    $conn -> close();	
?>
