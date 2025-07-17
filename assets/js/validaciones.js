/*$(document).ready(function(){
    alert("Funciona correctamente")
});
*/

$("#form_categorias").submit(function(){
    var nombre=$("#categorias").val();
    if($.trim(nombre)===''){
        alert("Debe completar el nombre de la categoria\n Alexandra Mamani")
        return false;
        }
    return true
})


$("#form_productos").submit(function(){
    var producto=$("#p_producto").val();
    var imagen=$("#p_imagen").val();
    var descripcion=$("#p_descripcion").val();
    var categoria=$("#p_categoria").val();

    var errores=[];

    if($.trim(producto)===''){
        errores.push("Debe ingresar el nombre del producto");
    }

    if($.trim(imagen)===''){
    errores.push("Debe subir una imagen");
    }
    
    if($.trim(descripcion)===''){
    errores.push("Debe escribir la descripciòn del producto");
    }

    if($.trim(categoria)===''){
    errores.push("Debe seleccionar una categoria");
    }
    
    if(errores.length>0){
    errores.push("Alexandra Mamani");
    alert(errores.join("\n"));
    return false
    }
return true
})