
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

function createSummaryTable(data,tableID){

    let myTable = document.getElementById(tableID);   
    //myTable.setAttribute("id", "FSNTable");  

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
     console.log(len);
     
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
        
        console.log(data[i].ProductName);
        myTable.appendChild(mytr);   
      
     }
     //parentNode.appendChild(myTable);
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
