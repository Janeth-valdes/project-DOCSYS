@include('partials.nav')

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/public/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/plugins/sweetAlert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/public/css/boxFile.css') }}">
    <h1></h1>
<style>
 

  </style>

<script>
  function onLoadImage(files){
  console.log(files)
  if (files && files[0]) {
    document
      .getElementById('imgName')
      .innerHTML = files[0].name
  }
}
  </script>


<div align="center">Nuevo documento</div>
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
<div class="conteiner">
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">


  <div align="center"></div>
  <br>
  <div class="container">
    <!--class="alert-guardar"-->
  <form action="{{route('EnvioDocumento')}}" method="POST"  enctype="multipart/form-data">
  
@csrf
<br>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                  <label for="nombre" class="col-form-label col-sm-7">Nombre del documento:</label>
                  <div class="col-sm-11">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" tabindex="5" >
                    <br>
                    @error('nombre')
                    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
                    </div>
                    @enderror  
                  </div>
                </div>
            </div>

                <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="departamento" class="col-form-label col-sm-7">Selecciona departamento:</label>
                  <div class="col-sm-12">
                  <select class="form-control" id="select" name="rol[]" multiple data-live-search="true" title="Seleccionar" >
                  @foreach($roles as $rol)
                  <option  value="{{$rol->id_rol}}" >{{$rol->nom_area}}</option >
                  @endforeach
                  </select>
                  <br>
                  @error('rol')
                <br>
                <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
                </div>
                @enderror  
                 </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4" >
               <div class="form-group row" id="invoiceBox">
               <label for="documento" class="col-form-label col-sm-7">Selecciona archivo:</label>
               <label for="file" class="col-sm-11">
                 <div class="boxFile" data-text="Seleccionar archivo"><i class="fas fa-cloud-upload-alt"></i>
               </div>
               </label>
               <input id="prodId" name="directorio" type="hidden" value="1" >
               <input id="file" name="documento"  type="file"  accept="application/pdf,application" >
               <div class="col-sm-11">
                @error('documento')
                  <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
                  </div>
                @enderror  
               </div>
              </div>
           </div>
           

           <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="descripcion" class="col-form-label col-sm-7">Descripción:</label>
                  <div class="col-sm-11">
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ></textarea>
                  @error('descripcion')
                  <br>
                  <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
                  </div>
                  @enderror  
                </div>
                </div>
            </div>
        </div>

        <div class="form-group">
       <button type="submit"  class="btn btn-danger btn-lg"class="alert-eliminar" >Guardar</button>       
       <button type="reset" id="reset"  class="btn btn-light btn-lg">Cancelar</button>    
       
      </div>

<br>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--- FIN SECCIÓN 1 ------------------------------------------------------------------------------>

<!---SECCIÓN 2 ------------------------------------------------------------------------------>


<div class="panel panel-default">
<div  class="panel-heading" role="tab" id="headingOne">
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
       2.1 Anexos del Manual de Calidad
      </button>
        </h4>
</div>

<div id="collapseSubTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSubTwo">
      <div class="panel-body">
      <div class="panel panel-default">

<div role="tab" id="headingT">
      <h4 class="panel-title">
      <button class="btn btn-link collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseT" aria-expanded="false" aria-controls="collapseT">
     2.2 ANEXO 1 PLANES Y SECUENCIAS
      </button>
      </h4>
