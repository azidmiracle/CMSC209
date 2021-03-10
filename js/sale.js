/* sale.js is a script called inside sale.php
 * Supports AJAX to retrieve Available Total Stock
 */
 
 console.log("Loaded sale.js");
 
 function showTotal(str) {
	console.log("Called showTotal function.");
    if (str === "") {
        document.getElementById("saleDetailsTotalStock").innerHTML = "secret";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("saleDetailsTotalStock").value = this.responseText;
            }
        };
        xmlhttp.open("GET","../php_action/getStock.php?q="+str,true);
        xmlhttp.send();
    }
}