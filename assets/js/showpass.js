const togglePassword = 
    document.querySelector('#togglePassword'); 
    const password = document.querySelector('#password');
  
togglePassword.addEventListener('click', function (e) {
  
	// Toggle the type attribute
	const type = password.getAttribute(
	'type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
  
    // Toggle the eye slash icon
    if (togglePassword.src.match( base_url + "assets/img/icons/eye-close.png")) {
        togglePassword.src = base_url + "assets/img/icons/eye-open.png";
        } else {
            togglePassword.src = base_url + "assets/img/icons/eye-close.png";
        }
});

const togglePassword1 = 
    document.querySelector('#togglePassword1'); 
    const password1 = document.querySelector('#password1');
  
togglePassword1.addEventListener('click', function (e) {
  
	// Toggle the type attribute
	const type = password1.getAttribute(
	'type') === 'password' ? 'text' : 'password';
    password1.setAttribute('type', type);
  
    // Toggle the eye slash icon
    if (togglePassword1.src.match( base_url + "assets/img/icons/eye-close.png")) {
        togglePassword1.src = base_url + "assets/img/icons/eye-open.png";
        } else {
            togglePassword1.src = base_url + "assets/img/icons/eye-close.png";
        }
});