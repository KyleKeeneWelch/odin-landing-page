function ResponsiveMenu() {	
    var x = document.getElementById("myTopnav");				//Create a reference to the element that holds the myTopNav Id.
    if (x.className === "topnav") {					//If the reference has a classname of topnav.
        x.className += " responsive";				//Add the classname responsive.
    } else {				//If the class name already has the responsive name added on, switch it back to topnav.
        x.className = "topnav";
    }
}