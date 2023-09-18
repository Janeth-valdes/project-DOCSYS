@include('partials.nav')

  <!--/////////////////////////////////////////////////////////INSERTAR /////////////////////////////////////////////////////////////////////// -->
  @if( $seccion == 1 )
 
  @if( $datos->tipo_reunion == 'Reunion calidad')
  <!--<form accept-charset="utf-8" method="POST" id="enviarimagenes" enctype="multipart/form-data" >
  @csrf
<label>Titulo</label><br>
<input type="text" name="titulo" />
<br><br>
<label>Descripcion</label><br>
<textarea name="descripcion"></textarea>
<br><br>
<input type="file" name="imagen"/>
<br><br>
<button type="submit">ENVIAR</button>
</form>

<hr>
<div id="mensaje"></div>
<hr>
<script>
$("#enviarimagenes").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("enviarimagenes"));
  console.log("entro")
	$.ajax({
		url: "{{route('EnvioMinuta')}}",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(echo){
		$("#mensaje").html(echo);
	});
});
</script>-->

  <div align="center">Registro minuta</div>
  <br>
  <div class="container">
  <form action="{{route('EnvioMinuta')}}" method="POST"  enctype="multipart/form-data">
 
  @csrf

  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Minuta número:</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" name="n_reunion" value="{{$query->id}}" readonly>
  </div>
  </div>

  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Asunto:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="asunto" value="{{old('asunto')}}">
    @error('asunto')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>


  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Lugar:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="lugar" value="{{old('lugar')}}">
    @error('lugar')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>

  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Fecha:</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" name="fecha" value="{{old('fecha')}}">
    @error('fecha')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>


  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Duración:</label>
    <div class="col-sm-10">
    <input type="time" class="form-control" name="duracion" value="{{old('duracion')}}">
    @error('duracion')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>


  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Participantes:</label>
      <div class="col-sm-10">
      <select class="form-control" id="select" name="participantes[]" multiple data-live-search="true" title="Seleccionar" >
      @foreach( $usuarios as $us )
      <option value="{{$us->id_usuario}}">{{$us->nombres}}&nbsp{{$us->ap_paterno}}</option>
      @endforeach
      </select>
      <br>
      @error('participantes')
      <br>
      <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
      </div>
      @enderror
      </div>
  </div>
   
  <br>
  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Evidencia</label>
  <div class="col-sm-10">
  <input type="file"class="form-control-file" onchange="previewFile()"  name="evidencia"><br>
  <div  width="25%" height="auto"><embed src="" type="application/pdf" /></div>
 <!-- <form>
      <input type="button" onclick="mostrar()" class="add-to-cart" value="Anadir a compra" />
      <link rel="stylesheet" href="estilos.css">


</form>
      <div id="alerta">
          <p>Su articulo se ha anadido</p>
      </div>
  </div>
  </div>-->
 
  <div class="form-group row" align ="center">
    
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
    <div align="center">Editar minuta</div>
  <br>
  <div class="container">
  <form action="{{route('actualizarmin')}}" method="POST"  enctype="multipart/form-data">
  @csrf
  <input type="hidden"  name="id_minuta" value="{{$datos->id_minuta}}"  class="form-control" hidden/>

  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Número de Reunion:</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" name="n_reunion" value="{{$n_reunion}}"readonly>
  </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Asunto:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="asunto" value="{{old('asunto',$asunto)}}"  >
    @error('asunto')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Lugar:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="lugar" value="{{old('lugar',$lugar)}}">
    @error('lugar')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Fecha:</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" name="fecha" value="{{old('fecha',$fecha)}}">
    @error('fecha')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Duración:</label>
    <div class="col-sm-10">
    <input type="time" class="form-control" name="duracion" value="{{old('duracion',$duracion)}}">
    @error('duracion')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
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
  echo '<embed src="data:image/jpeg;base64,'.base64_encode($blobd) .' " width="25%"/>';
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
    <a href="{{route('consultaminu')}}" class="btn btn-danger" type="button">Regresar</a>
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
  <script type="text/javascript">
    $(document).ready(function(){
      $('#select').selectpicker();
    });
</script>