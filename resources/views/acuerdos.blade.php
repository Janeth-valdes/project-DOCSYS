@include('partials.nav')

<style>
 .dp{
   border: 5px solid darkblue;
  width: 300px;
  margin: 10%;
  padding: 10%;
}
</style>
  <!--/////////////////////////////////////////////////////////INSERTAR /////////////////////////////////////////////////////////////////////// -->
    @if( $seccion == 1 )
    @if( $datos->tipo_reunion == 'Reunion calidad')
   

<div align="center">Registra acuerdos</div>
  <br>
<div class="container">
<form action="{{route('EnvioAcuerdos')}}" method="POST" enctype="multipart/form-data">

  @csrf

    <!--<div class="form-group row">
  <label  class="col-sm-2 col-form-label">Número de Reunión:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="n_acuerdo" value="{{$query->id}}" readonly>
    </div>
  </div>-->
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">No. Acuerdo:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="n_acuerdo" value="{{$query->id}}" readonly>
    </div>
  </div>
  
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Fecha:</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" name="fecha" value="{{old('fecha')}}" >
    @error('fecha')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#select').selectpicker();
    });
</script>

  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Responsable:</label>
    <div class="col-sm-10">
     <!-- <textarea type="text" class="form-control" name="responsable" rows="1"></textarea>-->
      <select class="form-control" id="select" name="responsable[]" multiple data-live-search="true" title="Seleccionar" >
        @foreach( $usuarios as $us )
        <option value="{{$us->id_usuario}}" >{{$us->nombres}}&nbsp{{$us->ap_paterno}}</option>
        @endforeach
      </select>
      <br>
      @error('responsable')
      <br>
      <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
      </div>
      @enderror
      </div>
  </div>
  
  
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Descripción:</label>
    <div class="col-sm-10">
    <textarea class="form-control" name="descripcion" rows="3">{{old('descripcion')}}</textarea>
    @error('descripcion')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
 

  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Decisión/Acuerdo:</label>
    <div class="col-sm-10">
    <textarea class="form-control" name="DA" rows="3">{{old('DA')}}</textarea>
    @error('DA')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Estatus: </label>
    <div class="col-sm-10">
    <select  class="form-control" name="estatus">
      <option value="Proceso">Proceso</option>
      <option value="Finalización">Finalización</option>
    </select>
    </div>
  </div>

  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Evidencia</label>
    <div class="col-sm-10">
    <input type="file"class="form-control-file" onchange="previewFile()"  name="evidenciaA"><br>
    <div  width="25%" height="auto"><embed src="" type="application/pdf" /></div>
    </div>
  </div>

    <div class="form-group row" align ="center">
    
   <!-- <button type="submit" class="btn btn-success">Guardar</button>-->
   <button type="button" class="btn btn-success" onclick="saveconfirm();">Registrar </button>
   <button type="submit" id="btnSend" style="display: none"></button>
    <button type="reset"  class="btn btn-danger">Cancelar</button>
  
  </div>
</form>
  </div>
  @else
  <br>
  <br>
  <div class="container" align="center" style="width: 700px;">
  <div class="alert alert-danger" role="alert">
  <p><h4 class="alert-heading">¡No se encuentra creada la reunion de calidad!</h4></p>
  <hr>
  <p class="mb-0">Ir a reunion <a href="{{route('reunion')}}"><button type="button" class="btn btn-danger"><i class="fa-solid fa-arrows-to-circle"></i></button></a></p>
</div>
  </div>
  @endif
  
  @endif
    <!--/////////////////////////////////////////////////////////Modificacion /////////////////////////////////////////////////////////////////////// -->
    @if( $seccion == 2 )
   
    <div align="center">Editar acuerdos</div>
  <br>
<div class="container">
<form action="{{route('actualizarac')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <input  name="id_acuerdo" value="{{$datos->id_acuerdo}}"  class="form-control" type="hidden"/>

  
  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Minuta:</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" name="n_acuerdo" value="{{$n_acuerdo}}" readonly>
  </div>
  </div>
  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Fecha:</label>
  <div class="col-sm-10">
  <input type="date" class="form-control" name="fecha" value="{{old('fecha',$fecha)}}" >
    @error('fecha')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
  </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Responsable:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="responsable" value="{{old('responsable',$responsable)}}">
    @error('responsable')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Descripción:</label>
    <div class="col-sm-10">
    <div class="box">
    <textarea class="form-control" name="descripcion" rows="3">{{old('descripcion',$descripcion)}}</textarea>
    @error('descripcion')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
    </div>
  </div>
 

  <div class="form-group row" class="dp">
    <label  class="col-sm-2 col-form-label">Decisión/Acuerdo:</label>
    <div class="col-sm-10">
    <div class="box">
    <textarea class="form-control" name="DA"  rows="3">{{old('DA',$DA)}}</textarea>
    @error('DA')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
    </div>
  </div>


  <style>
 .box {
  border: 0px solid darkblue;
  
  width: 580px;
}
  </style>
 

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Estatus: </label>
    <div class="col-sm-10">
    <select class="form-control" name="estatus">
    <option value="{{$datos->estatus}}" selected readonly><b>{{$datos->estatus}}</b></option>
    @if( $datos->estatus != 'Proceso' && $datos->estatus != 'Finalizacion')
      <option value="Proceso">Proceso</option>
      <option value="Finalizacion">Finalización</option>
    @elseif($datos->estatus == 'Proceso')
      <option value="Finalizacion">Finalización</option>
    @else
      <option value="Proceso">Proceso</option>
                            @endif
    </select>
    </div>
  </div>
  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Evidencia</label>
    <div class="col-sm-10">
    <input type="file" class="form-control-file" onchange="previewFile()"  name="evidencia" >
    <br>
    @if($tipo == "")
    <h1>No hay nada</h1>
    @endif
    @if($tipo == 'application/pdf')
  <?php
  echo '<embed src="data:application/pdf;base64,'.base64_encode($blobd) .' "height="200px" width="30%"/>';?>
@elseif($tipo == 'application/jpeg')
  <?php
  echo ' <img  src="data:image/jpeg;base64,'.base64_encode($blobd) .' " width="25%"/>';
 
  ?>
@else
<?php
  echo '<embed src="data:image/png;base64,'.base64_encode($blobd) .' "  width="25%"/>';
  ?>
@endif
<br>
   
    </div>
  </div>
  <div class="form-group row" align ="center">
  <button type="button" class="btn btn-success" onclick="updateconfirm();">Actualizar </button>
  <button type="submit" id="btnupdate" style="display: none"></button>
    <a href="{{route('consultaacue')}}" class="btn btn-danger" type="button">Regresar</a>
  </div>
</form>
  </div>


    @endif
    
    @if($seccion==3)
    <br>
  <br>
  <div class="container" align="center" style="width: 700px;">
  <div class="alert alert-danger" role="alert">
  <p><h4 class="alert-heading">¡No se encuentra creada la reunion de calidad!</h4></p>
  <hr>
  <p class="mb-0">Ir a reunion <a href="{{route('reunion')}}"><button type="button" class="btn btn-danger"><i class="fa-solid fa-arrows-to-circle"></i></button></a></p>
</div>
  </div>
  @endif

 