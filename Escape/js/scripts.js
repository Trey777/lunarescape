			
	const signUpDiv = document.getElementById('signUpDiv');
	const logInDiv = document.getElementById('logInDiv');
	const signUp = document.getElementById('signUp');
	const login = document.getElementById('login');

function signUpFunction(){

	signUp.style.display='block';
	login.style.display='none';

}
function loginFunction(){
	login.style.display ='initial';
	signUp.style.display='none';

}
