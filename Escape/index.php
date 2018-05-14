<?php
if(!(isset($_SESSION))){
	session_start();
}

$conn = mysqli_connect('localhost', 'root', 'mysql') or die ("Error, Unable to access SQL!");
mysqli_select_db($conn, 'DatabaseOne') or die("Error, Unable to access DATABASE!!!");


// ***### This portion of code is used to create members accounts ###***

if(isset($_POST['signupSubmit'])){
	header("Refresh: 4; url=index.php#login", true, 303);

	$firstName = $_POST['firstName'];
	$firstName = stripslashes($firstName); //security procedure (Probably not needed);
	$firstName = mysqli_real_escape_string($conn, $firstName); //Security Procedure
	

	$lastName = $_POST['lastName']; 
	$lastName = stripslashes($lastName); 
	$lastName = mysqli_real_escape_string($conn, $lastName); 

    $nameArr = array($firstName, $lastName); 	
	$newName = substr($nameArr, 0, 1);
	
		
	$userName = $_POST['userName'];
	$userName = stripslashes($lastName); 
	$userName = mysqli_real_escape_string($conn, $userName); 

	$userPass = $_POST['userPass'];
	$userPass = mysqli_real_escape_string($conn, $userPass);
	$hashedPass = password_hash($userPass, PASSWORD_DEFAULT);

	$query = "INSERT INTO members (firstName, lastName, user, pswd) ";
	$query .="VALUES ('$firstName', '$lastName', '$userName', '$hashedPass')";
	mysqli_query($conn, $query);

if(mysqli_affected_rows($conn) == 1){
	header("Refresh: 4; url=index.php#login", true, 303);
	$msg = "I think it worked...";
}
else{
	//$msg = "I dont think it worked...";
}
}

// ***### This portion of code is used to verify/grant access to current members ###***

	if(isset($_POST['loginSubmit'])){

	$user = $_POST['userLogin'];
	$user = stripslashes($user); //security procedure (Probably not needed);
	$user = mysqli_real_escape_string($conn, $user); //Security procedure

	$pass = $_POST['passwordLogin'];

	$query = "SELECT * FROM members WHERE user = '$user'";
    $results =	mysqli_query($conn, $query);

	$row = mysqli_fetch_array($results);

	if(mysqli_num_rows($results) == 1){

		if(password_verify($pass, $row['pswd'])){

		
		$msg = "<span style='color:green; font-weight:bold;'>Initializing Successful Access.</span>";
		header("Refresh: 5; url=welcomepage.php", true, 303);

		}
		else{
			$msg = "<h1>Incorrect Password</h1>";
	}

	}
	else{
		$msg = "<h1>Incorrect Username</h1>";
	}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Initiative Z-OE45-29C</title>
<meta charset="UTF-8">
<meta name="keywords" content=""/>
<link href="css/style.css" rel="stylesheet"/>
<link href-https://fonts.googleapis.com.css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
<style>
</style>
</head>

<body>
<div id="messagePrompts">$msg</div>
<div class="form" id="mainForm">
	<ul class='tab-group'>
		<li class='tab active'><a href='#signup' id='signupButton'onclick='highlightSignup()'>Setup</a><li>
		<li class='tab'><a href='#login' id='loginButton' onclick='highlightLogin()'>Log In</a></li>
	</ul>
	<div class='tab-content'>
		<div id='signUp'>
		<h1></h1>

		<form method="POST"  action="" id="mainform">
	<div class='top-row'>
		<img src="images/logo.png" class="OEpic"/></br></br>
		<div class='field-wrap'>
			<input type='text' name='firstName' id='firstName' class='required' placeholder='First Name'required autocomplete='off'/>
		</div>
		
		<div class='field-wrap'>
			<input type="text" name='lastName' id='lastName' placeholder='Last Name' required autocomplete='off'/>
		</div>
	</div>


	<div class='field-wrap'>
		<input type='password' name='userPass' placeholder='Password' id='userPass' required />
	</div>
	</br></br>
	<button  type='submit' id='signupSubmit' name='signupSubmit' class='button button-block'>
			<span style='color: red;'>-</span>MERGE<span style='color: red;'>-</button>
</form>

</div>

<div id="login">
<h1><?php echo $newName ?></h1>
	<p>	
	<form method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<img src="images/logo.png" class="OEpic"/></br></br>
		<div class='field-wrap'>
			<input type='text' name='userLogin' id='userLogin' class='required' required autocomplete='off' placeholder="New ID:      (example: RS-37)"/>
		</div>


		<div class='field-wrap'>
			<input type='password' name='passwordLogin' id='passwordLogin' class='required' required autocomplete='off' placeholder="Password *" />
		</div>
		<p class='forgot'><a href='#'>Forgot Password?</a></p>

		</br></br>  <!-- had to be done because my height changes to form completely altered outlook for some reason. -->

		<button type='submit' class='button button-block' id='loginSubmit' name='loginSubmit'/>⦕ ⦖</button>
	</div>
</div>

	</form>



<script src='js/scripts.js'>
	
}

</script>
</body>
</html>







