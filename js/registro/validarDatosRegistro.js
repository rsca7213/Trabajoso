const formEmp = document.getElementById('formRegEmp');
const formAsp = document.getElementById('form_datos');
const empEmail = document.querySelector('#empEmailBox');
const aspEmail = document.querySelector('#emailBox');
const dateBox = document.querySelector('#dateBox');


function edad() {
    var Q4A;
    var Bdate = dateBox.value;
    var Bday = +new Date(Bdate);
    Q4A = ((Date.now() - Bday) / (31557600000));
 	return(Q4A);
}

formEmp.addEventListener('submit',(e) => {
	let mail = empEmail.value;
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

formAsp.addEventListener('submit', (e) => {
	let mail = aspEmail.value;
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
