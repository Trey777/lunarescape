<?php
//header("Refresh:17; url=welcomepage.php", true,303);
?>

<!DOCTYPE html>
<html lang="eng">

<head>
	<title>Remote Confirmation</title>
	<meta charset="UTF-8">
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<style>
#myVideo {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%;
    min-height: 100%;
}
#dataPull{
	border: 2pt solid yellow;
	z-index: 300000;
	width: 500px;
	height: 600px;
	position: relative;
}
#dataPull:before{
	position: absolute;
}
</style>
</head>
<body>
<div id="dataPull">


<video autoplay muted loop id="myVideo">
  <source src="videos/typer.mp4" type="video/mp4">
</video>
</div>

</body>
</html>
