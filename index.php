<?php
include('database_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

    <!-- Bootstrap core CSS -->
       <link href="css/bootstrap.min.css" rel="stylesheet">
       <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="inventory/index.css" rel="stylesheet">
        <script src="inventory/index.js"></script>
        <script src="inventory/jquery/jquery.js"></script>
        <script src="inventory/jquery/jquery.min.js"></script>
        <script src="inventory/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="inventory/bootstrap/css/bootstrap.min.css">


</head>
<body >
    


</body>

</html>

<?php

include('inventory/login.php');

//if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['logIn'])) {
  
    $uname = trim($_POST["registerUsername"]);//save the username to variable
    $pwd = trim($_POST["registerPassword1"]);//save the password to variable
	
    echo "<br>";

    $sql = "SELECT * FROM users where username='$uname'";//select from users table where the value of username is equals to the variable $uname
    $result = $conn->query($sql);//connect to database and save the query result to $result variable
    if ($result->num_rows > 0) {//if the results is greater than 0
      //verify the password
      while($row=mysqli_fetch_array($result)){
        //if(password_verify($pwd,$row['password'])){   
           
          //save the session of the username and email for later use
          session_start();
           $_SESSION["username"]=$uname;
           $_SESSION["name"]=$uname;
           $_SESSION['phoneNumber']=$row['user_email'];
           //redirect to homepage
           // on login screen, redirect to dashboard if already logged in
          if(isset($_SESSION['username'])){
            header("location:Inventory/home.php");
            }
           
        //}
        else{
            echo '<script>alert("password does not match")</script>';
        }
      }
    }
   else{
    echo '<script>alert("username or password cannot be found.")</script>';
   } 
}

else if (isset($_POST['resetPwd'])) {
  header("location:inventory/changePassword.php");
}
$conn->close();
?>


