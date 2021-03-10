
<?php
include('../database_connection.php');

?>

<!DOCTYP html>

<html>

<head>
	<title>Add Product</title>
</head>

<body>
<?php

	$prodCode = $_POST["itemDetailsItemNumber"];
	//$prodImage = $_POST["itemImageFile"];
	$prodName = $_POST["itemDetailsItemName"];
	$prodDesc = $_POST["itemDetailsDescription"];
	$prodUnit = $_POST["itemDetailsUnit"];
	$prodQty = $_POST["itemDetailsQuantity"];
	$prodPrice = $_POST["itemDetailsPrice"];
	$prodReorder = $_POST["itemDetailsReorder"];
	$status = 'Active';
			
			//CHECK IF THE ITEM_NAME IS EXISTING
			//ADD SOME CODE HERE
				
			$stmt = $conn->prepare("INSERT INTO itemlist (productCode, productName, product_desc, quantity, unit, reorder, price, status) VALUES(?, ?, ?, ? , ?, ?, ?, ?)");
		
			$stmt->bind_param("sssisiis", $prodCode, $prodName, $prodDesc, $prodQty, $prodUnit, $prodReorder, $prodPrice, $status);
	
			$stmt->execute();
		
			
			echo "<br>";

			echo '<script>if(confirm("Successfully updated inventory. Do you want to add another?")) {
                        window.location.href = "addProduct.php"
                            }else {
                        window.location.href = "../Inventory/product.php"
                            }</script>'; 


			$stmt->close();
		
	
		$conn->close();
	
				 

			 


?>

	

</body>

</html>