
@include('partials.nav')
<div align="center">Consulta mejoras</div>
 <br>
 <div class="container">
<div class="row">
<div class="col-lg-12">
  <br>
<table class="table table-striped" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fecha</th>
      <th scope="col">Nombre</th>
      <th scope="col">Diagnostico</th>
      <th scope="col">Mejora</th>
      <th scope="col">Efectos</th>
      @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
     @endif
    </tr>
  </thead>
  <tbody>
  @foreach($datos as $d)
    <tr>
    <td>{{$d->id_mejora}}</td>
    <td>{{$d->fecha}}</td>
    <td>{{$d->nombre}}</td>
    <td>{{$d->diagnostico}}</td>
    <td>{{$d->mejora}}</td>
    <td>{{$d->efectos}}</td>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td ><a href="{{ route('modificarme',['id'=>$d->id_mejora]) }}"  class="btn btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a></td>
    <td >
    <form action="{{route('desactivarme',$d->id_mejora)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_mejora }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">
        
                
    </form>
    <!--<a href="{{ route('desactivarme',['id'=>$d->id_mejora]) }}" class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i></a>--></td>
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