<!--
<?php
	session_start();
	// Redirect the user to login page if he is not logged in.
	if(!isset($_SESSION["name"])){
		header('Location: ../index.php');
		exit();
	}
	
	//require_once('inc/config/constants.php');
	//require_once('inc/config/db.php')
	//require_once('inc/header.php');
?>
  <body>
<?php
	//require 'inc/navigation.php';
?>
-->

<!-- navigation.php-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <a class="navbar-brand" href="index.php">Inventory Management System for Kayamanan ni Juan</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <span class="nav-link">Welcome <?php echo $_SESSION["name"]; ?></span>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="../index.php">Log Out</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
