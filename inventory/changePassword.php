<?php
include('../database_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>


    <!-- Bootstrap core CSS -->
       <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="index.css" rel="stylesheet">
        <script src="index.js"></script>
        <script src="jquery/jquery.js"></script>
        <script src="jquery/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


<title>Change Password</title>
</head>
<body class="login">
      <!--
        <form action="" method="post" class="form-signin">

        <h1 class="h3 mb-3 font-weight-normal">Please change password</h1>
        <input type="text" name="uname" class="changePWD-show" placeholder="User Name" required="" autofocus=""/>
        <input type="password" class="changePWD-show" name="oldPassword" id="oldPassword"  placeholder="Old Password" required=""/>         
        <input type="checkbox" id="chkBoxShwPWD_old" onclick='showPassword("oldPassword")' >Show Password<br>
         <input type="password" class="changePWD-show" name="password_1" id='password_1' placeholder="New Password" required=""/> 
         <input type="checkbox" id="chkBoxShwPWD_1" onclick='showPassword("password_1")'  >Show Password<br>

          <input type="password" class="changePWD-show" name="password_2" id='password_2' placeholder="Confirm Password" required=""/> 
          <input type="checkbox" id="chkBoxShwPWD_2" onclick='showPassword("password_2")' >Show Password<br>
         
         <button type="submit"  class="btn btn-lg btn-primary btn-block" >Change Password</button>

         <a href="../index.php"  style="display:block;text-align: center;">Log-in</a>

        <p class="mt-5 mb-3 text-muted">© 2020-2021</p>

        </form>-->


        <div class="container login-container">
        <div class="row">
            <div class="col"> </div>
            <div class="col-8">
                <div class="card login-card">
                    <div class="card-block">
                        <img src="images/logo.png" class=".img-fluid login-img">
                        <form method="post" action="">
                            <div id="registerMessage"></div>
                              <!-- <div class="form-group">
                                <label for="registerFullName">Name<span class="requiredIcon">*</span></label>
                                <input type="text" class="form-control" id="registerFullName" name="registerFullName">
                                <small id="emailHelp" class="form-text text-muted"></small>
                              </div> -->
                               <div class="form-group">
                                <label for="registerUsername">Username<span class="requiredIcon">*</span></label>
                                <input type="text" class="form-control" id="registerUsername" name="registerUsername" autocomplete="on" placeholder=>
                              </div>
                              <div class="form-group">
                                <label for="oldPassword">Old Password<span class="requiredIcon">*</span></label>
                                <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                              </div>
                              <div class="form-group">
                                <label for="registerPassword1">New Password<span class="requiredIcon">*</span></label>
                                <input type="password" class="form-control" id="registerPassword1" name="registerPassword1">
                              </div>                              
                              <div class="form-group">
                                <label for="registerPassword2">Re-enter password<span class="requiredIcon">*</span></label>
                                <input type="password" class="form-control" id="registerPassword2" name="registerPassword2">
                              </div>
                              <button  class="btn btn-primary">Reset Password</button>
                              <a href="../index.php" class="btn btn-warning">Sign-in</a>
                              <!-- <button type="button" id="register" class="btn btn-success">Register</button>
                              <a href="login.php?action=resetPassword" class="btn btn-warning">Reset Password</a>
                              <button type="reset" class="btn">Clear</button> -->
                            </form>
                    </div>
                </div>
            </div>

       
        <div class="col"></div>
    </div>
</div>



    <script src="../js/showPassword.js"></script>   
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["registerUsername"]);

    $oldPassword = trim($_POST["oldPassword"]);
    $NewPassword_1 = trim($_POST["registerPassword1"]);
    $NewPassword_2 = trim($_POST["registerPassword2"]);


    echo "<br>";

if(empty($NewPassword_1) || empty($NewPassword_2) ){
    echo '<script> alert ("password cannot be empty") </script>';
}

else{
    $sql = "SELECT * FROM users where username='$name'";
    $result = $conn->query($sql);
    
  if ($result->num_rows > 0) {
      //verify the old password
      while($row=mysqli_fetch_array($result)){
        //if(password_verify($oldPassword,$row['password'])){
        //change the password    
            if($NewPassword_1==$NewPassword_2){

                //$password_hash = password_hash($NewPassword_1, PASSWORD_DEFAULT);     
                $updatePwd = "UPDATE users SET password = '$NewPassword_1' WHERE username ='$name'";

                if ($conn->query($updatePwd) === TRUE) {     
                    echo '<script>if(confirm("Update password successfully!Do you want to log-in?")) {
                        window.location.href = "../index.php"
                            }</script>'; 
                             
                } else {
                    echo '<script>alert("Error updating record: ")</script>' . $conn->error;
                }              
            }
            else{
            echo '<script>alert("password does not match")</script>';
            }

       //}
       //else{
        //echo '<script>alert("username does not exist")</script>';
      // }
       
      }
    }
   
}
$conn->close(); 
    
}
?>

