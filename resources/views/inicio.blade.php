<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('assets/css/hoja_index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/hoja_libros.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/hoja_acercade.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/hoja_inicio.css') }}">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/vistas.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/funcionesLibros.js') }}"></script>
    <title>Sistema de Biblioteca</title>

    <script type="text/javascript">
        function AbrirVentaLogin() {
            document.forms['formingreso'].reset();
            $("#ventanalogin").slideDown("slow");
            $('#ErrorUsuario').hide('fast');
        }

        function CerrarVentaLogin() {
            document.forms['formingreso'].reset();
            $("#ventanalogin").slideUp("fast");
            $('#ErrorUsuario').hide('fast');
        }
    </script>
</head>
<body onload="VistaInicio()">
    <div id="contenedor">

        <div id="ventanalogin">
            <div id="formlogin">
                <div id="cerrar"><a href="javascript:CerrarVentaLogin();">Cerrar X</a></div>
                <h1>Ingresar al Sistema</h1>
                <hr><br>

                <form method="POST" action="{{ route('login') }}" id="formingreso">
                    @csrf 
                    <input type="text" name="ci" placeholder="Carnet de Identidad" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button type="submit" name="btnEntrar">Entrar</button>
                    <button type="button" onclick="javascript:CerrarVentaLogin();">Cancelar</button>
                    @if ($errors->any())
                        <div id='ErrorUsuario'>
                            <strong>Error!</strong> {{ $errors->first() }}
                        </div>
                    @endif
                </form>
            </div>
        </div>

        @include("partials.header") utilizando esto en el otro 
        </div>

        <br>
        <hr>

        <nav>
        <center>
            <ul>
                <li><a href="{{ route('vinicio') }}">Inicio</a></li>
                <li><a href="{{ route('listarlibros') }}">Libros</a></li>
                <li><a href="{{ route('vacercade') }}">Acerca de</a></li>
                <li><a href="javascript:AbrirVentaLogin();">Entrar</a></li>
            </ul>
        </center>
        </nav>

        @yield("contend")

        @include("partials.footer") utilizando esto en el otro 
    </div>
</body>
</html>
