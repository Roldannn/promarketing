function agregar(){
    modal = cargando("Cargando");
    ajaxModal("modal-add", 0, "agregar");
}

function editar(id){
    modal = cargando("Cargando");
    ajaxModal("modal-edit", id, "editar");
}

function ver(id){
    modal = cargando("Cargando");
    ajaxModal("modal-ver", id, "ver");
}

$(document).on("submit","#form-agregar",function(e) {
    modal = cargando("Agregando Juego");
    e.preventDefault();
    ajaxRequest("juegos", 0, "POST", "form-agregar", "tabla_juegos", "agregar");
});

$(document).on("submit","#form-editar",function(e) {
    e.preventDefault();
    var swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: "btn btn-danger mr-2"
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons
    .fire({
        title: "¿Esta seguro de editar este juego?",
        type: "info",
        showCancelButton: true,
        confirmButtonText: "Si, editar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
    })
    .then(function(result) {
        if (result.value) {
            modal = cargando("Editando Juego");
            ajaxRequest("juegos", 0, "PUT", "form-editar", "tabla_juegos");
        } 
        else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                "Cancelado",
                "El juego no fue editado",
                "error"
            );
        }
    });
});

function eliminar(id){
    var swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: "btn btn-danger mr-2"
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons
    .fire({
        title: "¿Esta seguro de eliminar este juego?",
        text: "No se podrán revertir los cambios!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
    })
    .then(function(result) {
        if (result.value) {
            modal = cargando("Eliminado");
            ajaxRequest("juegos", id, "DELETE", "", "tabla_juegos");
        } 
        else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                "Cancelado",
                "El juego no fue eliminado",
                "error"
            );
        }
    });
    
}