<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_l/hoja_prestamoporreserva.css') }}">
    <title>Préstamo por Reserva</title>
</head>
<body>
    <div id="ContPrestamo">
        <div id="ContDatos">
            <h1>Préstamo</h1>
            <form id="FormPrestamo">
                <input type="hidden" id="txtCodReserva" value="{{ $dcodReserva }}">
                
                <div>
                    <label for="txtCarnetBi">Carnet Bibliotecario:</label>
                    <input type="hidden" value="{{ $CodBi }}" id="txtCodBi">
                    <input type="text" id="txtCarnetBi" value="{{ $carnetBi }}" readonly>
                </div>

                <div>
                    <label for="txtCarnetLe">Nro Carnet Lector:</label>
                    <input type="hidden" value="{{ $CodLe }}" id="txtCodLe">
                    <input type="text" id="txtCarnetLe" value="{{ $carnetLe }}" readonly>
                </div>

                <div>
                    <label for="dtpFecha">Fecha Devolución:</label>
                    <input type="date" id="dtpFecha" step="1" min="{{ $FechaActual }}" max="{{ $FechaMaxima }}" value="{{ $FechaActual }}">
                </div>

                <div>
                    <label for="txtCodLibro">Código Libro:</label>
                    <input type="text" id="txtCodLibro" value="{{ $codLibro }}" readonly>
                </div>

                <div id="botones">
                    <button type="button" onclick="GuardarPrestamoPorReserva();">Guardar Préstamo</button>
                    <button type="button" onclick="VistaLibrosReservadosBi();">Cancelar Préstamo</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        // Funciones JS para manejar la lógica del préstamo
    </script>
</body>
</html>
