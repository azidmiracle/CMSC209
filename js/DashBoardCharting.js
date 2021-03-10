//get the average consumption rate

function getAveStay(chart_data_aveStay){
         //get the accumulative average stay
        //FOR AVERAGE STAY
        //var chart_data_aveStay= ['.$chart_data_aveStay.'];//convert the php variable to javascript
        
        //sort in descending order
        chart_data_aveStay.sort(function (a, b) {
            return b.aveStay - a.aveStay;
        })  
        
        let accuAveStay=0;//variable for the accumulative average stay
        chart_data_aveStay.forEach(element =>{
            let AveStay=element["aveStay"];
            accuAveStay=accuAveStay+AveStay;
            element["cumAveStay"]=accuAveStay;  //push this key to the chart_data_aveStay object                             
        });


        //get the percentAverage
        let maxAccuAveStay=chart_data_aveStay[chart_data_aveStay.length-1]["cumAveStay"];//get the maximum accumalive average stay and use it as the divisor for all.
        chart_data_aveStay.forEach(element =>{
            let accuAveStay=element["cumAveStay"];
            let accAveStayPcnt=(accuAveStay/maxAccuAveStay)*100;//divide the current element (ave accumlated stay) by maxAccuAveStay and multiple by 100 to get the percentage value
            element["cumAveStayPerCent"]=accAveStayPcnt; //push this key to the chart_data_aveStay object   

            let aveStayClass=aveStayClassification (accAveStayPcnt);//classify the percentage value. call this function aveStayClassification to classify it
            element["aveStayClass"]=aveStayClass; //push this key to the chart_data_aveStay object 
        }); 
        //console.log(chart_data_aveStay)
        /*Object chart_data_aveStay is like this
                chart_data_aveStay=[{ProductName:value,
                                    aveStay:value,
                                    cumAveStay:value,
                                    cumAveStayPerCent:value,
                                    aveStayClass:value}]*/

        //--end--FOR AVERAGE STAY--end

        return chart_data_aveStay;
}

function getConsumptionRate(chart_data_Consump){
       //FOR CONSUMPTION RATE
      //get the accumulative consumption rate
      
      //var chart_data_Consump=['.$chart_data_Consump.'];//convert the php variable to javascript
      //sort in descending order
      chart_data_Consump.sort(function (a, b) {
          return b.consumptioRate - a.consumptioRate;
      })  
      
      let accuAveConsump=0;//variable for the accumulative consumption rate
      chart_data_Consump.forEach(element =>{
          let AveConsump=element["consumptioRate"];
          accuAveConsump=accuAveConsump+AveConsump;
          element["cumAveConsump"]=accuAveConsump;  //push this key to the chart_data_Consump object                                
      });

      //get the percentAverage
      let maxAccuConsump=chart_data_Consump[chart_data_Consump.length-1]["cumAveConsump"];//get the maximum accumalive consumption rate and use it as the divisor for all.
      chart_data_Consump.forEach(element =>{
          let accuAveConsump=element["cumAveConsump"];
          let accuAveConsumpPcnt=(accuAveConsump/maxAccuConsump)*100; //divide the current element (ave accumlated  consumption rate) by maxAccuConsump and multiple by 100 to get the percentage value
          element["cumAveConsPerCent"]=accuAveConsumpPcnt; //push this key to the chart_data_Consump object   
          let aveConsumpClass=aveConsumpClassification (accuAveConsumpPcnt);//classify the percentage value. call this function aveConsumpClassification to classify it
          element["aveConsumpClass"]=aveConsumpClass;  //push this key to the chart_data_Consump object                                              
      }); 
      /*Object chart_data_Consump is like this
              chart_data_Consump=[{ProductName:value,
                                  consumptioRate:value,
                                  cumAveConsump:value,
                                  cumAveConsPerCent:value,
                                  aveConsumpClass:value   }]*/            

      //--end--FOR CONSUMPTION RATE--end

      return chart_data_Consump;
}

function getFinalClass(chart_data_aveStay){
            //get the final classification by combining the average stay and consumption rate
        //filter all the products and aveStayClass
        let mappedProd=chart_data_aveStay.map(prod=>
            prod.ProductName
      );

        var combinedClassArr=[];//array for the final classification

        for (i=0;i<mappedProd.length;i++){//loop through the product name
          let prodName=mappedProd[i];//get the product name
          
          let data_aveStay_Class=chart_data_aveStay.filter(element=>element.ProductName===prodName);//filer all the  ProductName with the value equals to  prodName             
          let data_conSump_Class=chart_data_Consump.filter(element=>element.ProductName===prodName); //filer all the  ProductName with the value equals to  prodName                           
          let combObj={};

          combObj["ProductName"]=prodName;//add product name to the object
          let finalClass=FinalClassification(data_aveStay_Class[0]["aveStayClass"],data_conSump_Class[0]["aveConsumpClass"])//call the function FinalClassification
          combObj["aveConsumpClass"]=data_conSump_Class[0]["aveConsumpClass"];                
          combObj["aveStayClass"]=data_aveStay_Class[0]["aveStayClass"];  
          combObj["ClassFinal"]=finalClass; //add final classiication to the object              

          combinedClassArr[i]=combObj; //add the object to the final array
        /*Object combinedClassArr is like this
        combinedClassArr=[{ProductName:value,
                                    ClassFinal:value]*/   
          
        }

        return combinedClassArr;

}