</div>


    <div id="collapseT" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingT">
    <div class="panel-body">
    <div align="center"></div>
  <br>
  <div class="container">
  <form action="{{route('EnvioDocumento')}}" method="POST" enctype="multipart/form-data">
  
  @csrf
  <br>
          <div class="row">
              <div class="col-xs-3 col-sm-3 col-md-3">
                  <div class="form-group row">
                    <label for="nombre" class="col-form-label col-sm-9">Nombre del documento:</label>
                    <div class="col-sm-11">
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" tabindex="5" >
                      @error('nombre')
                      <br>
                      <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
                      </div>
                      @enderror  
                    </div>
                  </div>
              </div>
  
                  <div class="col-xs-3 col-sm-3 col-md-3">
                  <div class="form-group row">
                      <label for="departamento" class="col-form-label col-sm-10">Selecciona departamento:</label>
                    <div class="col-sm-12">
                    <select class="form-control" id="select1" name="rol[]" multiple data-live-search="true" title="Seleccionar" >
                    @foreach($roles as $rol)
                    <option  value="{{$rol->id_rol}}" >{{$rol->nom_area}}</option >
                    @endforeach
                    </select>
                   </div>
                  </div>
              </div>
  
              <div class="col-xs-3 col-sm-3 col-md-3">
                 <div class="form-group row" id="invoiceBox">
                 <label for="documento" class="col-form-label col-sm-8">Selecciona archivo:</label>
                 <label for="file22" class="col-sm-11">
                   <div class="boxFile22" data-text="Seleccionar archivo">
                   <i class="fas fa-cloud-upload-alt"></i>
                 </div>
                 </label>
                 <input id="prodId" name="directorio" type="hidden" value="2.2" >
                 <input id="file22" name="documento"  type="file"  accept="application/pdf,application" >
              </div>
           </div>
           <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="descripcion" class="col-form-label col-sm-7">Descripción:</label>
                  <div class="col-sm-11">
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ></textarea>
                  </div>
                </div>
            </div>
        </div>

        <div class="form-group">
       <button type="submit"  class="btn btn-danger btn-lg">Guardar</button>       
       <button type="reset" id="reset22"  class="btn btn-light btn-lg">Cancelar</button>     
      </div> 
   
<br>
    </form>
  </div>
   
    </div>
    </div>
    </div>
    <div align="center"></div>
  <br>
  <div class="container">
  <form action="{{route('EnvioDocumento')}}" method="POST" enctype="multipart/form-data">
  
@csrf
<br>
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group row">
                  <label for="nombre" class="col-form-label col-sm-9">Nombre del documento:</label>
                  <div class="col-sm-11">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" tabindex="5" >
                    @error('nombre')
                    <br>
                    <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
                    </div>
                    @enderror  
                  </div>
                </div>
            </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group row">
                    <label for="departamento" class="col-form-label col-sm-10">Selecciona departamento:</label>
                  <div class="col-sm-12">
                  <select class="form-control" id="select2" name="rol[]" multiple data-live-search="true" title="Seleccionar" >
                  @foreach($roles as $rol)
                  <option  value="{{$rol->id_rol}}" >{{$rol->nom_area}}</option >
                  @endforeach
                  </select>
                 </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4" >
               <div class="form-group row" id="invoiceBox">
               <label for="documento" class="col-form-label col-sm-7">Selecciona archivo:</label>
               <label for="file21" class="col-sm-11">
                 <div class="boxFile21" data-text="Seleccionar archivo">
                 <i class="fas fa-cloud-upload-alt"></i>
               </div>
               </label>
               <input id="prodId" name="directorio" type="hidden" value="2.1" >
               <input id="file21" name="documento"  type="file"  accept="application/pdf,application"  >
              </div>
           </div>
           <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="descripcion" class="col-form-label col-sm-7">Descripción:</label>
                  <div class="col-sm-11">
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ></textarea>
                  </div>
                </div>
            </div>
        </div>

        <div class="form-group">
       <button type="submit"  class="btn btn-danger btn-lg">Guardar</button>       
       <button type="reset" id="reset21"  class="btn btn-light btn-lg">Cancelar</button>     
      </div> 
   
