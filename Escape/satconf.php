<!DOCTYPE html>
<html lang="eng">

	<head>
		<title>ViewPort #11</title>
		<meta charset="UTF-8">
		<meta name="keywords" content=""/>
		<meta name="description" content=""/>
		<link rel="stylesheet" href="css/meetingRoom.css"/>
	</head>
	<body id="myBody">
		<div id="computerMonitor"> <!-- Everything but the audio -->

			<div id="coverDiv"><!--The Blue haze on very top-->
				<div class="cameraFeed" id="camFeedOne"></div>
				<div class="cameraFeed" id="camFeedTwo"></div>
				<div class="cameraFeed" id="camFeedThree"></div>
				<div class="cameraFeed" id="camFeedFour"></div>
			</div>
			<!--Energy Ball Image-->
			<img src="images/energyBall.gif"  height="40" id="energyBall" draggable="true" alt="Energy Ball" ondragstart="onDragStart()">
			<!--Orb Input (Awaiting) -->
			<div id="awaitingContainer" ondrop="onDrop()" ondragover="onDragOver()">
				<img src="images/orbAwaiting.gif" alt="Orb Home" height="100" id="theOrbHome">
			</div>
			<div id="motionFrame"></div><!-- hidden at start -->
			<div id="freezeFrame"></div><!-- hidden after powerButton is activated -->

			<!--Power Button-->
			<img src="images/switchClear.png" id="powerButtonRed" onclick='lightSwitch("off")' alt="powerButtonRed">
			<img src="images/switchClear.png" id="powerButtonBlue" onclick='lightSwitch("on")' alt="powerButtonBlue">
			<div id="bottomTray">

				<!--Directional arrows and red/green power light-->
				<img src="images/leftArrow.png" alt="leftButton" id="leftArrow" class="computerButtons" onclick="clickSound()">	
				<img src="images/rightArrow.png" alt="rightButton" id="rightArrow" class="computerButtons" onclick="clickSound()">	
				<div id="enabledLight" class="computerButtons"></div>
			</div>
		</div>
		<!-- Computer app audio -->
		<audio src="audio/MonitorOnAudio.wav" type="audio/wave" id="monitorOnAudio"></audio>
		<audio src="audio/MonitorOffAudio.wav" type="audio/wave"  id="monitorOffAudio"></audio>


		<script src="js/meetingRoom.js"></script>
		<script src="js/Classes/PotatoPower.js"></script>
		<script charset="utf-8">
			const potatoPower = new PotatoPower("littleInventory");

		</script>
	</body>
</html>
