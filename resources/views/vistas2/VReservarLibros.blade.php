<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_l/hoja_reservarlibros.css') }}">
    <title>Reservar Libro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div id="ContRlibro">
        <div id="datosReserva">
            <label for="txtCodLector">Nro Carnet:</label>
            <input type="hidden" id="txtCodLector" value="{{ $id }}">
            <input type="text" id="txtNroCarnetLector" readonly value="{{ $carnet }}">

            <label for="txtCodLibro">Codigo Libro:</label>
            <input type="number" id="txtCodLibro" min="1">
            <button type="button" onclick="ReservarLibro();">Reservar</button><br>
            <div id="MsjReserva"></div>
        </div>

        <div id="datosLista">
            <div id="busqueda">
                <input type="text" id="txtbusqueda" placeholder="Titulo, Autor, Editorial, Genero" style="width: 200px;">
                <button type="button" onclick="ListarReservaLibro();">Buscar</button>
            </div>
            <div id="ListLibros"></div>
        </div>
    </div>

    <script type="text/javascript">
        var msj = "{{ $carnet }}";
        alert(msj);

        function VistaDefault() {
            var parametros = {
                "dbusqueda": $("#txtbusqueda").val()
            };

            $.ajax({
                data: parametros,
                url: '{{ route("listarStockLibros") }}',
                type: 'POST',
                beforeSend: function () {
                    $("#ListLibros").html("Procesando...");
                },
                success: function (datos) {
                    $("#ListLibros").html(datos);
                }
            });
        }

        $(document).ready(function() {
            VistaDefault();
        });
    </script>
</body>
</html>
