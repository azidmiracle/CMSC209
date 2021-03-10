
<button onclick="exportTableToExcel('ReOrder', 'ReOrder Reports')" class="btn">Print</button>	

<?php
    include('../database_connection.php');//call the database connection
        
    //create array for the results to be used later in graphing
    $chart_data = '';//variable for chart data plotting

    $productCode;
    $currentCount;
    $productName;
    $reorderPoint;
    //join the two tables mainventory and itemlist. Project a row where the current count is less than the reorder point
    $sql="SELECT * FROM maininventory LEFT OUTER JOIN itemlist ON maininventory.productCode=itemlist.productCode 
        WHERE maininventory.currentCount<itemlist.reorder" ;    
	$result = $conn -> query($sql);		
	if ($result -> num_rows > 0) {			
		// Build table for display			
		echo "<table id='ReOrder'>";
		echo "<tr>";
		echo "<th>Product Code</th><th>Product Name</th><th>Current Quantity</th><th>Reorder Point</th><th>ReOrder</th>";
		echo "</tr>";
			
		while ($row = $result -> fetch_assoc()) {
            $productCode=$row["productCode"] ;
            $productName=$row["productName"] ;
            $currentCount=$row["currentCount"] ;
            $reorderPoint=$row["reorder"];
   
            echo	"<tr><td>" .  $row["productCode"] .
                    "</td><td>" . $productName .
                    "</td><td>" . $currentCount .
                    "</td><td>" . $reorderPoint  .
                    "<td><a  class='btn' href=\"../inventory/purchase.php?id=$row[productCode]\">Order Now</a> </td>" .
                    "</td></tr>";
             
            //push data to chart_data variable for charting. Javascript format
            $chart_data .= "{ ProductName:'". $productName."', currentCount:". $currentCount .", reorderPoint:".$reorderPoint."}, ";            
			}						
		    echo "</table>";
		// Free result set
		$result -> free_result();
	}

    $conn -> close();	
        
?>
