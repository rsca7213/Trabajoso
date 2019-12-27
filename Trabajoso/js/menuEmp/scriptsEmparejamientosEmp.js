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

function AgregarFilaTablaEmp (name, mail, pais, edad, sexo, exp) {

    var newDiv = document.createElement("div");
    var nameText = document.createElement("div");
    var nameDiv = document.createElement("div");
    var mailText = document.createElement("div");
    var mailDiv = document.createElement("div");
    var paisText = document.createElement("div");
    var paisDiv = document.createElement("div");
    var edadSexoText = document.createElement("div");
    var edadSexoDiv = document.createElement("div");
    var expText = document.createElement("div");
    var expDiv = document.createElement("div");

    nameText.innerHTML = name;
    mailText.innerHTML = mail;
    paisText.innerHTML = pais;
    edadSexoText.innerHTML = "<p>" + edad + " (" + sexo + ") </p>";
    expText.innerHTML = exp;

    newDiv.className = "tableContentRow";
    nameDiv.className = "nameContent";
    mailDiv.className = "mailContent";
    paisDiv.className = "paisContent";
    edadSexoDiv.className = "edadSexoContent";
    expDiv.className = "expContent";
    nameText.className = "nameText";
    mailText.className = "mailText";
    paisText.className = "paisText";
    edadSexoText.className = "edadSexoText";
    expText.className = "expText";

    nameDiv.appendChild(nameText);
    mailDiv.appendChild(mailText);
    paisDiv.appendChild(paisText);
    expDiv.appendChild(expText);
    edadSexoDiv.appendChild(edadSexoText);
    newDiv.appendChild(nameDiv);
    newDiv.appendChild(mailDiv);
    newDiv.appendChild(paisDiv);
    newDiv.appendChild(edadSexoDiv);
    newDiv.appendChild(expDiv);

    tableContent.appendChild(newDiv);
}

add.addEventListener('click', () => {
    AgregarFilaTablaEmp (
    "<p> Juanito Perez </p>",
    "<p> juanitoP@gmail.com </p>",
    "<p> Venezuela </p>",
    19, "M",
    "<p> 5 Años trabajando en el area de arboles en venezuela con amplio conocimiento en todas las areas respectivas importantes. </p>");
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