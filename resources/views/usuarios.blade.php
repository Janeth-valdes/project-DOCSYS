@include('partials.nav')
<!--/////////////////////////////////////////////////////////INSERTAR /////////////////////////////////////////////////////////////////////// -->
@if( $seccion == 1 )
<div align="center">Registra usuario</div>
  <br>
<div class="container">
<form action="{{route('EnvioUsuarios')}}" method="POST">
  @csrf

  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Nombres:</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" name="nombres" value="{{old('nombres')}}">
    @error('nombres')
      <br>
      <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
      </div>
    @enderror
  </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Apellido paterno:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="ap_paterno" value="{{old('ap_paterno')}}">
    @error('ap_paterno')
      <br>
      <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
      </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Apellido materno:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="ap_materno" value="{{old('ap_materno')}}">
    @error('ap_materno')
      <br>
      <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
      </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Usuario:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="usuarioo" value="{{old('usuarioo')}}" >
    @error('usuarioo')
      <br>
      <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
      </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Contraseña</label>
    <div class="col-sm-10">
    <input type="password" class="form-control" name="contrasena" value="{{old('contrasena')}}" >
    @error('contrasena')
      <br>
      <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
      </div>
    @enderror
    </div>
  </div>
  
  <div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Departamento:</label>
    <div class="col-sm-10">
    <select class="form-control" name="rol">
    @foreach($datosrol as $rol)
    <option value="{{$rol->id_rol}}">{{$rol->nom_area}}</option>
    @endforeach
    </select>
    @error('rol')
      <br>
      <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
      </div>
    @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Nivel escolar:</label>
    <div class="col-sm-10">
    <select class="form-control" name="gestudios">
    @foreach($g_estudios as $es)
    <option value="{{$es->id_ge}}">{{$es->nombre}}</option>
    @endforeach
    </select>
    @error('gestudios')
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
@endif
    <!--/////////////////////////////////////////////////////////Modificacion /////////////////////////////////////////////////////////////////////// -->
    @if( $seccion == 2 )
    <div align="center">Editar usuario</div>
  <br>
<div class="container">
<form action="{{route('actualizarus')}}" method="POST">
  @csrf
  <input type="hidden"  name="id_usuario" value="{{$datos->id_usuario}}"  class="form-control">

  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Nombres:</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" name="nombres" value="{{old('nombres',$datos->nombres)}}" >
    @error('nombres')
      <br>
      <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
      </div>
    @enderror
  </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Apellido paterno:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="ap_paterno" value="{{old('ap_paterno',$datos->ap_paterno)}}" >
      @error('ap_paterno')
        <br>
        <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Apellido materno:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="ap_materno" value="{{old('ap_materno',$datos->ap_materno)}}" >
      @error('ap_materno')
        <br>
        <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Usuario:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="usuarioo" value="{{old('usuarioo',$datos->usuario)}}" >
      @error('usuarioo')
        <br>
        <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
  <label  class="col-sm-2 col-form-label">Contraseña</label>
    <div class="col-sm-10">
    <input type="password" class="form-control" name="contrasena" value="{{old('contrasena',$datos->contrasena)}}" >
      @error('contrasena')
        <br>
        <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
        </div>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Departamento:</label>
    <div class="col-sm-10">
    <select class="form-control" name="rol">
    <option value="{{$datos->id_rol}}" selected readonly>{{$datos->nom_area}}</option>
      @foreach( $datos2 as $d2)
        @if( $datos->id_rol != $d2->id_rol)
        <option value="{{$d2->id_rol}}">{{$d2->nom_area}}</option>
        @endif
      @endforeach
    </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Nivel escolar:</label>
    <div class="col-sm-10">
    <select class="form-control" name="gestudios">
    <option value="{{$datos->id_ge}}" selected readonly>{{$datos->nombre}}</option>
      @foreach( $datos3 as $d3)
        @if( $datos->id_ge != $d3->id_ge)
        <option value="{{$d3->id_ge}}">{{$d3->nombre}}</option>
        @endif
      @endforeach
    </select>
    </div>
  </div>
  <div class="form-group row" align ="center">
    
  <button type="button" class="btn btn-success" onclick="updateconfirm();">Actualizar </button>
  <button type="submit" id="btnupdate" style="display: none"></button>
      <a href="{{route('consultausu')}}" class="btn btn-danger" type="button">Regresar</a>
    </div>
</form>
@endif