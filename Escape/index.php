<?php
if(!(isset($_SESSION))){
	session_start();
}

$conn = mysqli_connect('localhost', 'root', 'mysql') or die ("Error, Unable to access SQL!");
mysqli_select_db($conn, 'DatabaseOne') or die("Error, Unable to access DATABASE!!!");



if(isset($_POST['signupSubmit'])){



$firstName = $_POST['firstName'];
$firstName = mysqli_real_escape_string($conn, $firstName);
$firstName = stripslashes($firstName);


$lastName = $_POST['lastName'];
$lastName = mysqli_real_escape_string($conn, $lastName);
$lastName = stripslashes($lastName);


$userName = $_POST['userName'];
$userName = mysqli_real_escape_string($conn, $userName);


$userPass = $_POST['userPass'];
$userPass = mysqli_real_escape_string($conn, $userPass);
$hashedPass = password_hash($userPass, PASSWORD_DEFAULT);

$query = "INSERT INTO members (firstName, lastName, user, pswd) ";
$query .="VALUES ('$firstName', '$lastName', '$userName', '$hashedPass')";
mysqli_query($conn, $query);

if(mysqli_affected_rows($conn) == 1){
	$msg = "I think it worked";
}
else{
	$msg = "I dont think it worked";
}
}


if(isset($POST_['loginSubmit'])){
	$user = $_POST['userLogin'];
	$pass = $_POST['passwordLogin'];

	$query = "SELECT * FROM members WHERE user = '$user'";
    $results =	mysqli_query($conn, $query);

	$row = mysqli_fetch_array($results);

	if(mysqli_num_rows($results) == 1){

		
		$msg = "Initializing Successful Access.";
		header("Refresh: 5; url=welcompage.php", true, 303);
	}
	else{
		$msg = "Incorrect Credentials.";
	}

}
else {
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Lunar Escape</title>
<meta charset="UTF-8">
<meta name="keywords" content=""/>
<link href="css/style.css" rel="stylesheet"/>
<link href-https://fonts.googleapis.com.css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
<style>
</style>
</head>

<body>
<div id="errorBox"><span style='color:red'><?php echo $msg ?></span></div>
<div class="form">
	<ul class='tab-group'>
		<li class='tab active'><a href='#signup' onclick='signUpFunction()'>Sign Up</a><li>
		<li class='tab'><a href='#login' onclick='loginFunction()'>Log In</a></li>
	</ul>
	<div class='tab-content'>
		<div id='signUp'>
		<h1>Sign Up for Free</h1>

		<form method="POST"  action="" id="mainform">
	<div class='top-row'>
		<div class='field-wrap'>
			<input type='text' name='firstName' id='firstName' placeholder='First Name'required autocomplete='off'/>
		</div>
		
		<div class='field-wrap'>
			<input type="text" name='lastName' id='lastName' placeholder='Last Name' required autocomplete='off'/>
		</div>
	</div>

	<div class='field-wrap'>
		<input type='text' name='userName' id='userName' placeholder='Username'required autocomplete='off'/>
	</div>

	<div class='field-wrap'>
		<input type='password' name='userPass' placeholder='Password' id='userPass' required />
	</div>
	
	<input type='submit' id='signupSubmit' name='signupSubmit' class='button button-block'/></button>
</form>
</div>

<div id="login">
	<h1>Welcome Back!</h1>
	<form method='POST' action="">
		
		<div class='field-wrap'>
			<input type='text' name='userLogin' id='userLogin' required autocomplete='off' placeholder="Username *"/>
		</div>

		<div class='field-wrap'>
			<input type='password' name='passwordLogin' id='passwordLogin' required autocomplete='off' placeholder="Password *" />
		</div>
		<p class='forgot'><a href='#'>Forgot Password?</a></p>

		<input type='submit' class='button button-block' id='loginSubmit'/></button>
	</div>
</div>

	</form>
<div id="test"></div>
<script src='js/scripts.js'>
</script>
</body>
</html>







