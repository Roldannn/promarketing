<div class="modal fade" id="{{ $idModal }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ver Juego</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
              <div class="row">
                  <span class="col-6">Nombre:</span>
                  <span class="col-6">{{ $Juego->nombre }}</span>
              </div>
            <div class="row">
                <span class="col-6">URL del juego:</span>
                <span class="col-6"><a href="{{ $Juego->url }}" target="_blank">Ir</a></span>
            </div>
            <div class="row">
                <span class="col-6">Descripción:</span>
                <span class="col-6">{{ $Juego->descripcion }}</span>
            </div>
            <div class="row">
                <span class="col-6">URL imagen:</span>
                <span class="col-6"><img src="{{ $Juego->url_imagen }}"></span>
            </div>
            <div class="row">
                <span class="col-6">Estado:</span>
                <span class="col-6">{!!$Juego->estado == 1 ? "<span class=\"badge badge-success\">Online</span>" : "<span class=\"badge badge-danger\">Offline</span>" !!}</span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>