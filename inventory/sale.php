<html>
    <head>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link href="index.css" rel="stylesheet">
      <script src="index.js"></script>

      <script src="jquery/jquery.js"></script>
      <script src="jquery/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	  
	  <!-- Additional Script to Support AJAX -->
	  <script type="text/javascript" src="../js/sale.js"></script>
	  
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

                                    <a class="nav-link active" href="sale.php">Sale</a>

                                    <a class="nav-link " href="customer.php">Customer</a>

                                    <a class="nav-link" href="purchase.php">Purchase</a>

                                    <a class="nav-link" href="vendor.php">Vendor</a>


                                    <a class="nav-link " href="search.php">Search</a>

                                    <a class="nav-link " href="reports.php">Reports</a>
                              </div>
                          </div>
                        </div>

                        <div class="col-lg-10">
                                <!-- <div class="tab-pane fade" id="v-pills-sale" role="tabpanel" aria-labelledby="v-pills-sale-tab"> -->
                                        <div class="card card-outline-secondary my-4">
                                          <div class="card-header">Sale Details</div>
                                          <div class="card-body">
                                            <div id="saleDetailsMessage"></div>
                                            <form action="../php_action/processSales.php">
                                              <div class="form-row">
												
												<!-- Connect to Database -->
												<?php
													require '../database_connection.php';
													
													$sqlCustomer = "SELECT customerId, customerName FROM customer";
													$resultCustomer = $conn -> query($sqlCustomer);

													$sqlItem = "SELECT productCode, productName FROM itemList";
													$resultItem = $conn -> query($sqlItem);
													
												?>

												<!-- Loop PHP Item Number -->

												<div class="form-group col-md-4">
                                                  <label for="saleDetailsItemNumber">Item<span class="requiredIcon">*</span></label>
                                                  <select onchange="showTotal(this.value)" class="form-control" id="saleDetailsItemNumber" name="saleDetailsItemNumber" autocomplete="off">
													<option value=""></option>
													<?php
														while ($rows = $resultItem->fetch_assoc()) {
															$productCode = $rows["productCode"];
															$productName = $rows["productName"];
															echo "<option value = '$productCode'>$productCode - $productName</option>";
														}
													?>
													</select>
                                                  <div id="saleDetailsItemNumberSuggestionsDiv" class="customListDivWidth"></div>
                                                </div>
												
                                                <!-- Original Item ID Entry
												<div class="form-group col-md-3">
                                                  <label for="saleDetailsItemNumber">Item Number<span class="requiredIcon">*</span></label>
                                                  <input type="text" class="form-control" id="saleDetailsItemNumber" name="saleDetailsItemNumber" autocomplete="off">
                                                  <div id="saleDetailsItemNumberSuggestionsDiv" class="customListDivWidth"></div>
                                                </div>
												-->
												
												<!-- Loop PHP Customer Name -->

					                            <div class="form-group col-md-4">
                                                    <label for="saleDetailsCustomerID">Customer<span class="requiredIcon">*</span></label>
                                                    <select class="form-control" id="saleDetailsCustomerID" name="saleDetailsCustomerID" autocomplete="off">
														<option value=""></option>
														<?php
															while ($rows = $resultCustomer->fetch_assoc()) {
																$customerId = $rows["customerId"];
																$customerName = $rows["customerName"];
																echo "<option value = '$customerId'>$customerId - $customerName</option>";
															}
														?>
													</select>
                                                    <div id="saleDetailsCustomerIDSuggestionsDiv" class="customListDivWidth"></div>
                                                </div>
												
												<!-- Original Customer ID Entry
                                                <div class="form-group col-md-3">
                                                    <label for="saleDetailsCustomerID">Customer ID<span class="requiredIcon">*</span></label>
                                                    <input type="text" class="form-control" id="saleDetailsCustomerID" name="saleDetailsCustomerID" autocomplete="off">
                                                    <div id="saleDetailsCustomerIDSuggestionsDiv" class="customListDivWidth"></div>
                                                </div>
												-->
												
												<!--
                                                <div class="form-group col-md-4">
                                                  <label for="saleDetailsCustomerName">Customer Name</label>
                                                  <input type="text" class="form-control" id="saleDetailsCustomerName" name="saleDetailsCustomerName" readonly>
                                                </div>
												-->
												
					
                                                <!--<div class="form-group col-md-2">-->
												<div class="form-group col-md-4">
                                                  <label for="saleDetailsSaleID">Sale ID</label>
                                                  <input type="text" class="form-control invTooltip" id="saleDetailsSaleID" name="saleDetailsSaleID" title="This will be auto-generated when you add a new record" autocomplete="off">
                                                  <div id="saleDetailsSaleIDSuggestionsDiv" class="customListDivWidth"></div>
                                                </div>
						
                                              </div>
											  
											  <!-- Show Available Stock -->
                                              <div class="form-row">
                                                <div class="form-group col-md-2">
                                                          <label for="saleDetailsTotalStock">Available Stock</label>
                                                          <input type="text" class="form-control" name="saleDetailsTotalStock" id="saleDetailsTotalStock" readonly>
                                                </div>
											  </div>
											  
                                              <div class="form-row">
                                                  <!--<div class="form-group col-md-5">
                                                    <label for="saleDetailsItemName">Item Name</label>
                                                    <!--<select id="saleDetailsItemNames" name="saleDetailsItemNames" class="form-control chosenSelect"> -->
                                                        <?php 
                                                            //require('model/item/getItemDetails.php');
                                                        ?>
                                                    <!-- </select> -->
													<!--<input type="text" class="form-control invTooltip" id="saleDetailsItemName" name="saleDetailsItemName" readonly title="This will be auto-filled when you enter the item number above">
                                                  </div> -->
												
                                                  <div class="form-group col-md-3">
                                                      <label for="saleDetailsSaleDate">Sale Date<span class="requiredIcon">*</span></label>
                                                      <input type="text" class="form-control datepicker" id="saleDetailsSaleDate" value="2018-05-24" name="saleDetailsSaleDate" readonly>
                                                  </div>
                                              </div>
											  
                                              <div class="form-row">
                                                <!--
												<div class="form-group col-md-2">
                                                          <label for="saleDetailsTotalStock">Total Stock</label>
                                                          <input type="text" class="form-control" name="saleDetailsTotalStock" id="saleDetailsTotalStock" readonly>
                                                </div>
												-->
												
                                                <div class="form-group col-md-2">
                                                  <label for="saleDetailsDiscount">Discount %</label>
                                                  <input type="text" class="form-control" id="saleDetailsDiscount" name="saleDetailsDiscount" value="0">
                                                </div>
                                                <div class="form-group col-md-2">
                                                  <label for="saleDetailsQuantity">Quantity<span class="requiredIcon">*</span></label>
                                                  <input type="number" class="form-control" id="saleDetailsQuantity" name="saleDetailsQuantity" value="0">
                                                </div>
                                                <div class="form-group col-md-2">
                                                  <label for="saleDetailsUnitPrice">Unit Price<span class="requiredIcon">*</span></label>
                                                  <input type="text" class="form-control" id="saleDetailsUnitPrice" name="saleDetailsUnitPrice" value="0">
                                                </div>
                                                <div class="form-group col-md-3">
                                                  <label for="saleDetailsTotal">Total</label>
                                                  <input type="text" class="form-control" id="saleDetailsTotal" name="saleDetailsTotal">
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-3">
                                                    <div id="saleDetailsImageContainer"></div>
                                                  </div>
                                             </div>
                                              <button type="submit" formmethod="post" id="addSaleButton" class="btn btn-success">Submit</button>
											  <!--<button type="button" id="addSaleButton" class="btn btn-success">Add Sale</button>-->
                                              <!--<button type="button" id="updateSaleDetailsButton" class="btn btn-primary">Update</button>-->
                                              <button type="reset" id="saleClear" class="btn">Clear</button>
                                            </form>
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

							
						<?php
							// Free result set
							$resultCustomer -> free_result();
							$resultItem -> free_result();

							$conn -> close();
							
						?>
</body>
</html>