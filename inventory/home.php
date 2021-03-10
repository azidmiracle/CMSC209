<html>

<head>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="index.css" rel="stylesheet">
    <script src="index.js"></script>


    <script src="jquery/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Datepicker -->
    <link href='../css/datepicker.css' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>

    <!-- Chart -->
    <link rel="stylesheet" href="../css/Chart.css">
    <link rel="stylesheet" href="../css/Chart.min.css">

    <script src="../js/Chart.bundle.js"></script>
    <script src="../js/Chart.bundle.min.js"></script>
    <script src="../js/Chart.js"></script>
    <script src="../js/Chart.min.js"></script>
    <script src="../js/DashBoardCharting.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/reports.css">

</head>

<body>
    <!-- navigation.php-->
    <?php 
        include('header.php');
     ?>
    <!-- sidebar options - navigation bar -->
    <div class="container-fluid" id="wrapper">
                        <div class="row">
                          <div class="col-lg-2">
                          <h1 class="my-4"></h1>
                
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        
                                <div class="navi">

                                <a class="nav-link active" href="home.php">Dashboard</a>
						
                                  <a class="nav-link" href="user.php">User</a>
                        
                                    <a class="nav-link " href="product.php">Product</a>

                                    <a class="nav-link" href="sale.php">Sale</a>

                                    <a class="nav-link " href="customer.php">Customer</a>

                                    <a class="nav-link" href="purchase.php">Purchase</a>

                                    <a class="nav-link" href="vendor.php">Vendor</a>


                                    <a class="nav-link " href="search.php">Search</a>

                                    <a class="nav-link " href="reports.php">Reports</a>

                    </div>
                </div>
            </div>

            <!-- Card Items for Dashboard to show progress reports -->
            <div class="col-lg-3 col-md-6 col-sm-2" id="card1">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-3">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Reorder</div>
                                <?php 
                               include('../dashboard/reorderpointChart.php');//call the database connection                           
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Items for Dashboard to show progress reports -->
            <div class="col-lg-3 col-md-6 col-sm-2" id="card1">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-3">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Zero-Balance
                                </div>
                                <?php 
                               include('../dashboard/ZeroBalanceChart.php');//call the database connection                           
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Card Items for Dashboard to show progress reports -->
            <div class="col-lg-3 col-md-6 col-sm-2" id="card1">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-3">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Sales
                                </div>
                                <?php 
                               include('../dashboard/totalSales.php');//call the database connection                           
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- footer.php-->
  <?php 
    include('footer.php');
  ?>

</body>

</html>