<?php
	$q = intval($_GET['q']);

	require '../database_connection.php';

	$sqlStock = "SELECT currentCount FROM mainInventory WHERE productCode = '".$q."'";
	$resultStock = $conn -> query($sqlStock);

	while ($rows = $resultStock->fetch_assoc()) {
		$currentCount = $rows["currentCount"];
		echo $currentCount;
	}

	$resultStock -> free_result();
	$conn -> close();
?>