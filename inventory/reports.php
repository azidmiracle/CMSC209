<html>
    <head>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="index.css" rel="stylesheet">
        <script src="index.js"></script>

        <script src="jquery/jquery.js"></script>
        <script src="jquery/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

        <!-- Datepicker -->
        <link href='../css/datepicker.css' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>

        <link rel="stylesheet" type="text/css" href="../css/reports.css">
    
        <script src="../js/CreateTable.js"></script>
        
        <script src="../js/getDataForDropDown.js"></script>
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

                                <a class="nav-link " href="home.php">Dashboard</a>
						
                                  <a class="nav-link" href="user.php">User</a>
                        
                                    <a class="nav-link " href="product.php">Product</a>

                                    <a class="nav-link" href="sale.php">Sale</a>

                                    <a class="nav-link " href="customer.php">Customer</a>

                                    <a class="nav-link" href="purchase.php">Purchase</a>

                                    <a class="nav-link" href="vendor.php">Vendor</a>


                                    <a class="nav-link " href="search.php">Search</a>

                                    <a class="nav-link active" href="reports.php">Reports</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-10">

                                <!-- <div class="tab-pane fade" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab"> -->
                                        <div class="card card-outline-secondary my-4">
                                          <div class="card-header">Reports
                                            <!--<button id="reportsTablesRefresh" name="reportsTablesRefresh" class="btn btn-warning float-right btn-sm">Refresh</button>-->
                                          </div>
                                          <div class="card-body">										
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#itemReportsTab" id="itemRepMainTab">Item</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#customerReportsTab" id="cusRepMainTab">Customer</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#saleReportsTab" id="saleRepMainTab">Sale</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#purchaseReportsTab" id="purchaseRepMainTab">Purchase</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#vendorReportsTab" id="vendorRepMainTab">Vendor</a>
                                                </li>
                                                 <!-- newly added by Emely -->
                                                <li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#reorderPointTab" id="ROP_RepMainTab">Reorder Point</a>
                                              </li>
                                                  <!-- newly added by Emely -->
                                              <li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#ZeroBalanceTab" id="Zero_RepMainTab">Zero-Balance</a>
                                              </li>                                             
                                             
                                              </ul>
                          
                                            <!-- Tab panes for reports sections -->
                                            <div class="tab-content">
                                                <div id="itemReportsTab" class="container-fluid tab-pane fade">
                                                <?php 
                                                    include('../reports/itemTable.php');                        
                                                  ?>
                                                 
                                                </div>
                                                <div id="customerReportsTab" class="container-fluid tab-pane fade">
                                                  <?php 
                                                    include('../reports/CustomerTable.php');                        
                                                    ?>
                                                </div>
                                                <div id="saleReportsTab" class="container-fluid tab-pane fade">
                                                  <?php 
                                                    include('../reports/SalesReport.php');                        
                                                  ?>
                                                 
                                                </div>
                                                <div id="purchaseReportsTab" class="container-fluid tab-pane fade">
                                                <?php 
                                                    include('../reports/PurchaseReport.php');                        
                                                  ?>
                                                </div>
                                                <div id="vendorReportsTab" class="container-fluid tab-pane fade">
                                                <?php 
                                                    include('../reports/VendorTable.php');                        
                                                    ?>
                                                </div>

                                                <!-- <p>ADDED BY EMELEY FOR THE REORDER POINT</p> -->
                                                <br>
                                                <br>
                                                <div id="reorderPointTab" class="container-fluid tab-pane fade">
                                                  <?php 
                                                        include('../reports/ReorderPointTable.php');//                         
                                                  ?>
                                                
                                              </div>   
                                              <div id="zeroBalanceTab" class="container-fluid tab-pane fade">
                                                  <?php 
                                                        include('../reports/ZeroPointTable.php');//                     
                                                  ?>
                                                
                                              </div>                                                
                                                                                           
                                            </div>
                                          </div> 
                                        </div>
                                      </div>
                                    </div>
                                 </div>
                              </div>
                            <!-- </div> -->
                            </div>
          <!-- footer.php-->
        <?php 
          include('footer.php');
        ?>
</body>
</body>

 <script>

