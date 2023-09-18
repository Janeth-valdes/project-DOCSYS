
@include('partials.nav')
<div align="center">Consulta minutas</div>
 <br>
 <div class="container">
<div class="row">
<div class="col-lg-12">
  <br>
<table class="table table-striped" >
  <thead>
    <tr>
      <th scope="col">Núm. minuta</th>
      <th scope="col">Núm. de Reunion</th>
      <th scope="col">Asunto</th>
      <th scope="col">Lugar</th>
      <th scope="col">fecha</th>
      <th scope="col">Duración</th>
      <th scope="col">Participantes</th>
      <th scope="col">Evidencia</th>
      @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
     @endif
    </tr>
  </thead>
  <tbody>
  @foreach($datos as $d)
    <tr>
    <td>{{$d->id_minuta}}</td>
    <td>{{$d->n_reunion}}</td>
    <td>{{$d->asunto}}</td>
    <td>{{$d->lugar}}</td>
    <td>{{$d->fecha}}</td>
    <td>{{$d->duracion}}</td>

    <td>{{$d->participantes}}</td>
  
    <td >
    @if($d->evidencia !=null)
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$d->id_minuta}}">Ver</button>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter{{$d->id_minuta}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header" width="150%">
    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">

    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verevi',['idm'=>$d->id_minuta]) }}"></object>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
   
    </div>
    </div>
    </div>
    </div> 
    </td>
   
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td ><a href="{{ route('modificarminuta',['id'=>$d->id_minuta]) }}"  class="btn btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a></td>
    <td >
    <form action="{{route('desactivarmin',$d->id_minuta)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_minuta   }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">
        
                
    </form>  
    <!--<a href="{{ route('desactivarmin',['id'=>$d->id_minuta]) }}" class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i></a>--></td>
  @endif 
  </tr>
@endforeach
   <!-- <a target="_blank" href="{{asset('public/documentosv/Reporte1.pdf')}}">PDF</a>-->
   
  </tbody>
</table>

</div>
</div>
</div>
<script src="{{ asset('/public/js/alertas.js') }}"></script>