//FOR CHARTING
//FSN AVERAGE STAY

function createTable(parentNode,data,header1,header2,header3,header4,){

    let myTable = document.createElement("table");   
    myTable.setAttribute("id", "myTable");  
    
     //create header
        
    let mytr = document.createElement("tr");  
    let th_1=document.createElement("th"); 
    let th_2=document.createElement("th");     
    let th_3=document.createElement("th");    
    let th_4=document.createElement("th");       
    let th_FSNClass=document.createElement("th");        
    th_1.innerHTML=header1;
    th_2.innerHTML=header2;
    th_3.innerHTML=header3;
    th_4.innerHTML=header4;
    th_FSNClass.innerHTML="FSN Classification";

    mytr.appendChild(th_1);    
    mytr.appendChild(th_2);  
    mytr.appendChild(th_3);  
    mytr.appendChild(th_4);  
    mytr.appendChild(th_FSNClass);  

    myTable.appendChild(mytr);   

     let len=data.length;
     
     for (let i=0;i<len;i++){
        let mytr=document.createElement("tr"); 

        let td_1_val=document.createElement("td"); 
        let td_2_val=document.createElement("td");     
        let td_3_val=document.createElement("td");    
        let td_4_val=document.createElement("td");       
        let td_FSNClass_val=document.createElement("td");  

        td_1_val.innerHTML=data[i][Object.keys(data[i])[0]]; 
        td_2_val.innerHTML=data[i][Object.keys(data[i])[1]].toFixed(2); 
        td_3_val.innerHTML=data[i][Object.keys(data[i])[2]].toFixed(2); 
        td_4_val.innerHTML=data[i][Object.keys(data[i])[3]].toFixed(2); 
        td_FSNClass_val.innerHTML=data[i][Object.keys(data[i])[4]];   

        mytr.appendChild(td_1_val);    
        mytr.appendChild(td_2_val);  
        mytr.appendChild(td_3_val);  
        mytr.appendChild(td_4_val);  
        mytr.appendChild(td_FSNClass_val);  
        
        
        myTable.appendChild(mytr);   
      
     }
     parentNode.appendChild(myTable);
}

function createSummaryTable(parentNode,data){

    let myTable = document.createElement("table");   
   
     //create header
    let mytr = document.createElement("tr");  
    let th_1=document.createElement("th"); 
    let th_2=document.createElement("th");     
    let th_3=document.createElement("th");    
    
    let th_FSNClass=document.createElement("th");        
    th_1.innerHTML="Product Name";
    th_2.innerHTML="FSN (Consumption Rate)";
    th_3.innerHTML="FSN (Average Stay)";

    th_FSNClass.innerHTML="Final FSN Classification";

    mytr.appendChild(th_1);    
    mytr.appendChild(th_2);  
    mytr.appendChild(th_3);  

    mytr.appendChild(th_FSNClass);  

    myTable.appendChild(mytr);   

     let len=data.length;
     
     for (let i=0;i<len;i++){
        let mytr=document.createElement("tr"); 

        let td_1_val=document.createElement("td"); 
        let td_2_val=document.createElement("td");     
        let td_3_val=document.createElement("td");    
      
        let td_FSNClass_val=document.createElement("td");  

        td_1_val.innerHTML=data[i].ProductName; 
        td_2_val.innerHTML=data[i].aveConsumpClass; 
        td_3_val.innerHTML=data[i].aveStayClass; 
        td_FSNClass_val.innerHTML=data[i].ClassFinal;   

        mytr.appendChild(td_1_val);    
        mytr.appendChild(td_2_val);  
        mytr.appendChild(td_3_val);  
        mytr.appendChild(td_FSNClass_val);  
        
        
        myTable.appendChild(mytr);   
      
     }
     parentNode.appendChild(myTable);
}


function aveStayClassification(averageStay){
    let result;
    switch(true){
        case(averageStay<=70):
            result="N";
            break;
        case(averageStay>70 && averageStay<=90 ):
            result="S";
            break;   
        case(averageStay>90):
            result="F";
            break;  
        default:
            result=  "ERROR"   ;
            break;                              
    }
    return result;
}

//FSN AVERAGE STAY

