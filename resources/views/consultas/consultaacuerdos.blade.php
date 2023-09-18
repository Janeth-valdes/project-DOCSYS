
@include('partials.nav')
<div align="center">Consulta acuerdos</div>
<br>
<br>
<div class="container">
            <form action="" method="post" class="row g-3">
            @csrf

                <div class="col-md-2">
                    <label for="">Núm. minuta:</label>
                    <select name="minuta" class="form-control" id="">
                        <option disabled value="0" selected readonly>Seleccionar</option>
                        @foreach( $datos as $ob )
                            <option value="{{$ob->id_acuerdo}}">{{$ob->n_acuerdo}}</option>
                        @endforeach
                    </select>
                </div>
        

                <div class="col-md-2">
                    <label for="" class="form-label">Fecha:</label>
                    <input type="date" name="fecha2" class="form-control" id=""/>
                </div>
                <div class="col-md-2">
                    <label for="">Estatus:</label>
                    <select name="" class="form-control" >
                    <option disabled value="0" selected readonly>Seleccionar</option>
                            <option value="1" >Proceso</option>
                            <option value="2" >Concluido</option>
                            
                          </select>
                </div>
                <div class="col-md-2">
                <br>
                <button class="btn btn-primary" type="submit">BUSCAR</button>
                </div>

            </form>
</div>
 <br>
 <div class="container">
<div class="row">
<div class="col-lg-12">
  <br>
<table class="table table-striped" >
  <thead>
    <tr>
      <th scope="col">Núm. acuerdo</th>
      <th scope="col">Minuta</th>
      <th scope="col">Fecha</th>
      <th scope="col">Responsable</th>
      <th scope="col">Descripción</th>
      <th scope="col">Evidencia</th>
      <th scope="col">Estatus</th>
      @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
     @endif
     
    </tr>
  </thead>
  <tbody>
  @foreach($datos as $d)
    <tr>
    <td>{{$d->id_acuerdo}}</td>
    <td>{{$d->n_acuerdo}}</td>
    <td>{{$d->fecha}}</td>
    <td>{{$d->responsable}}</td>
    <td>{{$d->descripcion}}</td>
   <!-- <td><img class="group list-group-image" src="public/evidencia-acuerdos/{{$d->evidencia}}"  alt=""  width="100" height="100" /></td>-->
   <td >
   @if($d->evidencia !=null) 
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$d->id_acuerdo}}">Ver</button>
   @endif
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter{{$d->id_acuerdo}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header" width="150%">
    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">

    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verevia',['ida'=>$d->id_acuerdo]) }}"></object>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
   
    </div>
    </div>
    </div>
    </div>
    </td>
    <td>{{$d->estatus}}</td>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td ><a href="{{ route('modificarac',['id'=>$d->id_acuerdo]) }}"  class="btn btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a></td>
    <td >
    <form action="{{route('desactivarac',$d->id_acuerdo)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_acuerdo }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">
        
                
    </form>
  
   <!-- <a href="{{ route('desactivarac',['id'=>$d->id_acuerdo]) }}" class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i></a>--></td>
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