<br>
    </form>
  </div>
  </div>
  </div>
  </div>

  <div align="center"></div>
  <br>
  <div class="container">
  <form action="{{route('EnvioDocumento')}}" method="POST" enctype="multipart/form-data">
  
  @csrf
  <br>
          <div class="row">
              <div class="col-xs-3 col-sm-3 col-md-3">
                  <div class="form-group row">
                    <label for="nombre" class="col-form-label col-sm-9">Nombre del documento:</label>
                    <div class="col-sm-11">
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" tabindex="5" >
                      @error('nombre')
                      <br>
                      <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
                      </div>
                      @enderror  
                    </div>
                  </div>
              </div>
  
                  <div class="col-xs-3 col-sm-3 col-md-3">
                  <div class="form-group row">
                      <label for="departamento" class="col-form-label col-sm-10">Selecciona departamento:</label>
                    <div class="col-sm-12">
                    <select class="form-control" id="select3" name="rol[]" multiple data-live-search="true" title="Seleccionar" >
                    @foreach($roles as $rol)
                    <option  value="{{$rol->id_rol}}" >{{$rol->nom_area}}</option >
                    @endforeach
                    </select>
                   </div>
                  </div>
              </div>
  
              <div class="col-xs-4 col-sm-4 col-md-4" >
               <div class="form-group row" id="invoiceBox">
               <label for="documento" class="col-form-label col-sm-7">Selecciona archivo:</label>
               <label for="file2" class="col-sm-11">
                 <div class="boxFile2" data-text="Seleccionar archivo">
                 <i class="fas fa-cloud-upload-alt"></i>
               </div>
               </label>
               <input id="prodId" name="directorio" type="hidden" value="2" >
               <input id="file2" name="documento"  type="file"  accept="application/pdf,application"  >
              </div>
           </div>
           <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="descripcion" class="col-form-label col-sm-7">Descripción:</label>
                  <div class="col-sm-11">
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ></textarea>
                  </div>
                </div>
            </div>
        </div>

        <div class="form-group">
       <button type="submit"  class="btn btn-danger btn-lg">Guardar</button>       
       <button type="reset" id="reset2"  class="btn btn-light btn-lg">Cancelar</button>     
      </div> 
   
<br>
    </form>
  </div>
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
     3.1 Proc. Apoyo 07-13
      </button>
      
    </h5>
  </div>
  <div id="secciontresuno" class="collapse" aria-labelledby="headingThree" >
    <div class="card-body">
    <div align="center"></div>
  <br>
  <div class="container">
  <form action="{{route('EnvioDocumento')}}" method="POST" enctype="multipart/form-data">
  
  @csrf
  <br>
          <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group row">
                      <label for="nombre" class="col-form-label col-sm-7">Nombre del documento:</label>
                    <div class="col-sm-11">
                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" tabindex="5" >
                    </div>
                  </div>
              </div>
  
                  <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group row">
                      <label for="departamento" class="col-form-label col-sm-7">Selecciona departamento:</label>
                    <div class="col-sm-12">
                    <select class="form-control" id="select4" name="rol[]" multiple data-live-search="true" title="Seleccionar" >
                    @foreach($roles as $rol)
                    <option  value="{{$rol->id_rol}}" >{{$rol->nom_area}}</option >
                    @endforeach
                    </select>
                   </div>
                  </div>
              </div>
  
              <div class="col-xs-4 col-sm-4 col-md-4">
                 <div class="form-group row" id="invoiceBox">
                 <label for="documento" class="col-form-label col-sm-7">Selecciona archivo:</label>
                 <label for="file31" class="col-sm-11">
                   <div class="boxFile31" data-text="Seleccionar archivo">
                   <i class="fas fa-cloud-upload-alt"></i>
                 </div>
                 </label>
                 <input id="prodId" name="directorio" type="hidden" value="3.1" >
                 <input id="file31" name="documento"  type="file"  accept="application/pdf,application" >
              </div>
           </div>
           <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="descripcion" class="col-form-label col-sm-7">Descripción:</label>
                  <div class="col-sm-11">
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ></textarea>
                  </div>
                </div>
            </div>
        </div>

        <div class="form-group">
       <button type="submit"  class="btn btn-danger btn-lg">Guardar</button>       
       <button type="reset" id="reset31"  class="btn btn-light btn-lg">Cancelar</button>     
      </div> 
   
<br>
    </form>
  </div>
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
     3.2 Proc. Normativos del 01-04
      </button>
      
    </h5>
  </div>
  <div id="secciontresdos" class="collapse" aria-labelledby="headingThree" >
    <div class="card-body">
    <div align="center"></div>
  <br>
  <div class="container">
  <form action="{{route('EnvioDocumento')}}" method="POST" enctype="multipart/form-data">
  
