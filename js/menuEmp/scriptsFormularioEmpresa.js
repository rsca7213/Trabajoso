const listaProf = document.querySelector('#listaProfesiones');
const otraProf = document.querySelector('#textOtraProf');
const otraProfLabel = document.querySelector('#textOtraProfLabel');

otraProf.style.visibility= 'hidden';
otraProfLabel.style.visibility = 'hidden';
otraProf.required = false;
var current = listaProf.options[listaProf.selectedIndex].value;

listaProf.addEventListener('change', () => {

	console.log('Cambio Detectado');
	current = listaProf.options[listaProf.selectedIndex].value;
	if(current === "Otro..."){
		otraProf.required = true;
		otraProf.style.visibility = 'visible';
		otraProfLabel.style.visibility= 'visible';
	}
	else{
		otraProf.required = false;
		otraProf.style.visibility = 'hidden';
		otraProfLabel.style.visibility = 'hidden';
	}

});
