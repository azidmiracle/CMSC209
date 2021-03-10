<br>

<form method="POST" action="">
    <div class="form-group">
        <div class="form-row">
            <div class="form-group col-sm">
                <label for="itemAll">Select Porducts</label>
                <select id="itemAll" name="itemAll" class="form-control chosenSelect">
                </select>
            </div>
            <div class="form-group col-sm">
                <label for="startDate">Start Date</label>
                <input type="text" class="form-control" id="startDate" name="startDate" placeholder="YYYY-MM-DD"
                    autofocus="">
            </div>
            <div class="form-group col-sm">
                <label for="endDate">End Date</label>
                <input type="text" class="form-control" id="endDate" placeholder="YYYY-MM-DD" name="endDate"
                    autofocus="">
            </div>
            <input type="submit" value="Show Report" class="btn col-sm" name="generateData">
        </div>
    </div>
</form>
<!-- Script  */-->

<br>
<button onclick="exportTableToExcel('salesTable', 'Sales Reports')" class="btn">Print</button>	

<script>
$(document).ready(function() {
    var start_date_input_sales = $('input[name="startDate"]'); //our date input has the name "date"
    var end_date_input_sales = $('input[name="endDate"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    start_date_input_sales.datepicker(options);
    end_date_input_sales.datepicker(options);

});
</script>

<?php
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

  include('../database_connection.php');

    //get the item list from database for dropdown list binding
  $AllproductNameSales="";
  $queryMainInventorySales = "SELECT itemlist.productName as productName FROM itemlist INNER JOIN maininventory ON itemlist.productCode=maininventory.productCode";
  $resultMainSales = $conn -> query($queryMainInventorySales); 
  if ($resultMainSales -> num_rows > 0) {  
    while ($row = $resultMainSales -> fetch_assoc()) {
         $AllproductNameSales .= "'" . $row["productName"]. "'" . ",";
    }

}
?>

<?php

$selectedItemSales;

$startDate_sqlSales;
$endDate_sqlSales; 

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      //$_COOKIE["ReportTab"]=3;  

      $selectedItemSales = trim($_POST['itemAll']);

      $startDate_sqlSales = trim($_POST['startDate']);
      
      $endDate_sqlSales = trim($_POST['endDate']);


      $startDate=date_create($startDate_sqlSales);
      $endDate=date_create($endDate_sqlSales);

      $noOfDays=date_diff($startDate,$endDate)->format("%a");

      $sqlStatement="";

      $total=0;

      if($selectedItemSales =="All"){
         //Select the issued quantity and receipt quantity of the product ranging from the selected date

         $sqlStatement="SELECT * FROM salesordersingles join itemlist on salesordersingles.productCode=itemlist.productCode 
         WHERE  saleDate BETWEEN '$startDate_sqlSales' AND '$endDate_sqlSales'  ORDER BY saleDate ASC";      
        }
        else
        {
          $sqlStatement="SELECT * FROM salesordersingles join itemlist on salesordersingles.productCode=itemlist.productCode 
          WHERE  itemlist.productName='$selectedItemSales' AND saleDate BETWEEN '$startDate_sqlSales' AND '$endDate_sqlSales'  ORDER BY saleDate ASC";   
        }

        $result= $conn -> query($sqlStatement);
        if ($result -> num_rows > 0) {	
          echo "<h1> Sales Report from $startDate_sqlSales to $endDate_sqlSales</h1>";
            echo "<table id='salesTable'>";
            echo "<tr>";
            echo "<th>No. </th><th>Issued Date</th><th>Product ID</th><th>Product Name</th><th>sold qty</th><th>unit_price</th><th>unit_qty</th><th>unit</th><th> Sub Total (Php) </th>";
            echo "</tr>";           
            $i=1;
          while ($row = $result -> fetch_assoc()) { 
               
            $goodsIssueDate=  $row["saleDate"];  
            $productCode=  $row["productCode"];   
            $productName=  $row["productName"];   
            $sold_qty=  $row["qtySold"];  
            $unit_price=  $row["price"];               
            $unit_qty=  $row["quantity"];  
            $unit=  $row["unit"];  
            
            $subTotal= $sold_qty * $unit_price;

            $total=$total+$subTotal;

            echo 
            "<tr><td>" .  $i .
              "</td><td>" .  $goodsIssueDate .
				       "</td><td>" . $productCode.
                "</td><td>" . $productName.
                "</td><td>" . $sold_qty.
                "</td><td>" . $unit_price.
                "</td><td>" . $unit_qty.
                "</td><td>" . $unit.               
				"</td><td>" . $subTotal.                                                               
				"</td></td>";
              $i++;                                           
          }
          echo "<tr > <td>";
          echo "<td ></td>";
          echo "<td > </td>";
          echo "<td > </td>";
          echo "<td ></td>";
          echo "<td > </td>";
          echo "<td > </td>";
          echo "<td ></td>";       
         echo "<td >Total: $total </td>";
          echo "</table>";  
          
        }  
  }
?>
<script>
  let itemAll = document.getElementById("itemAll");
  let allProducts = [<?php echo $AllproductNameSales ?>];


  getData('itemAll', allProducts);
    //GET THE VALUE OF THE SELECTED ITEM

    itemAll.addEventListener("change", function(e) {
        let selecTedValue = itemAll.value;

  })
</script>