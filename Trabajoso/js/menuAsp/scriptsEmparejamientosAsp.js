const tableContent = document.querySelector('.tableContent');
const up = document.querySelector('#upArrow');
const down = document.querySelector('#downArrow');
const add = document.querySelector('#add');

const tableHeight = tableContent.clientHeight;
var a = 1;

function resetUpDown () {
    up.style.transitionDuration = "0s";
    up.style.opacity = "1";
    down.style.opacity = "1";
}

function CrearHiperVinculoDir (dir) {
    let x = "";
    for (var i=4; i<=dir.length-6; i++) {
        if (dir[i] != ' ') x=x+dir[i];
        else x=x+'+';
    }
    return x;
}

function AgregarFilaTablaAsp (name, mail, pais, det, dir) {

    var newDiv = document.createElement("div");
    var nameText = document.createElement("div");
    var nameDiv = document.createElement("div");
    var mailText = document.createElement("div");
    var mailDiv = document.createElement("div");
    var paisText = document.createElement("div");
    var paisDiv = document.createElement("div");
    var dirText = document.createElement("div");
    var dirDiv = document.createElement("div");
    var detText = document.createElement("div");
    var detDiv = document.createElement("div");

    nameText.innerHTML = name;
    mailText.innerHTML = mail;
    paisText.innerHTML = pais;
    dirText.innerHTML = dir;
    detText.innerHTML = det;

    newDiv.className = "tableContentRow";
    nameDiv.className = "nameContent";
    mailDiv.className = "mailContent";
    paisDiv.className = "paisContent";
    dirDiv.className = "dirContent";
    detDiv.className = "detContent";
    nameText.className = "nameText";
    mailText.className = "mailText";
    paisText.className = "paisText";
    detText.className = "detText";
    dirText.className = "dirText";

    var imgMaps = document.createElement("div");
    var link = document.createElement("a");
    imgMaps.className = "mapsImg";
    var img = document.createElement("img");
    img.className = "imagen";
    img.src = "img/menuAsp/vermaps.png";
    img.alt = "mapa";
    link.href = "https://google.com/maps/search/" + CrearHiperVinculoDir(dir) + "+" + CrearHiperVinculoDir(pais);
    link.target = "_blank";
    link.appendChild(img);
    imgMaps.appendChild(link);
    dirDiv.appendChild(imgMaps);

    nameDiv.appendChild(nameText);
    mailDiv.appendChild(mailText);
    paisDiv.appendChild(paisText);
    detDiv.appendChild(detText);
    dirDiv.appendChild(dirText);
    newDiv.appendChild(nameDiv);
    newDiv.appendChild(mailDiv);
    newDiv.appendChild(paisDiv);
    newDiv.appendChild(dirDiv);
    newDiv.appendChild(detDiv);

    tableContent.appendChild(newDiv);
}

add.addEventListener('click', () => {
    AgregarFilaTablaAsp (
    "<p> Arbolitos Verdes Co. </p>",
    "<p> ArbolitosVerdesCo@gmail.com </p>",
    "<p> Venezuela </p>",
    "<p> Ofrecemos un empleo para programadores que dominen el lenguaje de programacion C++. Salario 3$/h Lunes a Jueves de 8am a 5pm. </p>",
    "<p> Avenida Fco. de Miranda, Caracas. </p>");
    console.log("Mostrando Tabla #" + a);
    a++;
});

up.addEventListener('mouseenter', () => {
    up.style.transitionDuration = "0.4s";
    up.style.width = "7%";
    up.style.left = "90.5%";
    up.style.height = "14%";
});

up.addEventListener('mouseleave', () => {
    up.style.transitionDuration = "0.4s";
    up.style.width = "6%";
    up.style.left = "91%";
    up.style.height = "13%";
});

down.addEventListener('mouseenter', () => {
    down.style.transitionDuration = "0.4s";
    down.style.width = "7%";
    down.style.left = "90.5%";
    down.style.height = "14%";
});

down.addEventListener('mouseleave', () => {
    down.style.transitionDuration = "0.4s";
    down.style.width = "6%";
    down.style.left = "91%";
    down.style.height = "13%";
});

up.addEventListener('click', () => {
    console.log("clickedUp");
    up.style.transitionDuration = "0s";
    up.style.opacity = "0.8";
    setTimeout(resetUpDown, 100);
    tableContent.scrollBy( {
        top: -tableHeight/2,
        left: 0,
        behavior: "smooth"
    });
});

down.addEventListener('click', () => {
    console.log("clickedDown");
    down.style.transitionDuration = "0s";
    down.style.opacity = "0.8";
    setTimeout(resetUpDown, 100);
    tableContent.scrollBy( {
        top: tableHeight/2,
        left: 0,
        behavior: "smooth"
    });
});