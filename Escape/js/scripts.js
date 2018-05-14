			
	const signupButton = document.getElementById('signupButton');
	const loginButton = document.getElementById('loginButton');
	const signUp = document.getElementById('signUp');
	const login = document.getElementById('login');
	const errorBox = document.getElementById('errorBox');

function highlightSignup(){

	signUp.style.display='block';
	login.style.display='none';
	signupButton.style.backgroundColor='#2E2FB2';
	loginButton.style.backgroundColor='black';

} // !!!NOTE!!! FIX LOGIN not being SELECTED on page start
function highlightLogin(){
	login.style.display ='initial';
	signUp.style.display='none';
	loginButton.style.backgroundColor='#2E2FB2';
	signupButton.style.backgroundColor='black';

}



// 		####!!!!SCRAPPED!!!!  WILL LOOK INTO MORE LATER
//
	// Jquery.  Just to get the fade effects to work properly
// 		with temporary div's / prompts.
//
//        function invalidPass(){
//            $('#errorBox').fadeIn('slow', function(){
//               $('#errorBox').delay(5000).fadeOut();
//            });
//			alert("poot!");
//			
 //       };

