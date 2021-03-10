<br>

<form method="POST" action="" >
  <div class="form-group">
    <div class="form-row">
        <div class="form-group col-sm">
            <label for="itemAllPO">Select Products</label>
            <select id="itemAllPO" name="itemAllPO" class="form-control chosenSelect" >
            </select>
        </div>
      <div class="form-group col-sm">
        <label for="startDate">Start Date</label>
          <input type="text" class="form-control" id="startDate" name="startDate" placeholder="YYYY-MM-DD"   autofocus="">
      </div>
      <div class="form-group col-sm">
        <label for="endDate">End Date</label>
          <input type="text" class="form-control" id="endDate"  placeholder="YYYY-MM-DD" name="endDate"  autofocus="">
      </div>
        <input type="submit" value="Show Report" class="btn col-sm" name="generateData" >           
   
    </div>          
  </div>
</form>
<!-- Script  */-->

<br>
<button onclick="exportTableToExcel('purchaseTable', 'Purchase Reports')" class="btn">Print</button>	


<script>
   
  $(document).ready(function() {
      var start_date_input_PO = $('input[name="startDate"]'); //our date input has the name "date"
      var end_date_input_PO = $('input[name="endDate"]'); //our date input has the name "date"
      var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
      var options = {
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
            };
      start_date_input_PO.datepicker(options);
      end_date_input_PO.datepicker(options);

  });

</script>

<?php
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

  include('../database_connection.php');

    //get the item list from database for dropdown list binding
  $AllproductNamePO="";
  $queryMainInventoryPO = "SELECT itemlist.productName as productName FROM itemlist INNER JOIN maininventory ON itemlist.productCode=maininventory.productCode";
  $resultMainPO = $conn -> query($queryMainInventoryPO); 
  if ($resultMainPO -> num_rows > 0) {  
    while ($row = $resultMainPO -> fetch_assoc()) {
         $AllproductNamePO .= "'" . $row["productName"]. "'" . ",";
    }

}
?>

<?php

$selectedItemPO;

$startDate_sqlPO;
$endDate_sqlPO; 

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      //$_COOKIE["ReportTab"]=3;  

      $selectedItemPO = trim($_POST['itemAllPO']);

      $startDate_sqlPO = trim($_POST['startDate']);
      
      $endDate_sqlPO = trim($_POST['endDate']);


      $startDate=date_create($startDate_sqlPO);
      $endDate=date_create($endDate_sqlPO);

      $noOfDays=date_diff($startDate,$endDate)->format("%a");

      $sqlStatement="";

      $total=0;

      if($selectedItemPO =="All"){

 
        $sqlStatement="SELECT * FROM purchaseordersingles join itemlist on purchaseordersingles.productCode=itemlist.productCode 
        WHERE  purchaseDate BETWEEN '$startDate_sqlPO' AND '$endDate_sqlPO'  ORDER BY purchaseDate ASC";      
       }
       else
       {
         $sqlStatement="SELECT * FROM purchaseordersingles join itemlist on purchaseordersingles.productCode=itemlist.productCode 
         WHERE  itemlist.productName='$selectedItemSales' AND purchaseDate BETWEEN '$startDate_sqlPO' AND '$endDate_sqlPO'  ORDER BY purchaseDate ASC";   
       }

       $result= $conn -> query($sqlStatement);
       if ($result -> num_rows > 0) {	
        echo "<h1> Purchase Report from $startDate_sqlPO to $endDate_sqlPO</h1>";
           echo "<table id='purchaseTable'>";          
           echo "<tr>";
           echo "<th>No. </th><th>Issued Date</th><th>Product ID</th><th>Product Name</th><th>bought qty</th><th>unit_price</th><th>unit_qty</th><th>unit</th><th> Sub Total (Php) </th>";
           echo "</tr>";           
           $i=1;
         while ($row = $result -> fetch_assoc()) { 
              
           $goodsIssueDate=  $row["purchaseDate"];  
           $productCode=  $row["productCode"];   
           $productName=  $row["productName"];   
           $bought_qty=  $row["qtybought"];  
           $unit_price=  $row["price"];               
           $unit_qty=  $row["quantity"];  
           $unit=  $row["unit"];  
           
           $subTotal= $bought_qty * $unit_price;

           $total=$total+$subTotal;

           echo 
           "<tr><td>" .  $i .
             "</td><td>" .  $goodsIssueDate .
              "</td><td>" . $productCode.
               "</td><td>" . $productName.
               "</td><td>" . $bought_qty.
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

    let itemAllPO=document.getElementById("itemAllPO");
    let allProductsPO=[<?php echo $AllproductNamePO?>];


    getData('itemAllPO',allProductsPO);
    //GET THE VALUE OF THE SELECTED ITEM

    itemAllPO.addEventListener("change",function(e){
        let selecTedValue = itemAllPO.value;
        
    })


</script>
