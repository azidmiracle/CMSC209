<form method="POST" action="" >
  <div class="form-group">
    <div class="form-row">
      <div class="form-group col-sm">
          <input type="text" class="form-control" id="SearchCustomerID" name="SearchCustomer" placeholder="Type Customer Name or Id"   autofocus="">
      </div>
        <input type="submit" value="search" class="btn col-sm" name="SearchCustomerBtn" onclick="document.cookie='searchTab=2'">             
    </div>          
  </div>
</form>

<?php
    include('../database_connection.php');
    
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['SearchCustomerBtn'])) {
    
     $custName = trim($_POST['SearchCustomer']);    
	
	$sql = "SELECT * FROM `customer` WHERE  customerName LIKE '%$custName%' or customerId LIKE '%$custName%'";
	$result = $conn -> query($sql);		
	if ($result -> num_rows > 0) {			
	// Build table for display
				
		echo "<table>";
		echo "<tr>";
    echo "  <th>SO#</th>          
    <th>Customer ID</th> 
    <th>Customer Name</th>         
    <th>Mobile Number</th>    
    <th>Tel Number</th>       
    <th>Email</th>  
    <th>City</th>       
    <th>District</th>   
    <th>Address</th>       
    <th>Address2</th>    
    <th>Status</th>
    <th></th>         
    ";
		echo "</tr>";
				
		while ($row = $result -> fetch_assoc()) {
      echo  "<td>" . $row["id"] .
      "</td><td>" . $row["customerId"] . 
          "</td><td>" . $row["customerName"] . 
          "</td><td>" . $row["contact_num"] . 
          "</td><td>" . $row["contact_num2"] .  
          "</td><td>". $row["email"] . 
          "</td><td>" . $row["city"] .
          "</td><td>" . $row["district"] .  
          "</td><td>" . $row["address"] .   
          "</td><td>" . $row["address2"] .  
          "</td><td>" . $row["status"] . 
          "</td><td>" . 
   
                "<td><a href=\"../php_action/editCustomer.php?id=$row[id]\">Edit</a> | <a href=\"../php_action/deleteCustomer.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>" .

          "</td></tr>";
		}			

			
		// Free result set
		$result -> free_result();
  }
  
  else{
    echo "Cannot find $custName.";
  }		
  echo "</table>";
    $conn -> close();	


}
?>