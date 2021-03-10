
<?php
include('../database_connection.php');

?>

<!DOCTYP html>

<html>

<head>
	<title>Add Vendor</title>
</head>

<body>
<?php
	 $suppId = $_POST["vendorDetailsVendorID"];
	$suppName = $_POST["vendorDetailsVendorFullName"];
	$suppContact = $_POST["vendorDetailsContact"];
	$suppNum = $_POST["vendorDetailsVendorMobile"];
	$suppNum2 = $_POST["vendorDetailsVendorPhone2"];
	$suppEmail = $_POST["vendorDetailsVendorEmail"];	
	$suppCity = $_POST["vendorDetailsVendorCity"];
	$suppDist = $_POST["vendorDetailsVendorDistrict"];
	$suppAdd = $_POST["vendorDetailsVendorAddress"];
	$suppAdd2 = $_POST["vendorDetailsVendorAddress2"];	
	$status = 'Active';
	
			
			$stmt = $conn->prepare("INSERT INTO supplier (supplierId,supplierName, supplierContact, contact_num, contact_num2, email, city, district, address, address2, status) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		
			$stmt->bind_param("sssssssssss", $suppId, $suppName, $suppContact, $suppNum, $suppNum2, $suppEmail, $suppCity, $suppDist, $suppAdd, $suppAdd2, $status);
	

			$stmt->execute();
		
			
			echo "<br>";

			echo '<script>if(confirm("Successfully updated inventory. Do you want to add another?")) {
                       window.location.href = "addVendor.php"
                            }else {
                        window.location.href = "../Inventory/vendor.php"
                            }</script>'; 


			$stmt->close();
		
	
		$conn->close();
	



?>

	

</body>

</html>