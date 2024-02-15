
<!DOCTYPE html>
<html >
<head>
<meta charset="utf-8">

       <title>DOCSYS</title>
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
       <script src="https://kit.fontawesome.com/f1115874dc.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <style>
 .box {
  background-color: #EAEDED ;
  /*border: 5px solid darkblue;*/
  border: 5px;
  width: 450px;
  margin: 7%;
  padding: 3%;
  margin-left: 34%;
}
</style>

</head>
<body>

<div class="box">

<!--comentada en produccion <form action="https://catgem.edomex.gob.mx/Docsys/login1" method="post">-->
  <form action="{{route('login1')}}" method="post" autocomplete="off"> 
  @csrf
  <div align="center"> <FONT COLOR="GREEN" style="font-weight: 999;" SIZE="6" align="center"> DOCSYS </FONT></div>


<div>
<i class="fa-solid fa-user"></i> <input name="usuario" id="contraseña" type="text" class="form-control" placeholder="Ususario" autofocus>
@error('usuario')
        <br>
        <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
        </div>
      @enderror
</div>
<br>
<div >
<i class='fas fa-key'></i> <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" >
@error('contrasena')
        <br>
        <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
        </div>
      @enderror
</div> 
<br>
<div >
   <input type="hidden" name="_token" value="{{ csrf_token() }}" />
   <button type="submit" name="login" class="btn btn-success" style="width: 100%;"> Acceder</button>
  
  <!-- <a href="{{route('/')}}" >Iniciar sesión</a>
</div>
<!--<div class="clearfix">
<label class="pull-left checkbox-inline"><input type="checkbox"> Recordarme</label>
</div>        -->
</form>
</div>

</body>
</html>