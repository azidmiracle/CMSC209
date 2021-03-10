<?php
    include('../database_connection.php');//call the database connection
          
    //create array for the results to be used later in graphing
    $chart_data = '';//variable for chart data plotting

    $productCode;
    $currentCount;
    $productName;

    //get the number of all products
    //join the two tables mainventory and itemlist. Project a row where the current count is less than the reorder point
    $sqlAllProd="SELECT * FROM maininventory" ;    
    $result = $conn -> query($sqlAllProd);		
    $allProdCnt=$result -> num_rows;

    $result -> free_result();
        
    ////join the two tables mainventory and itemlist. Project a row where the current count is equals to 0 
    $sqlZero = "SELECT * FROM itemlist INNER JOIN maininventory ON itemlist.productCode=maininventory.productCode WHERE maininventory.currentCount=0";
    $result = $conn -> query($sqlZero);	
    $zeroCnt=$result -> num_rows;
    $CountsZero = "[$allProdCnt,$zeroCnt]";   

     $conn -> close();	
?>

<div class='h5 mb-0 font-weight-bold text-gray-800'>
    <form method="post" action="" >
        <input type="submit"  class="btn btn-lg btn-primary btn-block" id="zeroCounLabel" name="Zero" onclick="document.cookie='ReportTab=7'">
    </form>
     <!--<a id="zeroCounLabel" href="../inventory/reports.php?ReportTab=7" style="text-decoration: underline;"></a>!-->
</div> 
<div >
    <canvas id="myChartZero" ></canvas>           
</div>

<?php

if (isset($_POST['Zero'])) {

    //$_COOKIE["ReportTab"]=6;
    echo '<script> document.cookie = "ReportTab=7";</script>';   
    echo '<script>{window.location.href = "../inventory/reports.php"};</script>';   
    // {window.location.href = "../inventory/reports.php"}
}

?>


<script>
    let countArrZero= <?php echo $CountsZero ?>;

    let zeroCounLabel=document.getElementById("zeroCounLabel");
    zeroCounLabel.value = countArrZero[1] + " Items";

     //separate x values
    let chartTile_ZOP="Zero-Balance Items";            
  
    let x_valArr_Zero=["More than 0", "Zero-Balance"];//array for Product name for x-axis label                 
        
    //call this function in report.js file for plotting the graph
    let arr_2=[countArrZero[0]-countArrZero[1],countArrZero[1]];   

    createdoughnutGraph("myChartZero",chartTile_ZOP,x_valArr_Zero, arr_2,colorArr);        
        
</script>
