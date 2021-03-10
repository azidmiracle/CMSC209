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
	  <script type="text/javascript" src="../js/purchase.js"></script>
	  
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

                                    <a class="nav-link " href="sale.php">Sale</a>

                                    <a class="nav-link " href="customer.php">Customer</a>

                                    <a class="nav-link active" href="purchase.php">Purchase</a>

                                    <a class="nav-link" href="vendor.php">Vendor</a>

                                    <a class="nav-link " href="search.php">Search</a>

                                    <a class="nav-link " href="reports.php">Reports</a>
                              </div>
                          </div>
                        </div>

                        <div class="col-lg-10">
                                <!-- <div class="tab-pane fade" id="v-pills-Purchase" role="tabpanel" aria-labelledby="v-pills-Purchase-tab"> -->
                                        <div class="card card-outline-secondary my-4">
                                          <div class="card-header">Purchase Details</div>
                                          <div class="card-body">
                                            <div id="PurchaseDetailsMessage"></div>
                                            <form action="../php_action/processPurchase.php">
                                              <div class="form-row">
												
												<!-- Connect to Database -->
												<?php
													require '../database_connection.php';
													
													$sqlsupplier = "SELECT supplierId, supplierName FROM supplier";
													$resultsupplier = $conn -> query($sqlsupplier);

													$sqlItem = "SELECT productCode, productName FROM itemList";
													$resultItem = $conn -> query($sqlItem);
													
												?>

												<!-- Loop PHP Item Number -->

												<div class="form-group col-md-4">
                                                  <label for="PurchaseDetailsItemNumber">Item<span class="requiredIcon">*</span></label>
                                                  <select onchange="showTotal(this.value)" class="form-control" id="PurchaseDetailsItemNumber" name="PurchaseDetailsItemNumber" autocomplete="off">
													<option value=""></option>
													<?php
														while ($rows = $resultItem->fetch_assoc()) {
															$productCode = $rows["productCode"];
															$productName = $rows["productName"];
															echo "<option value = '$productCode'>$productCode - $productName</option>";
														}
													?>
													</select>
                                                  <div id="PurchaseDetailsItemNumberSuggestionsDiv" class="customListDivWidth"></div>
                                                </div>
												
                                                <!-- Original Item ID Entry
												<div class="form-group col-md-3">
                                                  <label for="PurchaseDetailsItemNumber">Item Number<span class="requiredIcon">*</span></label>
                                                  <input type="text" class="form-control" id="PurchaseDetailsItemNumber" name="PurchaseDetailsItemNumber" autocomplete="off">
                                                  <div id="PurchaseDetailsItemNumberSuggestionsDiv" class="customListDivWidth"></div>
                                                </div>
												-->
												
												<!-- Loop PHP supplier Name -->

					                            <div class="form-group col-md-4">
                                                    <label for="PurchaseDetailssupplierID">supplier<span class="requiredIcon">*</span></label>
                                                    <select class="form-control" id="PurchaseDetailssupplierID" name="PurchaseDetailssupplierID" autocomplete="off">
                                                        <option value=""></option>
                                                        <?php
                                                          while ($rows = $resultsupplier->fetch_assoc()) {
                                                            $supplierId = $rows["supplierId"];
                                                            $supplierName = $rows["supplierName"];
                                                            echo "<option value = '$supplierId'>$supplierId - $supplierName</option>";
                                                          }
                                                        ?>
													                            </select>
                                                    <div id="PurchaseDetailssupplierIDSuggestionsDiv" class="customListDivWidth"></div>
                                                </div>
												
												<!-- Original supplier ID Entry
                                                <div class="form-group col-md-3">
                                                    <label for="PurchaseDetailssupplierID">supplier ID<span class="requiredIcon">*</span></label>
                                                    <input type="text" class="form-control" id="PurchaseDetailssupplierID" name="PurchaseDetailssupplierID" autocomplete="off">
                                                    <div id="PurchaseDetailssupplierIDSuggestionsDiv" class="customListDivWidth"></div>
                                                </div>
												-->
												
												<!--
                                                <div class="form-group col-md-4">
                                                  <label for="PurchaseDetailssupplierName">supplier Name</label>
                                                  <input type="text" class="form-control" id="PurchaseDetailssupplierName" name="PurchaseDetailssupplierName" readonly>
                                                </div>
												-->
												
					
                                                <!--<div class="form-group col-md-2">-->
												<div class="form-group col-md-4">
                                                  <label for="PurchaseDetailsPurchaseID">Purchase ID</label>
                                                  <input type="text" class="form-control invTooltip" id="PurchaseDetailsPurchaseID" name="PurchaseDetailsPurchaseID" title="This will be auto-generated when you add a new record" autocomplete="off">
                                                  <div id="PurchaseDetailsPurchaseIDSuggestionsDiv" class="customListDivWidth"></div>
                                                </div>
						
                                              </div>
											  
											  <!-- Show Available Stock -->
                                              <div class="form-row">
                                                <div class="form-group col-md-2">
                                                          <label for="purchaseDetailsTotalStock">Available Stock</label>
                                                          <input type="text" class="form-control" name="purchaseDetailsTotalStock" id="purchaseDetailsTotalStock" readonly>
                                                </div>
											  </div>
											  
                                              <div class="form-row">
                                                  <!--<div class="form-group col-md-5">
                                                    <label for="PurchaseDetailsItemName">Item Name</label>
                                                    <!--<select id="PurchaseDetailsItemNames" name="PurchaseDetailsItemNames" class="form-control chosenSelect"> -->
                                                        <?php 
                                                            //require('model/item/getItemDetails.php');
                                                        ?>
                                                    <!-- </select> -->
													<!--<input type="text" class="form-control invTooltip" id="PurchaseDetailsItemName" name="PurchaseDetailsItemName" readonly title="This will be auto-filled when you enter the item number above">
                                                  </div> -->
												
                                                  <div class="form-group col-md-3">
                                                      <label for="PurchaseDetailsPurchaseDate">Purchase Date<span class="requiredIcon">*</span></label>
                                                      <input type="text" class="form-control datepicker" id="PurchaseDetailsPurchaseDate" value="2018-05-24" name="PurchaseDetailsPurchaseDate" readonly>
                                                  </div>
                                              </div>
											  
                                              <div class="form-row">
                                                <!--
												<div class="form-group col-md-2">
                                                          <label for="PurchaseDetailsTotalStock">Total Stock</label>
                                                          <input type="text" class="form-control" name="PurchaseDetailsTotalStock" id="PurchaseDetailsTotalStock" readonly>
                                                </div>
												-->
												
                                                <div class="form-group col-md-2">
                                                  <label for="PurchaseDetailsDiscount">Discount %</label>
                                                  <input type="text" class="form-control" id="PurchaseDetailsDiscount" name="PurchaseDetailsDiscount" value="0">
                                                </div>
                                                <div class="form-group col-md-2">
                                                  <label for="PurchaseDetailsQuantity">Quantity<span class="requiredIcon">*</span></label>
                                                  <input type="number" class="form-control" id="PurchaseDetailsQuantity" name="PurchaseDetailsQuantity" value="0">
                                                </div>
                                                <div class="form-group col-md-2">
                                                  <label for="PurchaseDetailsUnitPrice">Unit Price<span class="requiredIcon">*</span></label>
                                                  <input type="text" class="form-control" id="PurchaseDetailsUnitPrice" name="PurchaseDetailsUnitPrice" value="0">
                                                </div>
                                                <div class="form-group col-md-3">
                                                  <label for="PurchaseDetailsTotal">Total</label>
                                                  <input type="text" class="form-control" id="PurchaseDetailsTotal" name="PurchaseDetailsTotal">
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-3">
                                                    <div id="PurchaseDetailsImageContainer"></div>
                                                  </div>
                                             </div>
                                              <button type="submit" formmethod="post" id="addPurchaseButton" class="btn btn-success">Submit</button>
											  <!--<button type="button" id="addPurchaseButton" class="btn btn-success">Add Purchase</button>-->
                                              <!--<button type="button" id="updatePurchaseDetailsButton" class="btn btn-primary">Update</button>-->
                                              <button type="reset" id="PurchaseClear" class="btn">Clear</button>
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
							$resultsupplier -> free_result();
							$resultItem -> free_result();

							$conn -> close();
							
						?>
</body>
</html>