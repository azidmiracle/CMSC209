<html>
    <head>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link href="index.css" rel="stylesheet">
      <script src="index.js"></script>


      <script src="jquery/jquery.js"></script>
      <script src="jquery/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

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

                                <a class="nav-link " href="home.php">Dashboard</a>
						
                                  <a class="nav-link" href="user.php">User</a>
                        
                                    <a class="nav-link " href="product.php">Product</a>

                                    <a class="nav-link" href="sale.php">Sale</a>

                                    <a class="nav-link " href="customer.php">Customer</a>

                                    <a class="nav-link" href="purchase.php">Purchase</a>

                                    <a class="nav-link" href="vendor.php">Vendor</a>


                                    <a class="nav-link active" href="search.php">Search</a>

                                    <a class="nav-link" href="reports.php">Reports</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-10">
                                <!-- <div class="tab-pane fade" id="v-pills-search" role="tabpanel" aria-labelledby="v-pills-search-tab"> -->
                                        <div class="card card-outline-secondary my-4">
                                          <div class="card-header">Search Inventory
                                            <!-- <button id="searchTablesRefresh" name="searchTablesRefresh" class="btn btn-warning float-right btn-sm">Refresh</button>-->
                                          </div>
                                          <div class="card-body">										
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#itemSearchTab" id="itemSearchMainTab">Item</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#customerSearchTab" id="customerSearchMainTab">Customer</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#saleSearchTab" id="saleSearchMainTab">Sale</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#purchaseSearchTab" id="purchaseSearchMainTab">Purchase</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#vendorSearchTab" id="vendorSearchMainTab">Vendor</a>
                                                </li>
                                            </ul>
                          
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div id="itemSearchTab" class="container-fluid tab-pane">
                                                <?php 
                                                    include('../search/ItemSearch.php');                        
                                                  ?>
                                                </div>
                                                <div id="customerSearchTab" class="container-fluid tab-pane fade">
                                                <?php 
                                                    include('../search/customerSearch.php');                        
                                                  ?>
                                                </div>
                                                <div id="saleSearchTab" class="container-fluid tab-pane fade">
                                                <?php 
                                                    include('../search/saleSearch.php');                        
                                                  ?>
                                                </div>
                                                <div id="purchaseSearchTab" class="container-fluid tab-pane fade">
                                                <?php 
                                                    include('../search/purchaseSearch.php');                        
                                                  ?>
                                                </div>
                                                <div id="vendorSearchTab" class="container-fluid tab-pane fade">
                                                <?php 
                                                    include('../search/supplierSearch.php');                        
                                                  ?>
                                                </div>
                                            </div>
                                          </div> 
                                        </div>
                                      </div>
                </div>
                </div>
                <!-- </div> -->
                <footer class="footer">
                        <div class="container">
                          <div class="m-0 text-center text-white">Copyright &copy;  Coloso | Diaz | Hugo | Madjus  2020</div>
                        </div>
                    </footer>
                </body>
                </html>                        

<script>

//var x =  document.cookie
    
  
    let itemSearchMainTab=document.getElementById("itemSearchMainTab");
    let customerSearchMainTab=document.getElementById("customerSearchMainTab");    
    let saleSearchMainTab=document.getElementById("saleSearchMainTab"); 
    let purchaseSearchMainTab=document.getElementById("purchaseSearchMainTab"); 
    let vendorSearchMainTab=document.getElementById("vendorSearchMainTab");    


    

    let itemSearchTab=document.getElementById("itemSearchTab");
    let customerSearchTab=document.getElementById("customerSearchTab");    
    let saleSearchTab=document.getElementById("saleSearchTab"); 
    let purchaseSearchTab=document.getElementById("purchaseSearchTab"); 
    let vendorSearchTab=document.getElementById("vendorSearchTab");        
   


    let searchTab =<?php echo $_COOKIE["searchTab"] ?>
  
 //REMOVE ALL THE ACTIVE CLASS FOR THE CONTENT
  itemSearchTab.classList.remove("active");
  itemSearchTab.classList.add("fade");

  customerSearchTab.classList.remove("active");
  customerSearchTab.classList.add("fade");

  saleSearchTab.classList.remove("active");
  saleSearchTab.classList.add("fade");

  purchaseSearchTab.classList.remove("active");
  purchaseSearchTab.classList.add("fade");

  vendorSearchTab.classList.remove("active");
  vendorSearchTab.classList.add("fade");

    switch (searchTab){
      case 1://ITEM
        itemSearchMainTab.classList.remove("fade");
        itemSearchTab.classList.remove("fade");           
        itemSearchMainTab.classList.add("active");
        itemSearchTab.classList.add("active");   
        break;  

      case 2://CUSTOMER
        customerSearchMainTab.classList.remove("fade");
        customerSearchTab.classList.remove("fade");            
        customerSearchMainTab.classList.add("active");
        customerSearchTab.classList.add("active");    
        break;   
      case 3://SALES
        saleSearchMainTab.classList.remove("fade");
        saleSearchTab.classList.remove("fade");          
        saleSearchMainTab.classList.add("active");
        saleSearchTab.classList.add("active");   

        break;   
        case 4://PURCHASE
          purchaseSearchMainTab.classList.remove("fade");
          purchaseSearchTab.classList.remove("fade");          
          purchaseSearchMainTab.classList.add("active");
          purchaseSearchTab.classList.add("active");   

        break; 

        case 5://PURCHASE
          vendorSearchMainTab.classList.remove("fade");
          vendorSearchTab.classList.remove("fade");          
          vendorSearchMainTab.classList.add("active");
          vendorSearchTab.classList.add("active");   

        break; 

      default:
        //itemSearchMainTab.classList.remove("fade");
        //itemSearchTab.classList.remove("fade");           
        //itemSearchMainTab.classList.add("active");
        //itemSearchTab.classList.add("active");  
        break;   
        
    }



</script>
