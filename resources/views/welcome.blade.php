<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Juegos</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/generales.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.bundle.js') }}"></script>
    <script src="{{ asset('js/modal-loading.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/sweetalert2.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('css/modal.css') }}">
</head>

<body class="vh-100 bg-white d-flex p-5">
    <div class="container bg-light border rounded my-auto p-3">
        <h2>Listado de Juegos</h2>
        <button class="btn btn-outline-primary" onclick="agregar()">Registrar</button>
        <table id="tabla_juegos" class="table w-100 table-sm table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>URL</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Estado</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div id="modales"></div>
</body>

</html>
<script src="{{ asset('js/juegos.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#tabla_juegos').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            lengthChange: false,
            info: false,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/juegosList",
                type: 'POST',
            },
            columns: [{
                    data: 'nombre',
                    name: 'nombre'

                },
                {
                    data: 'url',
                    name: 'url'

                },
                {
                    data: 'descripcion',
                    name: 'descripcion'

                },
                {
                    data: 'url_imagen',
                    name: 'url_imagen'

                },
                {
                    data: 'estado',
                    name: 'estado'

                },
                {
                    data: 'ver',
                    name: 'ver'

                },
                {
                    data: 'editar',
                    name: 'editar'

                },
                {
                    data: 'borrar',
                    name: 'borrar'

                }
            ],
            drawCallback: function(settings) {
                var pagination = $(this).closest('.dataTables_wrapper').find(
                    '.dataTables_paginate');
                pagination.toggle(this.api().page.info().pages > 1);
            },
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    })
</script>
