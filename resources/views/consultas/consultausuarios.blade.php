
@include('partials.nav')
<div align="center">Consulta usuarios</div>
 <br>
 <div class="container">
<div class="row">
<div class="col-lg-12">
  <br>
<table class="table table-striped" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellido paterno</th>
      <th scope="col">Apellido materno</th>
      <th scope="col">Usuario</th>
      <th scope="col">Departamento</th>
      <th scope="col">Nivel escolar</th>
     
    </tr>
  </thead>
  <tbody>
  @foreach($datos as $d)
    <tr>
    <td>{{$d->id_usuario}}</td>
    <td>{{$d->nombres}}</td>
    <td>{{$d->ap_paterno}}</td>
    <td>{{$d->ap_materno}}</td>
    <td>{{$d->usuario}}</td>
    <td>{{$d->nom_area}}</td>
    <td>{{$d->nombre}}</td>
    <td ><a href="{{ route('modificarus',['id'=>$d->id_usuario]) }}"  class="btn btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a></td>
    <td >
    <form action="{{route('desactivarus',$d->id_usuario)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_usuario }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">         
    </form>
    <!--<a href="{{ route('desactivarus',['id'=>$d->id_usuario]) }}" class="btn btn-danger"  type="button"><i class="fa-solid fa-trash-can"></i></a>-->
    </td>
    </tr>
    @endforeach

   <!-- <a target="_blank" href="{{asset('public/documentosv/Reporte1.pdf')}}">PDF</a>-->
   
  </tbody>
</table>

</div>
</div>
</div>

<script src="{{ asset('/public/js/alertas.js') }}"></script>