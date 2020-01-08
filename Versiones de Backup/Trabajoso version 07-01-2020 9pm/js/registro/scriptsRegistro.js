const regEmpBtn = document.querySelector('#regEmpresa');
const regAspBtn = document.querySelector('#regAspirante');
const divEmp = document.querySelector('.fadingBoxEmpresa');
const divDef = document.querySelector('.fadingBoxDefault');
const divAsp = document.querySelector('.fadingBoxAspirante');

var colorTemp;

divDef.style.visibility = 'visible';
divAsp.style.visibility = 'hidden';
divEmp.style.visibility = 'hidden';

regEmpBtn.addEventListener('click', () => {
	regEmpBtn.style.backgroundColor = '#FFAA38';
	regAspBtn.style.backgroundColor = '#FF8E36';
	divDef.style.visibility = 'hidden';
	divAsp.style.visibility = 'hidden';
	divEmp.style.visibility = 'visible';
	divDef.style.opacity = '0';
	divAsp.style.opacity = '0';
	divEmp.style.opacity = '1';
	colorTemp = regEmpBtn.style.backgroundColor;
});

regAspBtn.addEventListener('click', () => {
	regAspBtn.style.backgroundColor = '#FFAA38';
	regEmpBtn.style.backgroundColor = '#FF8E36';
	divDef.style.visibility = 'hidden';
	divAsp.style.visibility = 'visible';
	divEmp.style.visibility = 'hidden';
	divDef.style.opacity = '0';
	divEmp.style.opacity = '0';
	divAsp.style.opacity = '1';
	colorTemp = regAspBtn.style.backgroundColor;
});

regEmpBtn.addEventListener('mouseenter', () => {
	colorTemp = regEmpBtn.style.backgroundColor;
	regEmpBtn.style.backgroundColor = '#FF9200';
});

regEmpBtn.addEventListener('mouseleave', () => {
	regEmpBtn.style.backgroundColor = colorTemp;
});

regAspBtn.addEventListener('mouseenter', () => {
	colorTemp = regAspBtn.style.backgroundColor;
	regAspBtn.style.backgroundColor = '#FF9200';
});

regAspBtn.addEventListener('mouseleave', () => {
	regAspBtn.style.backgroundColor = colorTemp;
});