@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css_l/hoja_NueLibro.css') }}">
<meta charset="utf-8">
<title>Nuevo Libro</title>

<script>
$(document).ready(function() {
    $("#FormNuevoLibro").on("submit", function(e) {
        e.preventDefault();

        var formData = new FormData(document.getElementById("FormNuevoLibro"));

        $.ajax({
            url: "{{ route('libros.store') }}",  // Replace with the appropriate route
            type: "POST",
            dataType: "HTML",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(datos) {
            $("#ContenidoLi").html(datos);
        });
    });
});
</script>

<div id="CModLi">
    <div id="formulario">
        <h1>Nuevo Libro</h1>

        <form enctype="multipart/form-data" id="FormNuevoLibro" method="POST">
            @csrf
            <div>
                <label for="txttitulo">Titulo:</label>
                <input type="text" required id="txttitulo" name="txttitulo">
            </div>

            <div>
                <label for="picimagen">Portada:</label>
                <input type="file" required id="picimagen" name="picimagen" accept="image/*">
            </div>

            <div>
                <label for="cboautor">Autor:</label>
                <select id="cboautor" name="cboautor">
                    @foreach($autores as $autor)
                        <option value="{{ $autor->CodAutor }}">{{ $autor->Descripcion }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="cbogenero">Género:</label>
                <select id="cbogenero" name="cbogenero">
                    @foreach($generos as $genero)
                        <option value="{{ $genero->CodGenero }}">{{ $genero->Descripcion }}</option>
                    @endforeach
                </select>  
            </div>

            <div>
                <label for="cboeditorial">Editorial:</label>
                <select id="cboeditorial" name="cboeditorial">
                    @foreach($editoriales as $editorial)
                        <option value="{{ $editorial->CodEditorial }}">{{ $editorial->Descripcion }}</option>
                    @endforeach
                </select>  
            </div>

            <div>
                <label for="txtubicacion">Ubicacion:</label>
                <input type="text" required id="txtubicacion" name="txtubicacion">  
            </div>

            <div>
                <label for="txtejemplar">Ejemplares:</label>
                <input type="number" required id="txtejemplar" name="txtejemplar" min="1">
            </div>        

            <div id='botones'>
                <button type="submit">Guardar</button>
                <button type="button" onclick="VistaLibro();">Cancelar</button>
            </div>
        </form>
    </div>  
</div>
@endsection
