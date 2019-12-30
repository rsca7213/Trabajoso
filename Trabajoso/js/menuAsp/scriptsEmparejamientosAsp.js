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