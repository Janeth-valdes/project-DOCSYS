
@include('partials.nav')
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('/public/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/plugins/sweetAlert2/sweetalert2.min.css') }}">

    

</head>

<div align="center">Control de  cambios</div>
  <br>

<div class="container">
<!---SECCIÓN 1 ------------------------------------------------------------------------------>
<div class="panel-group" id="accordion">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">1 Nivel Misión Visión Política y Objetivos</a>
</h4>
</div>
<div id="collapse1" class="panel-collapse collapse ">

<table class="table table-striped" >
  <thead>
    <tr>
      
      <th scope="col">Documento</th>
      <th scope="col">Version</th>
    

    </tr>
  </thead>
  <tbody>
@foreach($doc as $d)
 @if($d->directorio==1)  
     <td>{{$d->nombre}}</td>
  @if( $d->deleted_at != null )
     <td><button type="button" class="btn btn-primary">Anterior</button> </td>
     @else
     <td><button type="button" class="btn btn-success">Actual</button> </td>
  @endif 
  </tr>
 @endif
@endforeach
</tbody>
</table>

</div>
</div>
</div>
<!--- FIN SECCIÓN 1 ------------------------------------------------------------------------------>

<!---SECCIÓN 2 ------------------------------------------------------------------------------>


<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        2 Nivel Manual y Anexos
        </a>
      </h4>
</div>

<div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
     <div class="panel-body">
     <div class="panel-group" id="sub-accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">

<div  role="tab" id="subHeadingTwo">
        <h4 class="panel-title">
        <button class="btn btn-link collapsed" role="button" data-toggle="collapse" data-parent="#sub-accordion" href="#collapseSubTwo" aria-expanded="false" aria-controls="collapseSubTwo">
        Anexos del Manual de Calidad
      </button>
        </h4>
</div>

<div id="collapseSubTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSubTwo">
      <div class="panel-body">
      <div class="panel panel-default">

<div role="tab" id="headingT">
      <h4 class="panel-title">
      <button class="btn btn-link collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseT" aria-expanded="false" aria-controls="collapseT">
      ANEXO 1 PLANES Y SECUENCIAS
      </button>
      </h4>
</div>


    <div id="collapseT" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingT">
    <div class="panel-body">
    <table class="table table-striped" >
  <thead>
    <tr>
      
      <th scope="col">Documento</th>
      <th scope="col">Version</th>
    

    </tr>
  </thead>
  <tbody>
@foreach($doc as $d)
 @if($d->directorio==2.2)  
     <td>{{$d->nombre}}</td>
  @if( $d->deleted_at != null )
     <td><button type="button" class="btn btn-primary">Anterior</button> </td>
     @else
     <td><button type="button" class="btn btn-success">Actual</button> </td>
  @endif 
  </tr>
 @endif
@endforeach
</tbody>
</table>

    </div>
    </div>
    </div>
    <table class="table table-striped" >
  <thead>
    <tr>
      
      <th scope="col">Documento</th>
      <th scope="col">Version</th>
    

    </tr>
  </thead>
  <tbody>
@foreach($doc as $d)
 @if($d->directorio==2.1)  
     <td>{{$d->nombre}}</td>
  @if( $d->deleted_at != null )
     <td><button type="button" class="btn btn-primary">Anterior</button> </td>
     @else
     <td><button type="button" class="btn btn-success">Actual</button> </td>
  @endif 
  </tr>
 @endif
@endforeach
</tbody>
</table>

  </div>
  </div>
  </div>
  <table class="table table-striped" >
  <thead>
    <tr>
      
      <th scope="col">Documento</th>
      <th scope="col">Version</th>
    

    </tr>
  </thead>
  <tbody>
@foreach($doc as $d)
 @if($d->directorio==2)  
     <td>{{$d->nombre}}</td>
  @if( $d->deleted_at != null )
     <td><button type="button" class="btn btn-primary">Anterior</button> </td>
     @else
     <td><button type="button" class="btn btn-success">Actual</button> </td>
  @endif 
  </tr>
 @endif
@endforeach
</tbody>
</table>

  </div>
  </div>


  </div>
  </div>


<!--- FIN SECCIÓN 2 ------------------------------------------------------------------------------>



















<!---SECCIÓN 3 ------------------------------------------------------------------------------>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">3 Nivel  Procedimientos</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
      <!--SECCION 3.1-------------------------->
      <div id="accordion">
<div class="card">
  <div class="card-header" id="headingThree">
    <h5 class="mb-0">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#secciontresuno" aria-expanded="false" aria-controls="secciontresuno">
      Proc. Apoyo 07-13
      </button>
      
    </h5>
  </div>
  <div id="secciontresuno" class="collapse" aria-labelledby="headingThree" >
    <div class="card-body">
    <table class="table table-striped" >
  <thead>
    <tr>
      
      <th scope="col">Documento</th>
      <th scope="col">Version</th>
    

    </tr>
  </thead>
  <tbody>
@foreach($doc as $d)
 @if($d->directorio==3.1)  
     <td>{{$d->nombre}}</td>
  @if( $d->deleted_at != null )
     <td><button type="button" class="btn btn-primary">Anterior</button> </td>
     @else
     <td><button type="button" class="btn btn-success">Actual</button> </td>
  @endif 
  </tr>
 @endif
@endforeach
</tbody>
</table>

    </div>
  </div>
</div>
</div>  <!-- FIN SECCION 3.1--------------------------> 
 <!--SECCION 3.2-------------------------->
