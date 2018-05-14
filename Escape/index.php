<?php
if(!(isset($_SESSION))){
	session_start();
}

$conn = mysqli_connect('localhost', 'root', 'mysql') or die ("Error, Unable to access SQL!");
mysqli_select_db($conn, 'DatabaseOne') or die("Error, Unable to access DATABASE!!!");


// ***### This portion of code is used to create members accounts ###***

if(isset($_POST['signupSubmit'])){

	//Count input firstName characters length/Isolate first character/Capitalize	
	$firstName = $_POST['firstName'];
	$firstName = stripslashes($firstName); //security procedure (Probably not needed);
	$firstName = mysqli_real_escape_string($conn, $firstName); //Security Procedure
	$firstLen = strlen($firstName);
	$firstCharFN = substr($firstName, 0, 1);
	$capFirst = ucfirst($firstCharFN);
	
	//Count input lastName characters length/Isolate first character/Capitalize	
	$lastName = $_POST['lastName']; 
	$lastName = stripslashes($lastName); 
	$lastName = mysqli_real_escape_string($conn, $lastName); 
	$lastLen = strlen($lastName);
	$firstCharLN = substr($lastName, 0, 1);
	$capLast = ucfirst($firstCharLN);

 	$newName = $capLast."-".$capFirst.$firstLen.$lastLen;
		
	$userName = $_POST['userName'];
	$userName = stripslashes($lastName); 
	$userName = mysqli_real_escape_string($conn, $userName); 

	$userPass = $_POST['userPass'];
	$userPass = mysqli_real_escape_string($conn, $userPass);
	$hashedPass = password_hash($userPass, PASSWORD_DEFAULT);

	$query = "INSERT INTO members (firstName, lastName, user, pswd, newName) ";
	$query .="VALUES ('$firstName', '$lastName', '$userName', '$hashedPass', '$newName')";
	mysqli_query($conn, $query);

if(mysqli_affected_rows($conn) == 1){
    $msg="<span style='color: lime;'>Your ghostID/chipID is  </span><span style='color: yellow; text-decoration: underline;'>$newName</span><span style='color: lime;'>.</span>";
	//$msg = "I think it worked...";
}
else{
	//$msg = "I dont think it worked...";
}
}

// ***### This portion of code is used to verify/grant access to current members ###***

	if(isset($_POST['loginSubmit'])){

	$newForm = $_POST['newForm'];
	$newForm = stripslashes($newForm); //security procedure (Probably not needed);
	$newForm = mysqli_real_escape_string($conn, $newForm); //Security procedure

	$pass = $_POST['passwordLogin'];

	$query = "SELECT * FROM members WHERE newName = '$newForm'";
    $results =	mysqli_query($conn, $query);

	$row = mysqli_fetch_array($results);

	if(mysqli_num_rows($results) == 1){

		if(password_verify($pass, $row['pswd'])){

		$msg = "Initializing...<br>Please do not wear headphones/helmets or any equipment that could disrupt signal to your chip. Verifying your connection prior to your ghost transfer.";
		header("Refresh: 8; url=satconf.php", true, 303);

		}
		else{
		$msg = "-- Incorrect Password --";
    }


	}
	else{
        $msg = "-- Incorrect ID/Name --";
		
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
<link href-https://fonts.googleapis.com.css?family=Titillium+Web:400,300,600 rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Orbitron" rel="stylesheet">

<style>
</style>
</head>

<body>
    
<div id="aWish"><a href=phpage.html>.</a></div>
<div class="form" id="mainForm">
	<ul class='tab-group'>
		<li class='tab active'><a href='#signup' id='signupButton'onclick='highlightSignup()'>Setup</a><li>
		<li class='tab'><a href='#login' id='loginButton' onclick='highlightLogin()'>Log In</a></li>
	</ul>
	<div class='tab-content'>
		<div id='signUp'>
		<h1></h1>

            <!-- ########################## -->           
            <!-- #####***SIGNUP FORM***#### -->
            <!-- ########################## -->
		<form method="POST"  action="<?php echo $_SERVER['PHP-SELF'] ?>" id="mainform">
	<div class='top-row'>
		<img src="images/logo.png" class="OEpic"/><br><br><br>
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
            <br><br>
	<button  type='submit' id='signupSubmit' name='signupSubmit' class='button button-block'>
        <span class='bigRed'>⦕</span>MERGE<span class='bigRed'>⦖</span></button>
            	<br><br>

</form>

</div>

<div id="login">
<h1></h1>
        
            <!-- ########################## -->           
            <!-- #####***LOGIN FORM***#### -->
            <!-- ########################## -->

	<form method='POST' action="<?php echo $_SERVER['PHP-SELF'] ?>">
		<img src="images/logo.png" class="OEpic"/><br><br>
		<div class='field-wrap'>
			<input type='text' name='newForm' id='userLogin' class='required' required autocomplete='off' placeholder="ChipID:"/>
		</div>


		<div class='field-wrap'>
			<input type='password' name='passwordLogin' id='passwordLogin' class='required' required autocomplete='off' placeholder="Password: " />
		</div>
		<p class='forgot'><a href='https://www.amazon.com/Business-Notebook-3-5-Inch-Refillable-Calculator/dp/B071V7Q6WB/ref=sr_1_9?ie=UTF8&qid=1526291350&sr=8-9&keywords=pen+with+notepad'>Forgot Password?</a></p>

		<br><br>  <!-- had to be done because my height changes to form completely altered outlook for some reason. -->

		<button type='submit' class='button button-block' id='loginSubmit' name='loginSubmit'>
            <span class='bigRed'>⦕</span> ESCAPE <span class='bigRed'>⦖</span></button>
    
		<div class='field-wrap'>
	<div id="messagePrompts"><?php echo $msg ?></div>
</div>
        
	</form>
        </div>
    </div>
    </div>
<script src='js/scripts.js'>
	


</script>
</body>
</html>







