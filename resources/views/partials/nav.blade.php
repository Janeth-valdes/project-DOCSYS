<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>DOCSYS</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://kit.fontawesome.com/f1115874dc.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <!--! Estilos -->
  <link rel="stylesheet" href="{{asset('/resources/css/styles-cat.css')}}">
  <link rel="stylesheet" href="{{asset('/resources/css/bootstrap.css')}}">
  <!--
    Alertas
    <link rel="stylesheet" href="{{ asset('/public/plugins/sweetAlert2/sweetalert2.min.css') }}">
  -->
</head>
<style>
  body {
    color: #404040;
    font-family: "HelveticaNeueLT Std Lt", Segoe UI, Tahoma, sans-serifl, Helvetica Neue, Helvetica;
    /* font-family: "Arial", Segoe UI, Tahoma, sans-serifl, Helvetica Neue, Helvetica;
    /*background-color: #404040;*/
    font-size: 1.6em;
  }
</style>

<script>
  function previewFile() {
    const preview = document.querySelector('embed');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function() {
      // convierte la imagen a una cadena en base64
      preview.src = reader.result;
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }
  /*
  window.addEventListener("load",mostrar);
  function mostrar() {
    var x = document.getElementById('alerta');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
  }*/
</script>

<body>

  <nav class="navbar navbar-expand-lg menu_nav">
    <div class="container-fluid">

      <a class="navbar-brand" href="{{route('/')}}">
        <img src="{{asset('/resources/img/sgc-logo.png')}}" width="75">
      </a>


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav">
          <!-- Reunion -->
          @if( Session::get('srol') == 1 || Session::get('srol') == 2 || Session::get('srol') == 3|| Session::get('srol') == 4)
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa-solid fa-arrows-to-circle"></i>
              <span class="txt-white">Reunion</span>
            </a>
            <ul class="dropdown-menu">
              @if( Session::get('srol') != 4)
              <li><a href="{{route('reunion')}}">Nueva Reunion</a></li>
              @endif
              <li><a href="{{route('consultareun')}}">Consultar Reunion</a></li>
            </ul>
          </li>
          @endif
          <!-- Minuta -->
          @if( Session::get('srol') == 1 || Session::get('srol') == 2 || Session::get('srol') == 3|| Session::get('srol') == 4)
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa-solid fa-pen-to-square"></i>
              <span class="txt-white">Minuta</span>
            </a>
            <ul class="dropdown-menu">
              @if( Session::get('srol') != 4)
              <li><a href="{{route('minuta')}}">Nueva Minuta</a></li>
              @endif
              <li><a href="{{route('consultaminu')}}">Consultar Minutas</a></li>
            </ul>
          </li>
          @endif
          <!-- Acuerdos -->
          @if( Session::get('srol') == 1 || Session::get('srol') == 2 || Session::get('srol') == 3|| Session::get('srol') == 4)
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa-solid fa-handshake-simple"></i>
              <span class="txt-white">Acuerdos</span>
            </a>
            <ul class="dropdown-menu">
              @if( Session::get('srol') != 4)
              <li><a href="{{route('acuerdos')}}">Nuevo Acuerdo</a></li>
              @endif
              <li><a href="{{route('consultaacue')}}">Consultar Acuerdos</a></li>

            </ul>
          </li>
          @endif
          <!-- Mejora -->
          @if( Session::get('srol') == 1 || Session::get('srol') == 2 || Session::get('srol') == 3|| Session::get('srol') == 4 || Session::get('srol') == 5)
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa-solid fa-hand-sparkles"></i>
              <span class="txt-white">Mejora</span>
            </a>
            <ul class="dropdown-menu">
              @if( Session::get('srol') != 4 || Session::get('srol') == 5)
              <li><a href="{{route('mejora')}}">Crear documento</a></li>
              @endif
              @if( Session::get('srol') == 5 || Session::get('srol') == 1)
              <li><a href="{{route('consultamej')}}">Consultar Documentos</a></li>
              @endif
            </ul>
          </li>
          @endif
          <!-- Documentos -->
          @if( Session::get('srol') == 1 || Session::get('srol') == 2 || Session::get('srol') == 3|| Session::get('srol') == 4)
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa-solid fa-file"></i>
              <span class="txt-white">Documentos</span>
            </a>
            <ul class="dropdown-menu">
              @if( Session::get('srol') != 4)
              <li><a href="{{route('documentos')}}">Nuevo Documento</a></li>
              @endif
              <li><a href="{{route('consultadoc')}}">Consultar Documentos</a></li>
              <li><a href="{{route('consultadocEdit')}}">Documentos Editables</a></li>
              <li><a href="{{route('controlvdoc')}}">Versión de documentos</a></li>
            </ul>
          </li>
          @endif
          <!-- Usuarios -->
          @if( Session::get('srol') == 1 || Session::get('srol') == 2 || Session::get('srol') == 3)
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa-solid fa-users-line"></i>
              <span class="txt-white">Usuarios</span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{route('usuarios')}}">Nuevo Usuario</a></li>
              <li><a href="{{route('consultausu')}}">Consultar Usuarios</a></li>
            </ul>
          </li>
          @endif
          <!-- + + + + + + + + + + + + + + + + + + + Cerrar Sesion + + + + + + + + + + + + + + + + + + + -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="txt-white">
                {{Session::get('sarea')}}{{Session::get('sname')}}
              </span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{route('cerrarsesion')}}"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                  <span class="txt-gold">Cerrar Sesión</span>
                </a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>




  @include('alertas.alertas')
  <script src="{{asset('/resources/js/bootstrap.min.js')}}"></script>
</body>

</html>

<script src="{{ asset('/public/plugins/sweetAlert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('/public/js/alertas.js') }}"></script>