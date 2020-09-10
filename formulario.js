//console.log("funcionando");

$("#formulario").submit(function(event){
    event.preventDefault();
    enviar();
})

function enviar(){
    //console.log("ejecutado.")
    var datos = $("#formulario").serialize(); //Guarda todos los datos del formulario y los guarda en forma de arreglo.
    console.log(datos);

    $.ajax({
        type: "post",
        url: "formulario.php",
        data: datos,
        success: function(texto){
            if(texto.trim() === "exito"){
                correcto();
            }
            else{
                phperror(texto);
            }
        } 
    })
}

function correcto(){
    $("#mensajeExito").removeClass("d-none");
    $("#mensajeError").removeClass("d-none");
}
function phperror(texto){
    $("#mensajeError").removeClass("d-none");
    $("#mensajeError").html(texto);
}