<div id="accordion">
<div class="card">
  <div class="card-header" id="headingThree">
    <h5 class="mb-0">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#secciontresdos" aria-expanded="false" aria-controls="secciontresdos">
      Proc. Normativos del 01-04
      </button>
      
    </h5>
  </div>
  <div id="secciontresdos" class="collapse" aria-labelledby="headingThree" >
    <div class="card-body">
    <table class="table table-striped" >
  <thead>
    <tr>
      
      <th scope="col">Documento</th>
      <th scope="col">Version</th>
    

    </tr>
  </thead>
  <tbody>
@foreach($doc as $d)
 @if($d->directorio==3.2)  
     <td>{{$d->nombre}}</td>
  @if( $d->deleted_at != null )
     <td><button type="button" class="btn btn-primary">Anterior</button> </td>
     @else
     <td><button type="button" class="btn btn-success">Actual</button> </td>
  @endif 
  </tr>
 @endif
@endforeach
</tbody>
</table>

    </div>
  </div>
</div>
</div><!-- FIN SECCION 3.2-------------------------->
    </div>
    </div>
<!---FIN SECCIÓN 3 ------------------------------------------------------------------------------>
<!---SECCIÓN 4 ------------------------------------------------------------------------------>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">4 Nivel Intructivos de Trabajo</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
         <!--contenido 2----->
<<table class="table table-striped" >
  <thead>
    <tr>
      
      <th scope="col">Documento</th>
      <th scope="col">Version</th>
    

    </tr>
  </thead>
  <tbody>
@foreach($doc as $d)
 @if($d->directorio==4)  
     <td>{{$d->nombre}}</td>
  @if( $d->deleted_at != null )
     <td><button type="button" class="btn btn-primary">Anterior</button> </td>
     @else
     <td><button type="button" class="btn btn-success">Actual</button> </td>
  @endif 
  </tr>
 @endif
@endforeach
</tbody>
</table>

 <!-- fin contenido 2----------------------------->
      </div>
    </div>
<!---FIN SECCIÓN 4 ------------------------------------------------------------------------------>
<!---SECCIÓN 5 ------------------------------------------------------------------------------>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">5 Nivel Formatos y Registros</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
          <!--SECCION 5.1-------------------------->
          <div id="accordion">
<div class="card">
  <div class="card-header" id="headingThree">
    <h5 class="mb-0">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#seccioncincouno" aria-expanded="false" aria-controls="seccioncincouno">
      FORMATOS
      </button>
      
    </h5>
  </div>
  <div id="seccioncincouno" class="collapse" aria-labelledby="headingThree" >
    <div class="card-body">
    <table class="table table-striped" >
  <thead>
    <tr>
      
      <th scope="col">Documento</th>
      <th scope="col">Version</th>
    

    </tr>
  </thead>
  <tbody>
@foreach($doc as $d)
 @if($d->directorio==5.1)  
     <td>{{$d->nombre}}</td>
  @if( $d->deleted_at != null )
     <td><button type="button" class="btn btn-primary">Anterior</button> </td>
     @else
     <td><button type="button" class="btn btn-success">Actual</button> </td>
  @endif 
  </tr>
 @endif
@endforeach
</tbody>
</table>

    </div>
  </div>
</div>
</div>  <!-- FIN SECCION 5.1--------------------------> 
 <!--SECCION 5.2-------------------------->
<div id="accordion">
<div class="card">
  <div class="card-header" id="headingThree">
    <h5 class="mb-0">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#seccioncincodos" aria-expanded="false" aria-controls="seccioncincodos">
      Formatos Proc. Normativos
      </button>
      
    </h5>
  </div>
  <div id="seccioncincodos" class="collapse" aria-labelledby="headingThree" >
    <div class="card-body">
    <table class="table table-striped" >
  <thead>
    <tr>
      
      <th scope="col">Documento</th>
      <th scope="col">Version</th>
    

    </tr>
  </thead>
  <tbody>
@foreach($doc as $d)
 @if($d->directorio==5.2)  
     <td>{{$d->nombre}}</td>
  @if( $d->deleted_at != null )
     <td><button type="button" class="btn btn-primary">Anterior</button> </td>
     @else
     <td><button type="button" class="btn btn-success">Actual</button> </td>
  @endif 
  </tr>
 @endif
@endforeach
</tbody>
</table>

    </div>
  </div>
</div>
</div><!-- FIN SECCION 5.2-------------------------->
      </div>
    </div>
<!--- FIN SECCIÓN 5 ------------------------------------------------------------------------------>
  </div> 

  <!-- 
  <body>
     <header>
         <h2 class="text-center text-light"><span class="badge badge-danger">Sweet Alert 2</span></h2> 
     </header>    	
      
    <div class="container">
        
     <button id="btn0">alert</button>
        
        <div class="row">
        <div class="col-lg-3">
            <button id="btn1" class="btn btn-outline-primary btn-lg btn-block">Básico</button>
            <button id="btn2" class="btn btn-outline-secondary btn-lg btn-block">Tipos de popup</button>      
        </div>

        <div class="col-lg-3">
            <button id="btn3" class="btn btn-outline-success btn-lg btn-block">Con Imagen</button>
            <button id="btn4" class="btn btn-outline-danger btn-lg btn-block">Con Posición en centro</button>      
        </div>

        <div class="col-lg-3">
            <button id="btn5" class="btn btn-success btn-lg btn-block">Animada</button>
            <button id="btn6" class="btn btn-primary btn-lg btn-block">Cambiando el fondo</button>      
        </div>

        <div class="col-lg-3">
            <button id="btn7" class="btn btn-info btn-lg btn-block">Progresivo</button>
            <button id="btn8" class="btn btn-danger btn-lg btn-block">Timer</button>      
        </div>
        </div>
    </div>
      
      
    <script src="{{ asset('/public/js/codigo.js') }}"></script>
    <script src="{{ asset('/public/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/public/plugins/sweetAlert2/sweetalert2.all.min.js') }}"></script> 
	
  </body>
</html>
-->