@csrf
<br>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="nombre" class="col-form-label col-sm-7">Nombre del documento:</label>
                  <div class="col-sm-11">
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" tabindex="5" >
                  </div>
                </div>
            </div>

                <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="departamento" class="col-form-label col-sm-7">Selecciona departamento:</label>
                  <div class="col-sm-12">
                  <select class="form-control" id="select5" name="rol[]" multiple data-live-search="true" title="Seleccionar" >
                  @foreach($roles as $rol)
                  <option  value="{{$rol->id_rol}}" >{{$rol->nom_area}}</option >
                  @endforeach
                  </select>
                 </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
               <div class="form-group row" id="invoiceBox">
               <label for="documento" class="col-form-label col-sm-7">Selecciona archivo:</label>
               <label for="file32" class="col-sm-11">
                 <div class="boxFile32" data-text="Seleccionar archivo">
                 <i class="fas fa-cloud-upload-alt"></i>
               </div>
               </label>
               <input id="prodId" name="directorio" type="hidden" value="3.2" >
               <input id="file32" name="documento"  type="file"  accept="application/pdf,application" >
              </div>
           </div>
           <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="descripcion" class="col-form-label col-sm-7">Descripción:</label>
                  <div class="col-sm-11">
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ></textarea>
                  </div>
                </div>
            </div>
        </div>

        <div class="form-group">
       <button type="submit"  class="btn btn-danger btn-lg">Guardar</button>       
       <button type="reset" id="reset32"  class="btn btn-light btn-lg">Cancelar</button>     
      </div> 
   
<br>
    </form>
  </div>
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
         <!--contenido 4----->
         <div align="center"></div>
  <br>
  <div class="container">
  <form action="{{route('EnvioDocumento')}}" method="POST" enctype="multipart/form-data">
  
  @csrf
  <br>
          <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group row">
                      <label for="nombre" class="col-form-label col-sm-7">Nombre del documento:</label>
                    <div class="col-sm-11">
                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" tabindex="5" >
                    </div>
                  </div>
              </div>
  
                  <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group row">
                      <label for="departamento" class="col-form-label col-sm-7">Selecciona departamento:</label>
                    <div class="col-sm-12">
                    <select class="form-control" id="select6" name="rol[]" multiple data-live-search="true" title="Seleccionar" >
                    @foreach($roles as $rol)
                    <option  value="{{$rol->id_rol}}" >{{$rol->nom_area}}</option >
                    @endforeach
                    </select>
                   </div>
                  </div>
              </div>
  
              <div class="col-xs-4 col-sm-4 col-md-4">
                 <div class="form-group row" id="invoiceBox">
                 <label for="documento" class="col-form-label col-sm-7">Selecciona archivo:</label>
                 <label for="file4" class="col-sm-11">
                   <div class="boxFile4" data-text="Seleccionar archivo">
                   <i class="fas fa-cloud-upload-alt"></i>
                 </div>
                 </label>
                 <input id="prodId" name="directorio" type="hidden" value="4" >
                 <input id="file4" name="documento"  type="file"  accept="application/pdf,application" >
              </div>
           </div>
           <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="descripcion" class="col-form-label col-sm-7">Descripción:</label>
                  <div class="col-sm-11">
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ></textarea>
                  </div>
                </div>
            </div>
        </div>

        <div class="form-group">
       <button type="submit"  class="btn btn-danger btn-lg">Guardar</button>       
       <button type="reset" id="reset4"  class="btn btn-light btn-lg">Cancelar</button>     
      </div> 
   
<br>
    </form>
  </div>
 <!-- fin contenido 4----------------------------->
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
     5.1 FORMATOS
      </button>
      
    </h5>
  </div>
  <div id="seccioncincouno" class="collapse" aria-labelledby="headingThree" >
    <div class="card-body">
    <div align="center"></div>
  <br>
  <div class="container">
  <form action="{{route('EnvioDocumento')}}" method="POST" enctype="multipart/form-data">
  
