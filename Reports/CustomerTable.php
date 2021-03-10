<br>
<button onclick="exportTableToExcel('customerTable', 'Customer Reports')" class="btn">Print</button>	

<?php
	include('../database_connection.php');

	////join the two tables mainventory and itemlist. Project a row where the current count is equals to 0 
	$sql = "SELECT customer.customerName, customer.customerId,salesordersingles.saleDate, itemlist.productCode,  
					itemlist.productName,salesordersingles.qtySold,salesordersingles.transactionAmount  
					FROM customer join salesordersingles on customer.customerId=salesordersingles.customerId 
					JOIN itemlist on itemlist.productCode=salesordersingles.productCode
					order by customerName ASC";

	$result = $conn -> query($sql);		
	if ($result -> num_rows > 0) {			
	// Build table for display
				
		echo "<table id='customerTable'>";
		echo "<tr>";
		echo "<th>No. </th><th>Customer ID </th><th>Customer Name</th><th>Transaction Date</th>
			<th>Product Code </th><th>Product Name</th><th>Quantity</th><th>Transaction Amount</th>";
		echo "</tr>";
		$no=1;		
		while ($row = $result -> fetch_assoc()) {

            echo "<tr><td>" . $no  . 
                "</td><td>" .  $row["customerId"] .
                "</td><td>" .  $row["customerName"] .                  
				"</td><td>" .  $row["saleDate"] .   
                "</td><td>" . $row["productCode"] .  				             
                "</td><td>" . $row["productName"] .   
				"</td><td>" . $row["qtySold"] .  
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
