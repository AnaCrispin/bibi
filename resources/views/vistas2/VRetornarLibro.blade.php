<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_l/hoja_EliLector.css') }}">
    <title>Retornar Libro</title>
</head>
<body>
    <div id="CEliLe">
        <div id="CajaMensaje">
            <h1><strong>Mensaje del Sistema</strong></h1>
            <p>¿Desea Retornar este Libro?</p>
            <div>
                <!-- Usamos Blade para imprimir la variable -->
                <button type="button" onclick="DRetornarLibro({{ $dcodDp }});">Aceptar</button>
                <button type="button" onclick="VistaLibrosPrestados();">Cancelar</button>
            </div>
        </div>
    </div>
</body>
</html>
