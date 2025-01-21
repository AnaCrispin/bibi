<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamo</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css_l/hoja_prestamo.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    @php
        $fecha = date('Y-m-d');
        $nuevafecha = strtotime('-1 day', strtotime($fecha));
        $nuevafechaYear = strtotime('+1 year', strtotime($fecha));
        $FechaActual = date('Y-m-d', $nuevafecha);
        $FechaMaxima = date('Y-m-d', $nuevafechaYear);
        $id = request()->input('cod');
        
        // Include your database connection here
        include('../dbconexion.php');

        // Fetch bibliotecario carnet
        $query = "SELECT Nro_Carnet FROM bibliotecario WHERE CodBibliotecario = '$id'";
        $resultado = $cnmysql->query($query);
        $fila = mysqli_fetch_array($resultado);
        $carnet = $fila['Nro_Carnet'];

        // Fetch lectores
        $lectores = $cnmysql->query("SELECT * FROM lector");
    @endphp

    <script type="text/javascript">
        var carnetBi = '{{ $carnet }}';
        $(document).ready(function () {
            $('#txtCarnetBi').val(carnetBi);
            VistaDefault();

            $('#txtbusqueda').on('input', function () {
                ListarStockLibro();
            });
        });

        function VistaDefault() {
            var parametros = {
                "dbusqueda": $("#txtbusqueda").val()
            };
            $.ajax({
                data: parametros,
                url: 'listarStockLibros.php',
                type: 'POST',
                beforeSend: function () {
                    $("#ListaLibros").html("Procesando");
                },
                success: function (datos) {
                    $("#ListaLibros").html(datos);
                }
            });
        }

        function ListarStockLibro() {
            VistaDefault();
        }

        function VerificarLector() {
            // Add your verification logic here
        }

        function GuardarPrestamo() {
            // Add your save logic here
        }

        function VistaInicio() {
            // Logic to cancel loan
        }
    </script>

    <div id="ContPrestamo">
        <div id="ContDatos">
            <h1>Préstamo</h1>
            <form id="FormPrestamo">
                <div>
                    <label for="txtCarnetBi">Carnet Bibliotecario:</label>
                    <input type="hidden" value="{{ $id }}" id="txtCodBi">
                    <input type="text" id="txtCarnetBi" readonly>
                </div>

                <div>
                    <label for="txtCarnetLe">Nro Carnet Lector:</label>
                    <div>
                        <select class="js-example-basic-single" id="cboLector">
                            @while ($fila = mysqli_fetch_array($lectores))
                                <option value="{{ $fila['CodLector'] }}">{{ $fila['Nro_Carnet'] }}</option>
                            @endwhile
                        </select>
                        <button type="button" onclick="VerificarLector()">Verificar</button>
                    </div>
                </div>

                <div id="MsjVerificarLector"></div>

                <div>
                    <label for="dtpFecha">Fecha Devolucion:</label>
                    <input type="date" id="dtpFecha" step="1" min="{{ $FechaActual }}" max="{{ $FechaMaxima }}" value="{{ $FechaActual }}">
                </div>

                <div>
                    <label for="txtCodLibro">Código Libro:</label>
                    <div>
                        <input type="number" id="txtCodLibro" min="1">
                    </div>
                </div>

                <div id="MsjVerificarLibro"></div>

                <div id="botones">
                    <button type="button" onclick="GuardarPrestamo();">Guardar Préstamo</button>
                    <button type="button" onclick="VistaInicio();">Cancelar Préstamo</button>
                </div>

                <div id="MsjVerificarPrestamo"></div>
            </form>
        </div>

        <div id="ContListLibros">
            <h1>Lista de Libros</h1>
            <div id="busqueda">
                <input type="text" id="txtbusqueda" placeholder="Titulo, Autor, Editorial, Genero">
                <button type="button" onclick="ListarStockLibro();">Buscar</button>
            </div>

            <div id="ListaLibros"></div>
        </div>
    </div>
</body>
</html>
