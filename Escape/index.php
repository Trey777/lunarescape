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
<div class="form">
	<ul class='tab-group'>
		<li class='tab active'><a href='#signup'>Sign Up</a><li>
		<li class='tab'><a href='#login'>Log In</a></li>
	</ul>
	<div class='tab-content'>
		<div id='signup'>
		<h1>Sign Up for Free</h1>

<form method="post"  action="mainpage.php" id="mainform">
	<div class='top-row'>
		<div class='field-wrap'>
			<label>
				First Name<span class="req">*</span>
			</label>
			<input type='text' name='firstName' id='firstName' required autocomplete='off'/>
		</div>
		
		<div class='field-wrap'>
			<label>
				Last Name<span class="req">*</span>
			</label>
			<input type="text" name='lastName' id='lastName' required autocomplete='off'/>
		</div>
	</div>

	<div class='field-wrap'>
		<label>
			Email Address<span class="req">*</span>
		</label>
		<input type='email' name='email' id='email' required autocomplete='off'/>
	</div>

	<div class='field-wrap'>
		<label>
			Set A Password<span class="req">*</span>
		</label>
		<input type='password' name='password' id='password' required />
	</div>
	
	<button type='submit' class='button button-block'/>Get Started</button>
</form>
</div>

<div id="login">
	<h1>Welcome Back!</h1>
	<form method='POST' action="#">
		
		<div class='field-wrap'>
			<label>
				Email Address<span class="req">*</span>
			</label>
			<input type='email' name='emailLogin' id='emailLogin' required autocomplete='off'/>
		</div>

		<div class='field-wrap'>
			<label>
				Password<span class="req">*</span>
			</label>
			<input type='password' name='passwordLogin' id='passwordLogin' required autocomplete='off' />
		</div>
		<p class='forgot'><a href='#'>Forgot Password?</a></p>

		<button class='button button-block'/>Log In</button>
	</div>
</div>

	</form>

<script src='js/scripts.js'>
</script>
</body>
</html>







