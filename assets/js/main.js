console.log("Hola Mundo");
var cadena='esto es ua variable de cadena'
console.log(cadena)
var array=['elemento1', 'elemento2', 'elemento 3']
console.log(array)
var entero=5
console.log(entero)
var decimal=5.3
console.log(decimal)
var caracter='C'
console.log(caracter)
var boolean=true
console.log(boolean)

/*if (boolean){
    alert('La expresion del if es true')
} else {
    "No es True"
}

for(var i=0; i<10; i++){
    console.log('El valor de i es ' + i)
}

switch (caracter){
    case 'A':
        alert('El valor es A');
        break
    case 'B':
        alert('El valor es B');
        break
    case 'C':
        alert('El valor es C')
    default:
        alert('Ningun valor evaluado');
        break
}
        */
var contador=1
while(contador<=5){
    console.log ('en el contador '+contador),
    contador++;
}

function agregar_producto(){
}
/* se usa el signo $ para invocar la libreria jjquery*/
$(document).ready(function(){

    $("#boton_agregar").on("click", function(){
        document.location.href = "?add";
    });

    $("#boton_cancelar").on("click", function(){
        alert("en la function del jquery CANCELAR");
    });
    
    
});