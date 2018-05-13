			
	const signupButton = document.getElementById('signupButton');
	const loginButton = document.getElementById('loginButton');
	const signUp = document.getElementById('signUp');
	const login = document.getElementById('login');

function signUpFunction(){

	signUp.style.display='block';
	login.style.display='none';
	signupButton.style.backgroundColor='#2E2FB2';
	loginButton.style.backgroundColor='black';

}
function loginFunction(){
	login.style.display ='initial';
	signUp.style.display='none';
	loginButton.style.backgroundColor='#2E2FB2';
	signupButton.style.backgroundColor='black';

}


        $(document).ready(function(){
            $('#errorBox').fadeIn('slow', function(){
               $('#errorBox').delay(5000).fadeOut();
            });
        });

