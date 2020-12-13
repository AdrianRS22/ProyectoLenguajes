$(document).ready(function () {
    document.getElementById("formulario").addEventListener('submit', obtenerDetallesHacienda);
});

function obtenerDetallesHacienda(e){
    e.preventDefault();

    var identificacion = document.querySelector('#identificacionInputText').value;

    if(identificacion.trim().length > 0){

        var request = new XMLHttpRequest();
        request.open('GET', 'https://api.hacienda.go.cr/fe/ae?identificacion=' + identificacion, true);
        request.send();

        request.onload = function(){

            if(request.status >= 200 && request.status < 400){
                var detalles = JSON.parse(this.response);

                document.getElementById("nombreInputText").value = detalles.nombre;
                document.getElementById("morosoInputText").value = detalles.situacion.moroso;
                document.getElementById("descripcionInputText").value = detalles.regimen.descripcion;

                mostrarAlerta("Persona encontrada", "success");
            }else{
                mostrarAlerta("Cedula invalida", "error")
                .then(() => limpiarCampos());
            }
        }
    }else{
        mostrarAlerta("La identificacion es requerida", "warning")
        .then(() => limpiarCampos());
    }
}

function mostrarAlerta(titulo, icono){
    return swal({
        title: titulo,
        icon: icono
    });
}

function limpiarCampos(){
    document.getElementById("formulario").reset();
    $('#nombreInputText, #morosoInputText, #descripcionInputText').val('');
}