function aveConsumpClassification(aveConsmpRate){
    let result;
    switch(true){
        case(aveConsmpRate<=70):
            result="F";
            break;
        case(aveConsmpRate>70 && aveConsmpRate<=90 ):
            result="S";
            break;   
        case(aveConsmpRate>90):
            result="N";
            break;  
        default:
            result=  "ERROR"   ;
            break;                              
    }
    return result;
}

//get the final classification
function FinalClassification(AveStay,ConsumptionRate){
    let comb=ConsumptionRate+AveStay;
    let result;
    switch(comb){
       case "FF":
        result= "F";
        break;
        case "FS":
            result=  "F";
            break;           
        case "FN":
            result=  "S";
            break;
        case "SF":
            result=  "S";
            break;
        case "SS":
            result=  "S";
            break;
        case "SN":
            result=  "N"  ; 
            break;
        case "NF":
            result=  "S";
            break;
        case "NS":
            result=  "N";
            break;
        case "NN":
            result=  "N"  ;
            break;
        default:
            result=  "ERROR"   ;
            break;
        }

        return result;
}
//create table for the class FSN
function createFSNTable(arr,ulID){

    let olTable=document.getElementById(ulID);
    //if(arr.length>0){//if the array is not empty put the title
        //let h4_classFinal = document.createElement('h4');//create h4 tag    
        //h4_classFinal.textContent=ClassFinal;//put value to the h4 tag
        //olTable.appendChild(h4_classFinal);//append it to the ol tag
    //}
    //loop thru the array to product name
    arr.forEach(element=>{
        let li = document.createElement('li');//create li tag for product name 
        let span_1=   document.createElement('span');  
        //let span_2=   document.createElement('span');

        span_1.textContent=element.ProductName;//put the value
        //span_2.textContent="See Details";//put the value     
        
        //span_2.style="display:inline-block;text-align: center;width: 10%;border-radius: 10px;background-color: burlywood;margin-top:2px;margin-left:5px";
        //span_2.className="btnDetails"

        li.appendChild(span_1);//append the li tag to ol tag  
        //li.appendChild(span_2);//append the li tag to ol tag  
        olTable.appendChild(li);//append the li tag to ol tag             
    })
}

function createdoughnutGraph(canvasID,chartTile,labelArr,ValArr,colorArr){
           
    var ctx = document.getElementById(canvasID).getContext('2d'); //'myChartConsumptionRate'
    var height=50;
    var width=50;
    ctx.width = height;
    ctx.height = width;

      let myChart =  new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: labelArr,
              datasets: [
                {
                  backgroundColor: colorArr,
                  data: ValArr
                }
              ]
            },
            options: {
              title: {
                display: true,
                text: chartTile
              }
            }
        });      
    
    return myChart;

}


//create grpah

function createBarGraph(canvasID,labelArr,dataArr,labelStr){
           
    var ctx_1 = document.getElementById(canvasID).getContext('2d'); //'myChartConsumptionRate'
    ctx_1.canvas.width = 100;
    ctx_1.canvas.height = 100;
        var myChart = new Chart(ctx_1, {
            type: 'horizontalBar',
            data: {
            labels: labelArr,//product name
            datasets: [{
            label: labelStr,//`Consumption Rate from ${"<?php echo $startDate_sql; ?>"} to ${"<?php echo $endDate_sql; ?>"} `,
            data:dataArr,//average stay value
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                'rgba(255, 159, 64)'
            ],
            borderColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                'rgba(255, 159, 64)'
            ],
            borderWidth: 1
            },
            ]
            },
    });


    return myChart;

}

function createLineGraph(canvasID,labelArr,dataArr_Reor,dataArr_Cur){
           
    var ctx_1 = document.getElementById(canvasID).getContext('2d'); //'myChartConsumptionRate'
    ctx_1.width = 100;
    ctx_1.height = 100;
        var myChart = new Chart(ctx_1, {
            type: 'line',
            data: {
            labels: labelArr,//product name
            datasets: [{
            label: "REORDER LEVEL",//`Consumption Rate from ${"<?php echo $startDate_sql; ?>"} to ${"<?php echo $endDate_sql; ?>"} `,
            data:dataArr_Reor,//average stay value
            fill:false,
            showLine:true,
            backgroundColor: ['rgba(54, 162, 235)'],
            borderColor: [
                'rgba(54, 162, 235)',
            ],
            borderWidth: 1
            },
            {
                label: "CURRENT COUNT",//`Consumption Rate from ${"<?php echo $startDate_sql; ?>"} to ${"<?php echo $endDate_sql; ?>"} `,
                data:dataArr_Cur,//average stay value
                fill:false,
                showLine:true,
                backgroundColor: [
                    'rgba(255, 99, 132)',
                ],
                borderColor: [
                    'rgba(255, 99, 132)',
                ],
                borderWidth: 1
                }           
            ]
            },
            borderWidth:3,
    });


    return myChart;

}






