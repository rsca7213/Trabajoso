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
	if(edad() < 18) {
		document.querySelector('#errorCover').style.backgroundColor = 'black';
		document.querySelector('#errorCover').style.opacity = "0.2";
		document.querySelector('#errorCover').style.visibility = 'visible';
		document.querySelector('#errorBtnText').innerHTML = "Cerrar";
		document.querySelector('#errorText').innerHTML = "Debe ser mayor de edad para utilizar esta aplicación (18 años).";
		var img = document.createElement("img");
		img.setAttribute("class","imagen");
		img.setAttribute("alt","X");
		img.setAttribute("src","img/loginimg/xblack.png");
		document.querySelector('#errorBtnIcon').appendChild(img);
		var boxImg = document.createElement("img");
		boxImg.setAttribute("class","imagen");
		boxImg.setAttribute("alt","error");
		boxImg.setAttribute("src","img/loginimg/edad.png");
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
		//alert("ERROR! Debe ser mayor de edad para utilizar esta aplicación (18+ años).");
        e.preventDefault();
	}
});