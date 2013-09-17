/******************************************************************************************
 * sliders.js
 *
 * CSCI-E52 Final Project, 2012
 * Anna Ntenta
 * anna.e.mckelvey@gmail.com
 *
 * Generates HTML for input sliders and submit button (appearing once an address is submitted.) 
 * 
 * Sources:
 * http://www.developerdrive.com/2012/07/creating-a-slider-control-with-the-html5-range-input/
 ********************************************************************************************/

function addSlider(){
    // variable for HTML slider
    var sliderParking = "Parking: 1 " + "<input id='slide'"+"type='range'"+ "name='parking'"+
    "min='1'"+ "max='100'"+ "step='1'"+"value='50'"+"title='How easy is it to park here?'"+
    "onchange='updateParking(this.value)'<\/input>"+" 100"+ 
    "<b>&nbsp;&nbsp;</b>"+"<b "+"id='parking_chosen'>50</b>";
    // displays HTML upon submission
    document.getElementById("slider1").innerHTML = sliderParking;
    
    var sliderTransit = "Transit:&nbsp 1 " + "<input id='slide'"+"type='range'"+ "name='transportation'" +
    "min='1'"+ "max='100'"+ "step='1'"+"value='50'"+"title='Availability of public transport nearby?'"+
    "onchange='updateTransit(this.value)'<\/input>"+" 100"+ 
    "<b>&nbsp;&nbsp;</b>"+"<b "+"id='transit_chosen'>50</b></br>";
    document.getElementById("slider2").innerHTML = sliderTransit;
    
    var sliderDining = "Dining: &nbsp  1 " + "<input id='slide'"+"type='range'"+ "name='dining'" +
    "min='1'"+ "max='100'"+ "step='1'"+"value='50'"+"title='Are there dining options nearby?'"+
    "onchange='updateDining(this.value)'<\/input>"+" 100"+ 
    "<b>&nbsp;&nbsp;</b>"+"<b "+"id='dining_chosen'>50</b>";
    document.getElementById("slider3").innerHTML = sliderDining;

    var sliderDrinks = "Social:&nbsp&nbsp  1 " + "<input id='slide'"+"type='range'"+ "name='social'" +
    "min='1'"+ "max='100'"+ "step='1'"+"value='50'"+"title='Availability of cafes, bars, clubs?'"+
    "onchange='updateDrinks(this.value)'<\/input>"+" 100"+ 
    "<b>&nbsp;&nbsp;</b>"+"<b "+"id='drinks_chosen'>50</b>";
    document.getElementById("slider4").innerHTML = sliderDrinks;

    var sliderFamily = "Family:&nbsp&nbsp 1 " + "<input id='slide'"+"type='range'"+ "name='family'"+
    "min='1'"+ "max='100'"+ "step='1'"+"value='50'"+"title='Is it family friendly?'"+
    "onchange='updateFamily(this.value)'<\/input>"+" 100"+ 
    "<b>&nbsp;&nbsp;</b>"+"<b "+"id='family_chosen'>50</b>";
    document.getElementById("slider5").innerHTML = sliderFamily;

    var sliderGrocer= "Grocer:&nbsp&nbsp1 " + "<input id='slide'"+"type='range'"+ "name='shopping'"+
    "min='1'"+ "max='100'"+ "step='1'"+"value='50'"+"title='Is there a grocery nearby?'"+
    "onchange='updateGrocer(this.value)'<\/input>"+" 100"+ 
    "<b>&nbsp;&nbsp;</b>"+"<b "+"id='grocer_chosen'>50</b>";
    document.getElementById("slider6").innerHTML = sliderGrocer;
    
    var sliderRecreation= "Health:&nbsp&nbsp 1 " + "<input id='slide'"+"type='range'"+ "name='recreation'"+
    "min='1'"+ "max='100'"+ "step='1'"+"value='50'"+"title='Parks, sports facilities, nature nearby?'"+
    "onchange='updateRecreation(this.value)'<\/input>"+" 100"+ 
    "<b>&nbsp;&nbsp;</b>"+"<b "+"id='recreation_chosen'>50</b>";
    document.getElementById("slider7").innerHTML = sliderRecreation;

    var sliderCulture= "Culture:&nbsp&nbsp1 " + "<input type='range' id='slide'"+ "name='culture'"+
    "min='1'"+ "max='100'"+ "step='1'"+"value='50'"+"title='Music venues, museums, libraries nearby?'"+
    "name='culture' onchange='updateCulture(this.value)'<\/input>"+" 100"+ 
    "<b>&nbsp;&nbsp;</b>"+"<b "+"id='culture_chosen'>50</b>";
    document.getElementById("slider8").innerHTML = sliderCulture;
    
    
    var submitBtn = "<button type='submit' class='btn'>Rate this address</button>";
    document.getElementById("submit_btn").innerHTML = submitBtn;
}

// Updates the "chosen value" displays as the user slides thumb up or down. 

function updateParking(slideAmount){
    //gets value provided by user 
    var display = document.getElementById("parking_chosen");
    //shows value
    display.innerHTML=slideAmount;
}

function updateTransit(slideAmount){
    var display = document.getElementById("transit_chosen");
    display.innerHTML=slideAmount;
}

function updateDining(slideAmount){
    var display = document.getElementById("dining_chosen");
    display.innerHTML=slideAmount;
}

function updateDrinks(slideAmount){
    var display = document.getElementById("drinks_chosen");
    display.innerHTML=slideAmount;
}

function updateFamily(slideAmount){
    var display = document.getElementById("family_chosen");
    display.innerHTML=slideAmount;
}

function updateGrocer(slideAmount){
    var display = document.getElementById("grocer_chosen");
    display.innerHTML=slideAmount;
}

function updateRecreation(slideAmount){
    var display = document.getElementById("recreation_chosen");
    display.innerHTML=slideAmount;
}

function updateCulture(slideAmount){
    var display = document.getElementById("culture_chosen");
    display.innerHTML=slideAmount;
}
