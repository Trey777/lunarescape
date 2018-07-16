//################## Dom Goblins ###########################
const myBody = document.getElementById("myBody");
const computerMonitor = document.getElementById("computerMonitor");
const computerButtons = document.getElementsByClassName("computerButtons");
const coverDiv = document.getElementById("coverDiv");
const leftDiv = document.getElementById("leftDiv");
const enabledLight = document.getElementById("enabledLight");
const powerButtonRed = document.getElementById("powerButtonRed");
const powerButtonBlue = document.getElementById("powerButtonBlue");
const freezeFrame = document.getElementById("freezeFrame");
const motionFrame = document.getElementById("motionFrame");
const monitorOnAudio = document.getElementById("monitorOnAudio");
const theOrbHome = document.getElementById("theOrbHome");
const monitorOffAudio = document.getElementById("monitorOffAudio");
const leftArrow = document.getElementById("leftArrow");
const rightArrow = document.getElementById("rightArrow");
const energyBall = document.getElementById("energyBall");
const awaitingContainer = document.getElementById("awaitingContainer");
const slidesLocation = motionFrame.style.backgroundImage;
//###############End Dom Goblins ###########################


leftArrow.addEventListener("click", scrollLeft);
rightArrow.addEventListener("click", scrollRight);


//# Little Manifestations  ###########################
const littleInventory = document.createElement("div");
computerMonitor.appendChild(littleInventory);
littleInventory.style.cssText = 'text-align: center;font-weight: bold;width: 75px;height: 300px;background-color: #000;position: absolute;top: 40px;border-radius: 8px;color: yellow; display: flex; flex-direction: column;';
littleInventory.id="littleInventory";

const inventoryH4 = document.createElement("h4");
inventoryH4.innerHTML = "Inventory";
inventoryH4.style.cssText = `text-align: center;`;
littleInventory.appendChild(inventoryH4);

//#Audio Setup
let buttonClick = new Audio("./audio/Click.wav");
let elementaryMD = new Audio("./audio/elementaryMD.wav");
let orbInstallSound = new Audio("./audio/orbInstallSound.wav");


//#Image Setup

var counter = 0; //Count array (camera/image) elements
var camNum = 0; //  maybe delete this now *********
const slideShowArr = []; //Array fed by JSON/AJAX 
slideShowArr.sort();

//######################CAMERA FEEDS#############################
//===============================================================
const camFeedOne = document.getElementById("camFeedOne");
const camFeedTwo = document.getElementById("camFeedTwo");
const camFeedThree = document.getElementById("camFeedThree");
const camFeedFour = document.getElementById("camFeedFour");

//===============================================================
//##################END CAMERA FEEDS#############################
//===============================================================

let cheapTimeout = Date.now() + 3000; //  Its a cheap timeout man! (⊙_◎)♥ 



function lightSwitch(toggle){ //What happens when power button is pressed (ON)
	if(event.target.id === "powerButtonRed"){

		coverDiv.style.display = "block"; // showing the blue tint while on 
		enabledLight.style.backgroundColor = "lime";
		enabledLight.style.boxShadow = "1px 1px 30px 8px lime";
		motionFrame.style.display = "block"; //enabling viewable Images
		freezeFrame.style.display = "none"; // disabling frozen/blank div
		powerButtonRed.style.display = "none";
		powerButtonBlue.style.display = "initial";
		computerMonitor.style.boxShadow = "0 0 49px 1px #333";
		monitorOffAudio.play();
	}
	else{  //What happens when power button is pressed (OFF)
		coverDiv.style.display = "none"; //disabling the blue tint while off
		enabledLight.style.backgroundColor = "crimson";
		enabledLight.style.boxShadow = "1px 1px 30px 8px crimson";
		motionFrame.style.display = "none"; //disabing viewable images
		freezeFrame.style.display = "block"; //enabing viewable images
		computerMonitor.style.boxShadow = "10px 5px 20px 20px #000";
		powerButtonRed.style.display  = "initial";
		powerButtonBlue.style.display  = "none";
		rightArrow.style.backgroundColor = "initial";
		leftArrow.style.backgroundColor = "initial";
		monitorOnAudio.play();	
	}


}

//----------------------------------------------------------------------------
//---------------------BEGINNING SCROLL IMAGES-----------------------------
//----------------------------------------------------------------------------

//#################### PROBLEM WITH PHANTOM PHOTOS ########################

function scrollLeft(){  //Scrolling left  !!!! THIS IS BROKEN SOMEHOW !!!!********* 

	if(counter === slideShowArr.length){
		counter = 0;
	}
	motionFrame.style.backgroundImage = `url("./images/scrollers/${slideShowArr[counter]}")`;
	camFeedOne.innerHTML = `camID:(#${counter})`;
	camFeedTwo.innerHTML = `camID:(#${counter}) `;
	camFeedThree.innerHTML = `camID:(#${counter}) `;
	camFeedFour.innerHTML = `camID:(#${counter}) `;
	counter = counter -1; //cycling backwards thru array....this is/may be related to pictures not cycling properly
	if(counter < 0) {
		counter = Math.floor(Math.random() * slideShowArr.length);//Forces a RANDOM cam-feed if attempts below 0!	
	}
}
//#################### PROBLEM WITH PHANTOM PHOTOS ########################

function scrollRight() {  //Scrolling right !!!! 
	if(counter === slideShowArr.length) {
		counter = 0; //works like a beaut
	}
	motionFrame.style.backgroundImage = `url( "./images/scrollers/${slideShowArr[counter]}")`;
	camFeedOne.innerHTML = `camID:(#${counter}) `;
	camFeedTwo.innerHTML = `camID:(#${counter}) `;
	camFeedThree.innerHTML = `camID:(#${counter}) `;
	camFeedFour.innerHTML = `camID:(#${counter})`;
	counter++;

}
//#################### PROBLEM WITH PHANTOM PHOTOS ########################

//----------------------------------------------------------------------------
//-----------------------ENDING  SCROLL IMAGES-----------------------------
//----------------------------------------------------------------------------

const xml = new XMLHttpRequest();  //  JSON & AJAX FEED
xml.onreadystatechange = function(){
	if(xml.readyState === 4 && xml.status === 200){
		let myData = JSON.parse(xml.responseText);
		for(let i=0;i<myData.length;i++){
			slideShowArr.push(myData[i].imgName);	
		}
	}
};
xml.open("GET", "js/scrollImages.json", true);
xml.send();


function clickSound(){ // left/right arrow click sound
	buttonClick.play(); 
}

function onDragStart(){ //orb movement
	event.dataTransfer.setData('text', event.target.id);
}

function onDrop() { //orb dropoff
	let orbID = event.dataTransfer.getData('text');
	awaitingContainer.appendChild(energyBall);
	myBody.style.backgroundImage = "url('./images/bodyArt.gif')";
	myBody.style.backgroundRepeat="no-repeat";
	myBody.style.backgroundSize = "cover";
	myBody.style.backgroundPosition = "center";
	computerMonitor.style.opacity = "0.9";
	orbInstallSound.play();
	elementaryMD.play();
	elementaryMD.loop = true;
	theOrbHome.style.boxShadow = "0 0  2px 3px purple";
	theOrbHome.src = "./images/orbContained.gif";

}

function onDragOver() {  
	event.preventDefault();
}

