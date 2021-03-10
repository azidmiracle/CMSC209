
<button onclick="exportTableToExcel('Zero', 'ZeroBalance Reports')" class="btn" >Print</button>	
<?php
	include('../database_connection.php');

	////join the two tables mainventory and itemlist. Project a row where the current count is equals to 0 
	$sql = "SELECT * FROM itemlist INNER JOIN maininventory ON itemlist.productCode=maininventory.productCode WHERE maininventory.currentCount=0";
	$result = $conn -> query($sql);		
	if ($result -> num_rows > 0) {			
	// Build table for display
				
		echo "<table id='Zero'>";
		echo "<tr>";
		echo "<th>Product Code</th><th>Product Name</th><th>ReOrder</th>";
		echo "</tr>";
				
		while ($row = $result -> fetch_assoc()) {

			echo "<tr><td>" .  $row["productCode"] .
				"</td><td>" . $row["productName"] .
				"<td><a  class='btn' href=\"../inventory/purchase.php?id=$row[productCode]\">Order Now</a> </td>" .
				"</td></tr>";
		}			
			
		echo "</table>";
			
		// Free result set
		$result -> free_result();
	}
    $conn -> close();	
?>
