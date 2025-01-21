<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_l/hoja_RetornarLibroPrestado.css') }}">
    <title>Cancelar Reserva</title>
</head>
<body>
    <div id="CEliRe">
        <div id="CajaMensaje">
            <h1><strong>Mensaje del Sistema</strong></h1>
            <p>¿Desea Cancelar la Reserva de Este Libro?</p>
            <div>
                <!-- Usamos Blade para imprimir la variable -->
                <button type="button" onclick="DRetornarLibroReservado({{ $dcodRe }});">Aceptar</button>
                <button type="button" onclick="VistaLibrosReservados();">Cancelar</button>
            </div>
        </div>
    </div>
</body>
</html>
