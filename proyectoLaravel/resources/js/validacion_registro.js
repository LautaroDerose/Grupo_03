//Seleccion de formulario segun id
var formulario = document.getElementById('formRegistro');
//var formulario2 = document.forms['formRegistro'];
// seleccionar elementos del formulario
//.elements[] devuelve array con todos los imputs
// getElementById devuelve elemento con id

window.onload = iniciar;
function iniciar(){
  document.getElementById("enviarForm").addEventListener('click',validar, false);
}

function validarNombre(){
  var elemento = document.getElementById("inputName");
  if(elemento.value === ""){
    alert("El campo no puede estar vacio");
    return false
  }
  return true;
}

function validarApellido(){
  var elemento = document.getElementById("inputApellido");
  if(elemento.value === ""){
    alert("El campo no puede estar vacio");
    return false
  }
  return true;
}

function validarEmail(inputEmail){
  var elemento = document.getElementById("inputEmail");
  var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var esValido = regex.test(inputEmail);
  if (esValido === true) {
      alert("El correo es valido");
  }else {
    alert("El correo no es valido")
  }
    }

  function validarPass(){
    var pass = document.getElementById("inputPassword");
    var passConfirm = document.getElementById("password-confirm");
    var espacios = false;
    var cont = 0;
    while (!espacios && (cont < pass.length)){
      if (pass.charAt(cont)=== " ") {
        espacios = true;
        cont++;
      }
}
      if (espacios) {
        alert("La contrase;a no puede tener espacios en blanco");
        return false;
      }
      if(pass.length === 0 || passConfirm === 0){
        alert("los campos de la password no pueden estar vacios");
        return false;
      }
      if(pass != passConfirm){
        alert("Las passwords deben coincidir");
        return false;
      }else {
        alert("las passwords coinciden");
        return true;
      }

  }


//validacion de todas las funciones
function validar(e){
  if (validarNombre() && validarApellido() && validarEmail() && validarPass() && confirm("Pulsa aceptar si desea enviar el formulario")) {
return true;
}else {
  e.preventDefault();
  return false;
}
}