const formP = document.querySelector('#perfilForm');
const email = document.querySelector('#emailBox');

formP.addEventListener('submit',(e) => {
	let mail = email.value;
	expresion =/\w+@+\w+\.+[a-z]/;
	for (var i = 0; i<mail.length; i++) {
		console.log(mail[i]);
		if (mail[i] === " ") {
			alert("ERROR! El correo introducido no es valido. Por favor intentelo de nuevo.");
			e.preventDefault();
			return;
		}
	}
	if(!expresion.test(mail)){
		alert("ERROR! El correo introducido no es valido. Por favor intentelo de nuevo.");
		e.preventDefault();
	}
});