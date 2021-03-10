
//THIS IS FRO REPORTS.PHP

const tabs=document.querySelector('.tabs');//get the ul tabs from Reports.php
const tabsChildren= tabs.children;//get all the children
const panels=document.querySelectorAll('.panel');//get all the panels with a classname of panel

tabs.addEventListener('click',function(e){//click the tab   
    if(e.target.tagName=='LI'){
        const targetpanel=document.querySelector(e.target.dataset.target);//get the target panel name of the clicked tab
        //add class to  panel           
        panels.forEach((panel)=>{
            if(panel==targetpanel){
                panel.classList.add('active');//add the active class to show the panel
    
            }else {
                panel.classList.remove('active');//other panel remove the class active to hide
                
            }
        })              
    }

    //this is to change the color of the tab
    selectTab(e.target);

    function selectTab(selectedTab){
        //color the selected tabs
        for (tab of tabsChildren){      
            if(tab==selectedTab){                           
                tab.classList.add('active');
            }              
        }        
          //remove the color the rest of the tabs
        let selectedIndex=Array.from(tabsChildren).indexOf(selectedTab);
        console.log(selectedIndex);
        for (let x=0;x<tabsChildren.length;x++){
            if(x!=selectedIndex){         
                tabsChildren[x].classList.remove('active');
        
            }
        }        
    }   
})