@csrf
<br>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="nombre" class="col-form-label col-sm-7">Nombre del documento:</label>
                  <div class="col-sm-11">
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" tabindex="5" >
                  </div>
                </div>
            </div>

                <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="departamento" class="col-form-label col-sm-7">Selecciona departamento:</label>
                  <div class="col-sm-12">
                  <select class="form-control" id="select7" name="rol[]" multiple data-live-search="true" title="Seleccionar" >
                  @foreach($roles as $rol)
                  <option  value="{{$rol->id_rol}}" >{{$rol->nom_area}}</option >
                  @endforeach
                  </select>
                 </div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
               <div class="form-group row" id="invoiceBox">
               <label for="documento" class="col-form-label col-sm-7">Selecciona archivo:</label>
               <label for="file51" class="col-sm-11">
                 <div class="boxFile51" data-text="Seleccionar archivo">
                 <i class="fas fa-cloud-upload-alt"></i>
               </div>
               </label>
               <input id="prodId" name="directorio" type="hidden" value="5.1" >
               <input id="file51" name="documento"  type="file"  accept="application/pdf,application" >
              </div>
           </div>
           <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="descripcion" class="col-form-label col-sm-7">Descripción:</label>
                  <div class="col-sm-11">
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ></textarea>
                  </div>
                </div>
            </div>
        </div>

        <div class="form-group">
       <button type="submit"  class="btn btn-danger btn-lg">Guardar</button>       
       <button type="reset" id="reset51"  class="btn btn-light btn-lg">Cancelar</button>     
      </div> 
   
<br>
    </form>
  </div>
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
     5.2 Formatos Proc. Normativos
      </button>
      
    </h5>
  </div>
  <div id="seccioncincodos" class="collapse" aria-labelledby="headingThree" >
    <div class="card-body">
    <div align="center"></div>
  <br>
  <div class="container">
  <form action="{{route('EnvioDocumento')}}" method="POST" enctype="multipart/form-data">
  
  @csrf
  <br>
          <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group row">
                      <label for="nombre" class="col-form-label col-sm-7">Nombre del documento:</label>
                    <div class="col-sm-11">
                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" tabindex="5" >
                    </div>
                  </div>
              </div>

                  <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group row">
                      <label for="departamento" class="col-form-label col-sm-7">Selecciona departamento:</label>
                    <div class="col-sm-12">
                    <select class="form-control" id="select8" name="rol[]" multiple data-live-search="true" title="Seleccionar" >
                    @foreach($roles as $rol)
                    <option  value="{{$rol->id_rol}}" >{{$rol->nom_area}}</option >
                    @endforeach
                    </select>
                   </div>
                  </div>
              </div>
  
              <div class="col-xs-4 col-sm-4 col-md-4">
                 <div class="form-group row" id="invoiceBox">
                 <label for="documento" class="col-form-label col-sm-7">Selecciona archivo:</label>
                 <label for="file52" class="col-sm-11">
                   <div class="boxFile52" data-text="Seleccionar archivo">
                   <i class="fas fa-cloud-upload-alt"></i>
                 </div>
                 </label>
                 <input id="prodId" name="directorio" type="hidden" value="5.2" >
                 <input id="file52" name="documento"  type="file"  accept="application/pdf,application" >
              </div>
           </div>
  <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group row">
                    <label for="descripcion" class="col-form-label col-sm-7">Descripción:</label>
                  <div class="col-sm-11">
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ></textarea>
                  </div>
                </div>
            </div>
        </div>

        <div class="form-group">
       <button type="submit"  class="btn btn-danger btn-lg">Guardar</button>       
       <button type="reset" id="reset52"  class="btn btn-light btn-lg">Cancelar</button>     
      </div> 
   
<br>
    </form>
  </div>
    </div>
  </div>
</div>
</div><!-- FIN SECCION 5.2-------------------------->
      </div>
    </div>
<!--- FIN SECCIÓN 5 ------------------------------------------------------------------------------>
  </div> 


        <script type="text/javascript">
       
   
      


  </script>
 <script src="{{ asset('/public/js/alertas.js') }}"></script>
 <script src="{{ asset('/public/js/boxFile.js') }}"></script>
 

	<!--@if(session ('alerta'))
  <div class="alert alert-warning" role="alert">
                <h1 align="center">sss</h1>
                <h5 align="center">ss</h5>
                <div class="col-12" align="center">
                    <button class="btn btn-primary" id="tamanioboton" type="submit">GUARDAR</button>
                </div>
            </div>

  @endif-->