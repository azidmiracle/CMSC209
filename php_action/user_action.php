
<?php
include('../database_connection.php');

?>

<!DOCTYP html>

<html>

<head>
	<title>Add User</title>
</head>

<body>
<?php

	
	$fname = $_POST["fname"];
	$uname = $_POST["uname"];
	$pass = $_POST["password"];
	$user_email = $_POST["userDetailsUserEmail"];
	$contact_num = $_POST["userDetailsUserMobile"];
	$user_type = 'user';
	$status = 'Active';
	
			
	
			
			$stmt = $conn->prepare("INSERT INTO users (name, username, password, user_email, contact_num, user_type, status) VALUES(?, ?, ?, ?, ?, ?, ?)");
		
			$stmt->bind_param("sssssss", $fname, $uname, $pass, $user_email, $contact_num, $user_type, $status);
	
			$stmt->execute();
		
			
			echo "<br>";

			echo '<script>if(confirm("Successfully updated inventory. Do you want to add another?")) {
                        window.location.href = "addUser.php"
                            }else {
                        window.location.href = "../Inventory/user.php"
                            }</script>'; 


			$stmt->close();
		
	
		$conn->close();
	



?>

	

</body>

</html>