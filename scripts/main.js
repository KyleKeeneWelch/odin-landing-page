function ResponsiveMenu() {	
    //Create a reference to the element that holds the myTopNav Id.
    var x = document.getElementById("myTopnav");	
    //If the reference has a classname of topnav.			
    if (x.className === "topnav") {		
        //Add the classname responsive.			
        x.className += " responsive";				
    } else {    //If the class name already has the responsive name added on, switch it back to topnav.	
        x.className = "topnav";
    }
}