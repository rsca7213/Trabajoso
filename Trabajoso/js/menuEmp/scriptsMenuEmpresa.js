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
const detallesText = document.querySelector('#detallesText');
var control="";
var data;


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
	document.querySelector('#errorBtnText').style.visibility = 'hidden';
	document.querySelector('#errorBtn').style.visibility = 'hidden';
	document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
	document.querySelector('#errorBox').style.visibility = 'hidden';
	document.querySelector('#errorImg').style.visibility = 'hidden';
	document.querySelector('#errorText').style.visibility = 'hidden';
	document.querySelector('#errorImg').innerHTML = "";
	document.querySelector('#errorBtnIcon').innerHTML = "";
});

sideForm.addEventListener('click', () => {
	if (current === "Otro...") { otraProf.style.visibility = 'visible';  otraProfLabel.style.visibility = 'visible'; }
	document.querySelector('#errorBtnText').style.visibility = 'hidden';
	document.querySelector('#errorBtn').style.visibility = 'hidden';
	document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
	document.querySelector('#errorBox').style.visibility = 'hidden';
	document.querySelector('#errorImg').style.visibility = 'hidden';
	document.querySelector('#errorText').style.visibility = 'hidden';
	document.querySelector('#errorImg').innerHTML = "";
	document.querySelector('#errorBtnIcon').innerHTML = "";
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
	var det = detallesText.value;
	if(det === "") {
		document.querySelector('#errorCover').style.backgroundColor = 'black';
		document.querySelector('#errorCover').style.opacity = "0.2";
		document.querySelector('#errorCover').style.visibility = 'visible';
		document.querySelector('#errorBtnText').innerHTML = "Cerrar";
		document.querySelector('#errorText').innerHTML = "Error! Debe tener un formulario de búsqueda para ser emparejado.";
		var img = document.createElement("img");
		img.setAttribute("class","imagen");
		img.setAttribute("alt","X");
		img.setAttribute("src","img/loginimg/xblack.png");
		document.querySelector('#errorBtnIcon').appendChild(img);
		var boxImg = document.createElement("img");
		boxImg.setAttribute("class","imagen");
		boxImg.setAttribute("alt","error");
		boxImg.setAttribute("src","img/loginimg/error.png");
		document.querySelector('#errorImg').appendChild(boxImg);
		document.querySelector('#errorBtnText').style.visibility = 'visible';
		document.querySelector('#errorBtn').style.visibility = 'visible';
		document.querySelector('#errorBtnIcon').style.visibility = 'visible';
		document.querySelector('#errorBox').style.visibility = 'visible';
		document.querySelector('#errorImg').style.visibility = 'visible';
		document.querySelector('#errorText').style.visibility = 'visible';
		const btn = document.querySelector('#errorBtn');
		btn.addEventListener('click', () => {
			document.querySelector('#errorBtnText').style.visibility = 'hidden';
			document.querySelector('#errorBtn').style.visibility = 'hidden';
			document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
			document.querySelector('#errorBox').style.visibility = 'hidden';
			document.querySelector('#errorImg').style.visibility = 'hidden';
			document.querySelector('#errorText').style.visibility = 'hidden';
			document.querySelector('#errorImg').innerHTML = "";
			document.querySelector('#errorBtnIcon').innerHTML = "";
			document.querySelector('#errorCover').style.visibility = 'hidden';
			document.querySelector('#errorCover').style.backgroundColor = 'transparent';
			document.querySelector('#errorCover').style.opacity = "0";
		});
		//alert("Error!, Debe tener un formulario de busqueda activo para observar sus emparejamientos.");
	}
	else {

		var ajax= new XMLHttpRequest();
		var method= "GET";
		var url= '../../finaltrabajoso/php/emparejar.php?op=2';
		var asynchronous= true;
		

		ajax.open(method,url,asynchronous);
		ajax.send();
		ajax.onreadystatechange=function(){


			if(this.readyState==4 && this.status==200){
				//alert(this.responseText);
				data= JSON.parse(this.responseText);
				//control= data;

				if(data==0){
					document.querySelector('#errorCover').style.backgroundColor = 'black';
					document.querySelector('#errorCover').style.opacity = "0.2";
					document.querySelector('#errorCover').style.visibility = 'visible';
					document.querySelector('#errorBtnText').innerHTML = "Cerrar";
					document.querySelector('#errorText').innerHTML = "Aun no tienes emparejamientos, intentelo más tarde.";
					var img = document.createElement("img");
					img.setAttribute("class","imagen");
					img.setAttribute("alt","X");
					img.setAttribute("src","img/loginimg/xblack.png");
					document.querySelector('#errorBtnIcon').appendChild(img);
					var boxImg = document.createElement("img");
					boxImg.setAttribute("class","imagen");
					boxImg.setAttribute("alt","error");
					boxImg.setAttribute("src","img/loginimg/error.png");
					document.querySelector('#errorImg').appendChild(boxImg);
					document.querySelector('#errorBtnText').style.visibility = 'visible';
					document.querySelector('#errorBtn').style.visibility = 'visible';
					document.querySelector('#errorBtnIcon').style.visibility = 'visible';
					document.querySelector('#errorBox').style.visibility = 'visible';
					document.querySelector('#errorImg').style.visibility = 'visible';
					document.querySelector('#errorText').style.visibility = 'visible';
					const btn = document.querySelector('#errorBtn');
					btn.addEventListener('click', () => {
						document.querySelector('#errorBtnText').style.visibility = 'hidden';
						document.querySelector('#errorBtn').style.visibility = 'hidden';
						document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
						document.querySelector('#errorBox').style.visibility = 'hidden';
						document.querySelector('#errorImg').style.visibility = 'hidden';
						document.querySelector('#errorText').style.visibility = 'hidden';
						document.querySelector('#errorImg').innerHTML = "";
						document.querySelector('#errorBtnIcon').innerHTML = "";
						document.querySelector('#errorCover').style.visibility = 'hidden';
						document.querySelector('#errorCover').style.backgroundColor = 'transparent';
						document.querySelector('#errorCover').style.opacity = "0";
					});
					//alert("Aún no tienes emparejamientos, Por favor regresa más tarde.");
				}
				else{
		
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
					document.querySelector('#errorBtnText').style.visibility = 'hidden';
					document.querySelector('#errorBtn').style.visibility = 'hidden';
					document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
					document.querySelector('#errorBox').style.visibility = 'hidden';
					document.querySelector('#errorImg').style.visibility = 'hidden';
					document.querySelector('#errorText').style.visibility = 'hidden';
					document.querySelector('#errorImg').innerHTML = "";
					document.querySelector('#errorBtnIcon').innerHTML = "";
				}

			}

	}
	
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
	document.querySelector('#errorBtnText').style.visibility = 'hidden';
	document.querySelector('#errorBtn').style.visibility = 'hidden';
	document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
	document.querySelector('#errorBox').style.visibility = 'hidden';
	document.querySelector('#errorImg').style.visibility = 'hidden';
	document.querySelector('#errorText').style.visibility = 'hidden';
	document.querySelector('#errorImg').innerHTML = "";
	document.querySelector('#errorBtnIcon').innerHTML = "";
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