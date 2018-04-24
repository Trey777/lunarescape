<!DOCTYPE html>
<html lang="en">

<head>
<title>Lunar Escape</title>
<meta charset="UTF-8">
<meta name="keywords" content=""/>
<link href="css/style.css" rel="stylesheet"/>
<style>
    input{
    margin-top: 10px;
    width: 80px;
}

h3{

font-family: sans-serif;
color: white;
}
</style>
<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

</head>

<body>
    <div id="fontLine" onclick="mainLine()"><div id="mainText">Orbital Escape</div>
    <div id="loginForm">
    <form method="post"  action="memberLogin.php">
        <h3>Members Login</h3>
        <input type="text" name"userName" id="userName" placeholder="UserName">
        <input type="password" name="userPassword" id="userPassword" placeholder="Password">
        <input type="submit" name="submitButton" value="Log in"/>
    </form>
    <h3>If you do not have an account, click here</h3>
   </div>
<script type="text/javascript" src="js/scripts.js">
</body>
</html>
