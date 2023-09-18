@include('partials.nav')

<!--/////////////////////////////////////////////////////////INSERTAR /////////////////////////////////////////////////////////////////////// -->
  @if( $seccion == 1 )
<div align="center">Registro mejora</div>
  <br>
<div class="container">
<form action="{{route('EnvioMejora')}}" method="POST">

@csrf
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
    <label  class="col-sm-2 col-form-label">Nombre:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
    @error('nombre')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Diagnostico:</label>
    <div class="col-sm-10">
    <textarea class="form-control" name="diagnostico" rows="3">{{old('diagnostico')}}</textarea>
    @error('diagnostico')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Mejora:</label>
    <div class="col-sm-10">
    <textarea class="form-control" name="mejora" rows="3">{{old('mejora')}}</textarea>
    @error('mejora')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Efectos</label>
    <div class="col-sm-10">
    <textarea class="form-control" name="efectos" rows="3">{{old('efectos')}}</textarea>
    @error('efectos')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  
  <div class="form-group row" align ="center">
  <button type="button" class="btn btn-success" onclick="saveconfirm();">Registrar </button>
  <button type="submit" id="btnSend" style="display: none"></button>
    <button type="reset"  class="btn btn-danger">Cancelar</button>
  
  </div>
</form>
  </div>
  @endif
    <!--/////////////////////////////////////////////////////////Modificacion /////////////////////////////////////////////////////////////////////// -->
    @if( $seccion == 2 )

    <div align="center">Editar mejora</div>
  <br>
<div class="container">
<form action="{{route('actualizarme')}}" method="POST">
@csrf
<input type="hidden"  name="id_mejora" value="{{$datos->id_mejora}}"  class="form-control" hidden/>

  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Fecha:</label>
  <div class="col-sm-10">
  <input type="datetime-local" class="form-control" name="fecha" value="{{old('fecha',$datos->fecha)}}">
    @error('fecha')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
  </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Nombre:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="nombre" value="{{old('nombre',$datos->nombre)}}">
    @error('nombre')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Diagnostico:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="diagnostico" value="{{old('diagnostico',$datos->diagnostico)}}">
    @error('diagnostico')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Mejora:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="mejora" value="{{old('mejora',$datos->mejora)}}">
    @error('mejora')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Efectos</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="efectos" value="{{old('efectos',$datos->efectos)}}">
    @error('efectos')
    <br>
    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
    </div>
    @enderror
    </div>
  </div>
  
  <div class="form-group row" align ="center">
    
  <button type="button" class="btn btn-success" onclick="updateconfirm();">Actualizar </button>
  <button type="submit" id="btnupdate" style="display: none"></button>
    <a href="{{route('consultamej')}}" class="btn btn-danger" type="button">Regresar</a>
    
  
  </div>
</form>
  </div>

    @endif