//var x =  document.cookie
    

 
    let itemRepMainTab=document.getElementById("itemRepMainTab");
    let cusRepMainTab=document.getElementById("cusRepMainTab");    
    let saleRepMainTab=document.getElementById("saleRepMainTab"); 
    let purchaseRepMainTab=document.getElementById("purchaseRepMainTab"); 
    let vendorRepMainTab=document.getElementById("vendorRepMainTab");    
    let ROP_RepMainTab=document.getElementById("ROP_RepMainTab");
    let Zero_RepMainTab=document.getElementById("Zero_RepMainTab");

    

    let itemReportsTab=document.getElementById("itemReportsTab");
    let customerReportsTab=document.getElementById("customerReportsTab");    
    let saleReportsTab=document.getElementById("saleReportsTab");
    let purchaseReportsTab=document.getElementById("purchaseReportsTab");    
    let vendorReportsTab=document.getElementById("vendorReportsTab");      
    let reorderPointTab=document.getElementById("reorderPointTab");
    let zeroBalanceTab=document.getElementById("zeroBalanceTab");   

    let reportTab =<?php echo $_COOKIE["ReportTab"] ?>

    itemRepMainTab.addEventListener("click",function(e){
      document.cookie = `ReportTab=1`;
      //window.location.reload()
    })

    cusRepMainTab.addEventListener("click",function(e){
      document.cookie = `ReportTab=2`;
      //window.location.reload()
    })

    saleRepMainTab.addEventListener("click",function(e){
      document.cookie = `ReportTab=3`;
      //window.location.reload()
    })

    purchaseRepMainTab.addEventListener("click",function(e){
      document.cookie = `ReportTab=4`;
      //window.location.reload()
    }) 
    vendorRepMainTab.addEventListener("click",function(e){
      document.cookie = `ReportTab=5`;
     // window.location.reload()
    })   

    ROP_RepMainTab.addEventListener("click",function(e){
      document.cookie = `ReportTab=6`;
      //window.location.reload()
    })  

    Zero_RepMainTab.addEventListener("click",function(e){
      document.cookie = `ReportTab=7`;
      //window.location.reload()
    })  

        

 //REMOVE ALL THE ACTIVE CLASS FOR THE CONTENT
  itemReportsTab.classList.remove("active");
  itemReportsTab.classList.add("fade");

  customerReportsTab.classList.remove("active");
  customerReportsTab.classList.add("fade");

  saleReportsTab.classList.remove("active");
  saleReportsTab.classList.add("fade");

  purchaseReportsTab.classList.remove("active");
  purchaseReportsTab.classList.add("fade");

  vendorReportsTab.classList.remove("active");
  vendorReportsTab.classList.add("fade");

  reorderPointTab.classList.remove("active");
  reorderPointTab.classList.add("fade");

  zeroBalanceTab.classList.remove("active");
  zeroBalanceTab.classList.add("fade");


    switch (reportTab){
      case 1://ITEM
        itemRepMainTab.classList.remove("fade");
        itemReportsTab.classList.remove("fade");           
        itemRepMainTab.classList.add("active");
        itemReportsTab.classList.add("active");   
        break;  

      case 2://CUSTOMER
        cusRepMainTab.classList.remove("fade");
        customerReportsTab.classList.remove("fade");            
        cusRepMainTab.classList.add("active");
        customerReportsTab.classList.add("active");    
        break;   
      case 3://SALES
        saleRepMainTab.classList.remove("fade");
        saleReportsTab.classList.remove("fade");          
        saleRepMainTab.classList.add("active");
        saleReportsTab.classList.add("active");   

        break;   
        case 4://PURCHASE
          purchaseRepMainTab.classList.remove("fade");
          purchaseReportsTab.classList.remove("fade");          
        purchaseRepMainTab.classList.add("active");
        purchaseReportsTab.classList.add("active");   

        break; 

      case 6://REORDER POINT
        ROP_RepMainTab.classList.remove("fade");
        reorderPointTab.classList.remove("fade");          
        ROP_RepMainTab.classList.add("active");
        reorderPointTab.classList.add("active");   
        break;
      case 7://ZERO POINT
        Zero_RepMainTab.classList.remove("fade");
        zeroBalanceTab.classList.remove("fade");        
        Zero_RepMainTab.classList.add("active");
        zeroBalanceTab.classList.add("active");   
        break; 
 
      default:
        //itemRepMainTab.classList.remove("fade");
        //itemReportsTab.classList.remove("fade");           
        //itemRepMainTab.classList.add("active");
        //itemReportsTab.classList.add("active");  
        break;   
        
    }
</script>

<script type="text/javascript" src="../js/excelOut.js"></script>

</html>