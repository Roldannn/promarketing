<div class="modal fade" id="{{ $idModal }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo-registrar">Registrar Juego</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-agregar">
                    <input type="hidden" name="_method" id="metodo" value="POST">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" minlength="1" maxlength="30" class="form-control"
                                name="nombre" value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="url">URL del juego</label>
                            <input type="text" id="url" minlength="1" maxlength="30" class="form-control" name="url"
                                value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="descripcion">Descripción</label>
                            <input type="text" id="descripcion" minlength="1" maxlength="30" class="form-control"
                                name="descripcion" value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="url_imagen">URL imagen</label>
                            <input type="text" id="url_imagen" minlength="1" maxlength="30" class="form-control"
                                name="url_imagen" value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="url_imagen">URL imagen</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="1" name="estado" id="estado1">
                                <label class="form-check-label" for="estado1">
                                    Online
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="0" name="estado" id="estado2" checked>
                                <label class="form-check-label" for="estado2">
                                    Offline
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="input" class="btn btn-primary agregar-usuario" form="form-agregar">Guardar
                    Información</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
