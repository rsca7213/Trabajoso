const divDefault = document.querySelector('.mainBoxDefault');
const divPerfil = document.querySelector('.mainBoxPerfil');
const divForm = document.querySelector('.mainBoxForm');
const divEmps = document.querySelector('.mainBoxEmps');
const sidePerfil = document.querySelector('.icon1Container');
const sideForm = document.querySelector('.icon2Container');
const sideEmps = document.querySelector('.icon3Container');
const volverPerfil = document.querySelector('#volverPerfil');
const volverForm = document.querySelector('#volverForm');
const volverEmps = document.querySelector('#volverEmps');
const textExp = document.querySelector('#curriculumText');



divPerfil.style.visibility = 'hidden';
divForm.style.visibility = 'hidden';
divEmps.style.visibility = 'hidden';
divDefault.style.visibility = 'visible';

sidePerfil.addEventListener('click', () => {
	divForm.style.visibility = 'hidden';
	divEmps.style.visibility = 'hidden';
	divDefault.style.visibility = 'hidden';
	divPerfil.style.visibility = 'visible';
	sideForm.style.background = 'transparent';
	sideEmps.style.background = 'transparent';
	sidePerfil.style.background = 'black';
	volverPerfil.style.transitionDuration = "0.4s";
	volverForm.style.transitionDuration = "0s";
	volverEmps.style.transitionDuration = "0s";
});

sideForm.addEventListener('click', () => {
	if (current === "Otro...") { otraProf.style.visibility = 'visible';  otraProfLabel.style.visibility = 'visible'; }
	divEmps.style.visibility = 'hidden';
	divDefault.style.visibility = 'hidden';
	divPerfil.style.visibility = 'hidden';
	divForm.style.visibility = 'visible';
	sidePerfil.style.background = 'transparent';
	sideEmps.style.background = 'transparent';
	sideForm.style.background = 'black';
	volverForm.style.transitionDuration = "0.4s";
	volverPerfil.style.transitionDuration = "0s";
	volverEmps.style.transitionDuration = "0s";
});

sideEmps.addEventListener('click', () => {
	var exp = textExp.value;
	if (exp === "") {
		alert("Error!, Debe tener un formulario de busqueda activo para observar sus emparejamientos.");
	}
	else {
		divForm.style.visibilty = 'hidden';
		divDefault.style.visibility = 'hidden';
		divPerfil.style.visibility = 'hidden';
		divEmps.style.visibility = 'visible';
		sidePerfil.style.background = 'transparent';
		sideForm.style.background = 'transparent';
		sideEmps.style.background = 'black';
		volverEmps.style.transitionDuration = "0.4s";
		volverPerfil.style.transitionDuration = "0s";
		volverForm.style.transitionDuration = "0s";
	}
});

sidePerfil.addEventListener('mouseenter', () => {
	sidePerfil.style.opacity = '0.6';
});

sidePerfil.addEventListener('mouseleave', () => {
	sidePerfil.style.opacity = '1';
});

sideForm.addEventListener('mouseenter', () => {
	sideForm.style.opacity = '0.6';
});

sideForm.addEventListener('mouseleave', () => {
	sideForm.style.opacity = '1';
});

sideEmps.addEventListener('mouseenter', () => {
	sideEmps.style.opacity = '0.6';
});

sideEmps.addEventListener('mouseleave', () => {
	sideEmps.style.opacity = '1';
});

function DefaultizarMenu () {
	console.log('defaltizando');
	otraProf.style.visibility = 'hidden';
	otraProfLabel.style.visibility = 'hidden';
	divPerfil.style.visibility = 'hidden';
	divForm.style.visibility = 'hidden';
	divEmps.style.visibility = 'hidden';
	divDefault.style.visibility = 'visible';
	sideForm.style.background = 'transparent';
	sideEmps.style.background = 'transparent';
	sidePerfil.style.background = 'transparent';
	return null;
};

volverForm.addEventListener('click', () => {
	volverForm.style.transitionDuration = "0s";
	DefaultizarMenu();
});

volverPerfil.addEventListener('click', () => {
	volverPerfil.style.transitionDuration = "0s";
	DefaultizarMenu();
});

volverEmps.addEventListener('click', () => {
	volverEmps.style.transitionDuration = "0s";
	DefaultizarMenu();
});