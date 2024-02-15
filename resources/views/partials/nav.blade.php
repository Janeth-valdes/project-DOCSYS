<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>DOCSYS</title>
  <!--! Estilos -->
  <link rel="stylesheet" href="{{asset('/resources/css/styles-cat.css')}}">
  <link rel="stylesheet" href="{{asset('/resources/css/bootstrap.css')}}">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://kit.fontawesome.com/f1115874dc.js" crossorigin="anonymous"></script>


  <!-- Alertas
    <link rel="stylesheet" href="{{ asset('/public/plugins/sweetAlert2/sweetalert2.min.css') }}">
  -->
</head>

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

  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SGC</a>
      <!-- Botón movil -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <!-- Reunion -->
          @if( Session::get('srol') == 1 || Session::get('srol') == 2 || Session::get('srol') == 3|| Session::get('srol') == 4)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-arrows-to-circle"></i>
              Reunion
            </a>
            <ul class="dropdown-menu">
              @if( Session::get('srol') != 4)
              <li><a class="dropdown-item" href="{{route('reunion')}}">Nueva Reunion</a></li>
              @endif
              <li><a class="dropdown-item" href="{{route('consultareun')}}">Consultar Reunion</a></li>
            </ul>
          </li>
          @endif
          <!-- Minuta -->
          @if( Session::get('srol') == 1 || Session::get('srol') == 2 || Session::get('srol') == 3|| Session::get('srol') == 4)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-pen-to-square"></i>
              Minuta
            </a>
            <ul class="dropdown-menu">
              @if( Session::get('srol') != 4)
              <li><a class="dropdown-item" href="{{route('minuta')}}">Nueva Minuta</a></li>
              @endif
              <li><a class="dropdown-item" href="{{route('consultaminu')}}">Consultar Minuta</a></li>
            </ul>
          </li>
          @endif
          <!-- Acuerdos -->
          @if( Session::get('srol') == 1 || Session::get('srol') == 2 || Session::get('srol') == 3|| Session::get('srol') == 4)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-handshake-simple"></i>
              Acuerdos
            </a>
            <ul class="dropdown-menu">
              @if( Session::get('srol') != 4)
              <li><a class="dropdown-item" href="{{route('acuerdos')}}">Nueva Acuerdo</a></li>
              @endif
              <li><a class="dropdown-item" href="{{route('consultaacue')}}">Consultar Acuerdos</a></li>
            </ul>
          </li>
          @endif

          <!-- Mejora -->
          @if( Session::get('srol') == 1 || Session::get('srol') == 2 || Session::get('srol') == 3|| Session::get('srol') == 4 || Session::get('srol') == 5)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-hand-sparkles"></i>
              Mejora
            </a>
            <ul class="dropdown-menu">
              @if( Session::get('srol') != 4)
              <li><a class="dropdown-item" href="{{route('mejora')}}">Crear Documento</a></li>
              @endif
              <li><a class="dropdown-item" href="{{route('consultamej')}}">Consultar Documentos</a></li>
            </ul>
          </li>
          @endif

          <!-- Documentos -->
          @if( Session::get('srol') == 1 || Session::get('srol') == 2 || Session::get('srol') == 3|| Session::get('srol') == 4)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-hand-sparkles"></i>
              Documentos
            </a>
            <ul class="dropdown-menu">
              @if( Session::get('srol') != 4)
              <li><a class="dropdown-item" href="{{route('documentos')}}">Nuevo Documento</a></li>
              @endif
              <li><a class="dropdown-item" href="{{route('consultadoc')}}">Consultar Documentos</a></li>
              <li><a class="dropdown-item" href="{{route('consultadocEdit')}}">Documentos Editables</a></li>
              <li><a class="dropdown-item" href="{{route('controlvdoc')}}">Versión de documentos</a></li>

            </ul>
          </li>
          @endif

          <!-- Usuarios -->
          @if( Session::get('srol') == 1 || Session::get('srol') == 2 || Session::get('srol') == 3)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-users-line"></i>
              Usuarios
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('usuarios')}}">Nuevo Usuario</a></li>
              <li><a class="dropdown-item" href="{{route('consultausu')}}">Consultar Usuario</a></li>
            </ul>
          </li>
          @endif

          <!-- Cerrar Sesión -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-hand-sparkles"></i>
              {{Session::get('sarea')}}{{Session::get('sname')}}
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{route('cerrarsesion')}}" class="text-danger">
                  <i class="fa-solid fa-arrow-right-to-bracket"></i>
                  Cerrar Sesión
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </div>

    </div>
  </nav>


  <!-- @include('alertas.alertas') -->
  <script src="{{asset('/resources/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/resources/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('/public/plugins/sweetAlert2/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('/public/js/alertas.js') }}"></script>

</body>

</html>