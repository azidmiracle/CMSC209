<br>
<button onclick="exportTableToExcel('tblData', 'Product Reports')" class="btn">Print</button>	
<?php
	include('../database_connection.php');

	////join the two tables mainventory and itemlist. Project a row where the current count is equals to 0 
	$sql = "SELECT * FROM maininventory  LEFT JOIN  itemlist ON itemlist.productCode=maininventory.productCode";
	$result = $conn -> query($sql);		
	if ($result -> num_rows > 0) {			
	// Build table for display
				
		echo "<table id='tblData'>";
		echo "<tr>";
		echo "<th>No. </th><th>Product Code</th><th>Product Name</th><th>Current Qty</th>";
		echo "</tr>";
		$no=1;		
		while ($row = $result -> fetch_assoc()) {

            echo "<tr><td>" . $no . 
                "</td><td>" .  $row["productCode"] .
                "</td><td>" . $row["productName"] .
				"</td><td>" . $row["currentCount"] .                
                "</td></tr>";
                $no++;
		}			
			
		echo "</table>";
			
		// Free result set
		$result -> free_result();
	}
    $conn -> close();	
?>

