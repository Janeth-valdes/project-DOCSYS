
@include('partials.nav')
  <!-- csrf-token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
<div align="center">Consulta documentos</div>
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
      <th scope="col">Ver</th>
      @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
      <th scope="col">Eliminar</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $d)
    <tr>
    @if($d->directorio==1)
     <td>{{$d->nombre}}</td>
     <td ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$d->id_documento}}">Ver</button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter{{$d->id_documento}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header" width="150%">
    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">

    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
   
    </div>
    </div>
    </div>
    </div>
    </td>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td >
    <form action="{{route('desactivardoc',$d->id_documento)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_documento }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">
        
                
    </form>
    <!--<a href="{{ route('desactivardoc',['id'=>$d->id_documento]) }}" class="alert-eliminar" type="submit"><i class="fa-solid fa-trash-can"></i>--></a>
    </td>
    @endif
    @endif
  </tr>
    @endforeach
   <!-- <a target="_blank" href="{{asset('public/documentosv/Reporte1.pdf')}}">PDF</a>-->
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
    <th scope="col">Ver</th>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <th scope="col">Eliminar</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach($datos as $d)
  <tr>
  @if($d->directorio==2.2)
  <td>{{$d->nombre}}</td>
  <td ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter23{{$d->id_documento}}">Ver</button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter23{{$d->id_documento}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header" width="150%">
    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
   
    </div>
    </div>
    </div>
    </div>
    </td>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td >
    <form action="{{route('desactivardoc',$d->id_documento)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_documento }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">
        
                
    </form>
    <!--<a href="{{ route('desactivardoc',['id'=>$d->id_documento]) }}" class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i></a>--></td>
      @endif
    @endif
</tr>
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
    <th scope="col">Ver</th>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <th scope="col">Eliminar</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach($datos as $d)
  <tr>
  @if($d->directorio==2.1)
  <td>{{$d->nombre}}</td>
  <td ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter22{{$d->id_documento}}">Ver</button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter22{{$d->id_documento}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header" width="150%">
    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
   
    </div>
    </div>
    </div>
    </div>
    </td>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td >
    <form action="{{route('desactivardoc',$d->id_documento)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_documento }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">         
    </form>
    <!--<a href="{{ route('desactivardoc',['id'=>$d->id_documento]) }}" class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i></a>-->
    </td>
    @endif
    @endif
</tr>
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
    <th scope="col">Ver</th>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <th scope="col">Eliminar</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach($datos as $d)
  <tr>
  @if($d->directorio==2)
  <td>{{$d->nombre}}</td>
  <td ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter21{{$d->id_documento}}">Ver</button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter21{{$d->id_documento}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header" width="150%">
    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
   
    </div>
    </div>
    </div>
    </div>
    </td>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td >
    <form action="{{route('desactivardoc',$d->id_documento)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_documento }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">         
    </form>
    <!--<a href="{{ route('desactivardoc',['id'=>$d->id_documento]) }}" class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i></a>-->
   </td>
    @endif
    @endif
</tr>
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
    <th scope="col">Ver</th>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <th scope="col">Eliminar</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach($datos as $d)
  <tr>
  @if($d->directorio==3.1)
  <td>{{$d->nombre}}</td>
  <td ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter31{{$d->id_documento}}">Ver</button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter31{{$d->id_documento}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header" width="150%">
    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
   
    </div>
    </div>
    </div>
    </div>
    </td>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td >
    <form action="{{route('desactivardoc',$d->id_documento)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_documento }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">         
    </form>
    <!--<a href="{{ route('desactivardoc',['id'=>$d->id_documento]) }}" class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i></a>-->
    </td>
    @endif
    @endif
</tr>
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
    <th scope="col">Documento </th>
    <th scope="col">Ver</th>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <th scope="col">Eliminar</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach($datos as $d)
  <tr>
  @if($d->directorio==3.2)
  <td>{{$d->nombre}}</td>
  <td ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter32{{$d->id_documento}}">Ver</button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter32{{$d->id_documento}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header" width="150%">
    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
   
    </div>
    </div>
    </div>
    </div>
    </td>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td >
    <form action="{{route('desactivardoc',$d->id_documento)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_documento }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">         
    </form>
    <!--<a href="{{ route('desactivardoc',['id'=>$d->id_documento]) }}" class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i></a>-->
    </td>
      @endif
    @endif
</tr>
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
<table class="table table-striped" >
<thead>
  <tr>
    <th scope="col">Documento</th>
    <th scope="col">Ver</th>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <th scope="col">Eliminar</th>
      @endif
  </tr>
</thead>
<tbody>
  @foreach($datos as $d)
  <tr>
  @if($d->directorio==4)
  <td>{{$d->nombre}}</td>
  <td ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter41{{$d->id_documento}}">Ver</button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter41{{$d->id_documento}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header" width="150%">
    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
   
    </div>
    </div>
    </div>
    </div>
    </td>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td >
    <form action="{{route('desactivardoc',$d->id_documento)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_documento }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">         
    </form>
    <!--<a href="{{ route('desactivardoc',['id'=>$d->id_documento]) }}" class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i></a>-->
    </td>
    @endif
    @endif
</tr>
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
    <th scope="col">Ver</th>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <th scope="col">Eliminar</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach($datos as $d)
  <tr>
  @if($d->directorio==5.1)
  <td>{{$d->nombre}}</td>
  <td ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter51{{$d->id_documento}}">Ver</button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter51{{$d->id_documento}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header" width="150%">
    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
   
    </div>
    </div>
    </div>
    </div>
    </td>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td >
    <form action="{{route('desactivardoc',$d->id_documento)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_documento }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">         
    </form>
    <!--<a href="{{ route('desactivardoc',['id'=>$d->id_documento]) }}" class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i></a>-->
    </td>
      @endif
    @endif
</tr>
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
    <th scope="col">Documento </th>
    <th scope="col">Ver</th>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <th scope="col">Eliminar</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach($datos as $d)
  <tr>
  @if($d->directorio==5.2)
  <td>{{$d->nombre}}</td>
  <td ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter52{{$d->id_documento}}">Ver</button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter52{{$d->id_documento}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header" width="150%">
    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
   
    </div>
    </div>
    </div>
    </div>
    </td>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td >
    <form action="{{route('desactivardoc',$d->id_documento)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_documento }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">         
    </form>
    <!--<a href="{{ route('desactivardoc',['id'=>$d->id_documento]) }}" class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i></a>-->
    </td>
      @endif
    @endif
</tr>
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
 
  <script src="{{ asset('/public/js/alertas.js') }}"></script>

