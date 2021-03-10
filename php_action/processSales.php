<!DOCTYP html>

<html>

<head>
	<title>Kayamanan ni Juan - Sales Confirmation</title>
</head>

<body>
<?php
	// Report all errors except E_NOTICE
	//error_reporting(E_ALL & ~E_NOTICE);
	// Retrieve Values from $_POST
	
	 $orderingCustomer = $_POST["saleDetailsCustomerID"];

	 $orderedProductCode = $_POST["saleDetailsItemNumber"];

	 $orderedQtySold = $_POST["saleDetailsQuantity"];

	 $transactionTotal = $_POST["saleDetailsTotal"];


	//Initiate Connection
	
	require '../database_connection.php';
	
	echo ($orderedProductCode) . "<br>";
	//echo ($orderedQtySold) . "<br>";
	//echo ($orderingCustomer) . "<br>";

	// Check connection
	
	if ($conn->connect_error) {

		die("Connection failed: " . $conn->connect_error);
	
	} else {
		
		//echo "Connected Successfully";
		//echo "<br><br>";

		//Original
		$sql = "SELECT currentCount FROM mainInventory WHERE productCode = " .$orderedProductCode;

		//Ichanged first this line because the productcode is in varchar format

		$result = $conn -> query($sql);
		
		$row = $result -> fetch_assoc();
		
		$available = $row["currentCount"];
		
		echo "<br>";
		//echo $available;
		
		if ($orderedQtySold > $available) {
			
			echo "<script>alert('Insufficient number of item in stock.')</script>";
			
		} else {
			
			$newCurrentCount = $available - $orderedQtySold;
			
			$stmt = $conn->prepare("INSERT INTO salesOrderSingles(customerId, productCode, qtySold) VALUES(?, ?, ?)");
		
			$stmt->bind_param("iii", $orderingCustomer, $orderedProductCode, $orderedQtySold);
	
			$stmt->execute();
		
			//echo "Successfully created sales order.";
			
			$stmt->close();
			
			
			$stmt = $conn->prepare("UPDATE mainInventory SET currentCount = ? WHERE productCode =?");

		
		
			$stmt->bind_param("ii", $newCurrentCount, $orderedProductCode);


			$stmt->execute();
			
			
			//echo "<br>";
			//echo "Successfully updated inventory.";
			echo "<script>alert('Successfully updated inventory.')</script>";
			
			$stmt->close();
			
		}
	
		$conn->close();
	
		//echo "<br><br>";
		//echo "Connection Closed";
	}

?>

	<br><br>
	<link rel="stylesheet" type="text/css" href="../css/reports.css" media="screen" />
	<input type="button" class="btn btn-success" value="Back" onclick="window.location='../inventory/sale.php'">

</body>

</html>