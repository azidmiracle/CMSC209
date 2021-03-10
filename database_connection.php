<?php
//database_connection.php
$connect = new PDO('mysql:host=localhost;dbname=inventory', 'root', '');
//session_start();

?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
