<?php
    include('../database_connection.php');//call the database connection            
    //create array for the results to be used later in graphing
    $chart_data = '';//variable for chart data plotting

    $productCode;
    $currentCount;
    $productName;
            
    $reorderPoint;

    //get the number of all products
    //join the two tables mainventory and itemlist. Project a row where the current count is less than the reorder point
    $sqlAllProd="SELECT * FROM maininventory" ;    
    $result = $conn -> query($sqlAllProd);		
    $allProdCnt=$result -> num_rows;

    $result -> free_result();

    //join the two tables mainventory and itemlist. Project a row where the current count is less than the reorder point
     $sqlRorder="SELECT * FROM maininventory LEFT OUTER JOIN itemlist ON maininventory.productCode=itemlist.productCode 
                WHERE maininventory.currentCount<itemlist.reorder" ;    
    $result = $conn -> query($sqlRorder);		
    $reorderCnt=$result -> num_rows;
    $result -> free_result();      
    $Counts = "[$allProdCnt,$reorderCnt]"; 

?>

<div class='h5 mb-0 font-weight-bold text-gray-800'>
    <form method="post" action="" >
    <input type="submit" class="btn btn-lg btn-primary btn-block" id="reOrderLabel" name="ROP" onclick="document.cookie='ReportTab=6'">
    </form>
  
</div> 

<div >
    <canvas id="myChartReorder" ></canvas>           
</div>

<?php

if (isset($_POST['ROP'])) {

    //$_COOKIE["ReportTab"]=6;
    echo '<script> document.cookie = "ReportTab=6";</script>';   
    echo '<script>{window.location.href = "../inventory/reports.php"};</script>';   
    // {window.location.href = "../inventory/reports.php"}
}

?>

<script>
    let countArr= <?php echo $Counts ?>;

    let reOrderLabel=document.getElementById("reOrderLabel");
    reOrderLabel.value = countArr[1] + " Items";
    
    let chart_data=[<?php echo $chart_data; ?>];
     //separate x values
    let chartTile_ROP="Items Below Reorder Point";          

    let x_valArr_ReOr=["Above Reorder Point", "Below Reorder Point"];//array for Product name for x-axis label     
    let colorArr=['rgba(0, 204, 0)','rgba(255, 0, 0)']                  
          
    //call this function in report.js file for plotting the graph
    let arr_1=[countArr[0]-countArr[1],countArr[1]];          

    createdoughnutGraph("myChartReorder",chartTile_ROP,x_valArr_ReOr, arr_1,colorArr);        
        
</script>
