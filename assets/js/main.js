
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