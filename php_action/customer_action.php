
<?php
include('../database_connection.php');

?>

<!DOCTYP html>

<html>

<head>
	<title>Add Customer</title>
</head>

<body>
<?php

	$customerId = $_POST["customerID"];
	$name = $_POST["name"];
	$custMobile = $_POST["customerDetailsCustomerMobile"];
	$custMobile2 = $_POST["customerDetailsCustomerPhone2"];
	$custEmail = $_POST["customerDetailsCustomerEmail"];	
	$custCity = $_POST["customerDetailsCustomerCity"];
	$custDist = $_POST["customerDetailsCustomerDistrict"];	
	$custAdd = $_POST["customerDetailsCustomerAddress"];
	$custAdd2 = $_POST["customerDetailsCustomerAddress2"];
	$status = 'Active';
	
	
	
			
			
			$stmt = $conn->prepare("INSERT INTO customer (customerId, customerName, contact_num, contact_num2, email, address, address2, city, district, status) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		
			$stmt->bind_param("ssssssssss", $customerId, $name, $custMobile, $custMobile2, $custEmail, $custAdd, $custAdd2, $custCity, $custDist, $status);
	
			$stmt->execute();
		
			
			echo "<br>";

			echo '<script>if(confirm("Successfully updated inventory. Do you want to add another?")) {
                        window.location.href = "addCustomer.php"
                            }else {
                        window.location.href = "../Inventory/customer.php"
                            }</script>'; 


			$stmt->close();
		
	
		$conn->close();
	



?>

	

</body>

</html>