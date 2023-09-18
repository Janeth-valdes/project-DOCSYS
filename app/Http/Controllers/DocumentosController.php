<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
Use \Carbon\Carbon;
use Psy\Readline\Hoa\Console;

class DocumentosController extends Controller
{
    public function Documentos(){
        if(session('sid')!=null){
          $queryrol=\DB::select("select * from rol");

            return view('documentos', ['roles'=>$queryrol]);

        }else{

            return Redirect::to('/login');
        }   
     
   
    }  
    public function Insertar(Request $request){
      $idusuario=session('sid');
      $this->validate($request, [
        'nombre'=>'required',
        'rol'=>"required",
        'documento' =>'required',
        'descripcion'=>'required'
   
    ]);
      /*
      $id = \DB::select("select max(id_documento) as id from documentos");
      $id2 = 0;
      $id2 = $id[0]->id +1;*/

      //  dd($request);

      /*$doc=new Documentos;
      $doc->id_documento=$request->get(170);
      $doc->nombre=$request->get('nombre');
    
        $doc->save();-*/
        $idusuario=session('sid');
        /*propiedades del documento*/
        $documento_nombre=$_FILES['documento']['name'];
        $documento_tipo = $_FILES['documento']['type'];
        $documento_temp = $_FILES['documento']['tmp_name'];
        $rol = $_POST['rol'];
        $separados= implode(",",$rol);     
        $texto=$request->directorio;
        $nombre=$request->nombre;
        $descripcion=$request->descripcion;

        //conexion con oracle
        $conn=  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');

        //verificamos si no hay error en la conexion
        if(!$conn){
          $error= oci_error();
          die("ERROR: ".$error["message"]);
        }

        //lee el documento a un string
        $documento_string=  file_get_contents($documento_temp);

        /* preparamos la sentencia sql
          * como observan he declarado unos paramentros en la sentencia sql
          * que recibiran valores desde el oci_bind_by_name más abajo.
        */
        $st= oci_parse($conn, 'INSERT INTO documentos (id_documento,nombre, idusuarios,CREATE_AT,UPDATE_AT,DELETED_AT,rol,DIRECTORIO,descripcion,tipo,documento) 
          VALUES (sec_documentos.nextval,:nombre, :idusuarios,CURRENT_TIMESTAMP,NULL,NULL,:rol,:DIRECTORIO,:descripcion, :tipo,empty_blob())
          RETURNING documento INTO :documento');

          //inicializamos una variable de tipo blob
          $blob=oci_new_descriptor($conn, OCI_D_LOB);

          //vinculamos los parametros con las variables

          oci_bind_by_name($st, ":NOMBRE", $nombre);
          oci_bind_by_name($st, ":idusuarios", $idusuario);
          oci_bind_by_name($st, ":rol",$separados);
          oci_bind_by_name($st, ":DIRECTORIO",$texto);
          oci_bind_by_name($st, ":descripcion",$descripcion);
          oci_bind_by_name($st, ":tipo",$documento_tipo);
          oci_bind_by_name($st, ":documento", $blob, -1, OCI_B_BLOB);


          //ejecutamos el statement sin hacer commit
          oci_execute($st, OCI_NO_AUTO_COMMIT);
          $blob->save($documento_string); //guardamos el documento como binario

          oci_commit($conn); //ejecutamos el commit

          //liberamos la variable y cerramos conexion
          $blob->free();
          oci_free_statement($st);
          oci_close($conn);
       //var_dump($_POST['rol']);
       //echo implode(",",$rol);
        //  echo 'termino';
        //  echo $documento_tipo;
          return Redirect::to('documentos')->with('alerta','Guardado satisfactoriamente'); 

}
    
public function ConsultDoc(){
  if(session('sid')!=null){
    
      $query=\DB::select("select *  from documentos where deleted_at is null");
     
      return  view('consultas/consultadocumentos',['datos'=>$query]);


  }else{

      return Redirect::to('/login');
  }   

}
public function ConsultDocEdit(){
  if(session('sid')!=null){
    
              
      return  view('documentosEdit');
  }else{

      return Redirect::to('/login');
  }   

}
public function DeletedDoc($id_documento){
  if(session('sid')!=null){
    echo 'entro';
      $query=\DB::update("update documentos
      SET deleted_at = CURRENT_TIMESTAMP
      WHERE id_documento= '$id_documento'");

 
return Redirect::to('consultadoc');

  }else{

      return Redirect::to('/login');
  }   

}


}
