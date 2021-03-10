<html>
    <head>
       <!--  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="index.css" rel="stylesheet">
        <script src="index.js"></script>


        <script src="jquery/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->
</head>

<body class="login">

    <div class="container login-container">
        <div class="row">
            <div class="col"> </div>
            <div class="col-8">
                <div class="card login-card">
                    <div class="card-block">
                        <img src="inventory/images/logo.png" class=".img-fluid login-img">
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
                                <label for="registerPassword1">Password<span class="requiredIcon">*</span></label>
                                <input type="password" class="form-control" id="registerPassword1" name="registerPassword1">
                              </div>
                              <!-- <div class="form-group">
                                <label for="registerPassword2">Re-enter password<span class="requiredIcon">*</span></label>
                                <input type="password" class="form-control" id="registerPassword2" name="registerPassword2">
                              </div> -->
                              <button  class="btn btn-primary" name="logIn">Login</button>
                              <button class="btn btn-warning"  name="resetPwd">Reset Password</button>
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
</body>

</html>