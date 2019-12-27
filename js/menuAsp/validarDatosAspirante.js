const formP = document.querySelector('#perfilForm');
const email = document.querySelector('#emailBox');
const dateBox = document.querySelector('#dateBox');

function edad() {
    var Q4A;
    var Bdate = dateBox.value;
    var Bday = +new Date(Bdate);
    Q4A = ((Date.now() - Bday) / (31557600000));
 	return(Q4A);
}

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
	if(edad() < 18) {
		alert("ERROR! Debe ser mayor de edad para utilizar esta aplicación (18+ años).");
        e.preventDefault();
	}
	else if (!expresion.test(mail)){
		alert("ERROR! El correo introducido no es valido. Por favor intentelo de nuevo.");
		e.preventDefault();
	}
});