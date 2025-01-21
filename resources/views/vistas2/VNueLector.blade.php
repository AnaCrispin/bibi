@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css_l/hoja_NueLector.css') }}">
<meta charset="utf-8">
<title>Nuevo Lector</title>

<script type="text/javascript">
    function GenerarCarnetLe() {
        var parametros = {};

        $.ajax({
            data: parametros,
            url: '{{ route('lectores.generarCarnet') }}',  // Update with the correct route
            type: 'POST',
            beforeSend: function() {
                // Optionally show a loading message or spinner
            },
            success: function(response) {
                var arreglo = response.split("|");
                $("#txtnroCarnet").val(arreglo[0]);
            }
        });
    }
</script>

<div id="CModLe">
    <div id="formulario">
        <h1>Nuevo Lector</h1>
        <form id="FormNuevoLector" method="POST">
            @csrf
            <div>
                <label for="txtnombres">Nombres:</label>
                <input type="text" required id="txtnombres" name="txtnombres" value="">
            </div>

            <div>
                <label for="txtapellidos">Apellidos:</label>
                <input type="text" required id="txtapellidos" name="txtapellidos" value="">    
            </div>

            <div>
                <label for="txtdireccion">Dirección:</label>
                <input type="text" required id="txtdireccion" name="txtdireccion" value="">    
            </div>

            <div>
                <label for="txtemail">Email:</label>
                <input type="email" required id="txtemail" name="txtemail" value="">    
            </div>

            <div>
                <label for="txttelefono">Telefono:</label>
                <input type="number" required id="txttelefono" name="txttelefono" pattern=".{9,}" maxlength="9" min="1">    
            </div>

            <div id="GeneradorPadre">
                <label for="txtnroCarnet">Nro Carnet:</label>
                <div id="GeneradorHijo">
                    <input type="text" required id="txtnroCarnet" name="txtnroCarnet" value="" readonly>
                    <button id="btngenerar" type="button" onclick="GenerarCarnetLe();">Autogenerar</button>
                </div>
            </div>

            <div>
                <label for="txtclave">Contraseña:</label>
                <input type="password" required id="txtclave" name="txtclave" value="">
            </div>        

            <div id='botones'>
                <button type="button" onclick="DNuevoLe();">Guardar</button>
                <button type="button" onclick="VistaLector();">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@endsection