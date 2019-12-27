
function borrarPerfilyFormAsp(){
var a= prompt("Esta seguro que desea eliminar su perfil incluyendo su formulario?, Introduzca su clave para continuar.");

	window.location.replace("php/eliminar.php?op=1&clave="+a+"");
}

function borrarPerfilyFormEmp(){
var c= prompt("Esta seguro que desea eliminar su perfil incluyendo su formulario?, Introduzca su clave para continuar.");

	window.location.replace("php/eliminar.php?op=3&clave="+c+"");
}

function borrarFormAsp(){
var b= prompt("Esta seguro que desea eliminar su formulario?, Introduzca su clave para continuar.");

	window.location.replace("php/eliminar.php?op=2&clave="+b+"");
}

function borrarFormEmp(){
var d= prompt("Esta seguro que desea eliminar su formulario?, Introduzca su clave para continuar.");

	window.location.replace("php/eliminar.php?op=4&clave="+d+"");
}