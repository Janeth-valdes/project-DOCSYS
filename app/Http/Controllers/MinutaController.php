<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class MinutaController extends Controller
{
  public function Minuta()
  {

    if (session('sid') != null) {
      $seccion = 1;
      $query2 = \DB::select("select max(id_reunion) as id from reunion where DELETED_AT is null");
     /* if ($query2[0]->id == null) {
        $seccion = 3;
        return view('minuta')
          ->with('seccion', $seccion);
      } else {}*/

        $query = \DB::select("select max(id_reunion) as id from reunion where tipo_reunion='Reunion calidad' and DELETED_AT is null");

        $query3 = \DB::select("select * from reunion where id_reunion =" . $query2[0]->id);
        $query4 = \DB::select("select * from usuarios where  deleted_at is null ");



        //var_dump($usuarios); 
        return view('minuta')
          ->with('seccion', $seccion)
          ->with('query', $query[0])
          ->with('datos', $query3[0])
          ->with('usuarios', $query4);
      
    } else {

      return Redirect::to('/login');
    }
  }
  public function ConsultMinu()
  {
    if (session('sid') != null) {
 

      $query = \DB::select("select id_minuta, n_reunion, asunto, lugar, to_char(fecha,'DD-MM-YYYY') as fecha, duracion, evidencia  from minuta where deleted_at is null order by id_minuta asc");
      
      $query2 = \DB::select("SELECT m.id_minuta, m.n_reunion, m.asunto, m.lugar, to_char(m.fecha,'DD-MM-YYYY')as fecha, m.duracion,  LISTAGG ((REGEXP_REPLACE(p.nombres ||' '||p.ap_paterno||' '||p.ap_materno ,'  ', ' ')), ', ')  WITHIN GROUP (ORDER BY p.nombres) usuarios
      FROM MINUTA M
      JOIN DETALLE_MA PC ON PC.ID_MINUTA = M.id_minuta
      JOIN USUARIOS P ON P.ID_usuario = PC.IDusuarios where m.deleted_at is null GROUP BY m.id_minuta,m.n_reunion, m.asunto, m.lugar, m.fecha, m.duracion ");
     // echo $query[0]->id_minuta;

      return  view('consultas/consultaminutas', ['datos' => $query] , ['NOM' => $query2]);

      // return view('consultas/consultaminutas');

    } else {

      return Redirect::to('/login');
    }
  }
  public function Insertar(Request $request)
  {
    $idusuario = session('sid');
    $this->validate($request, [
      'asunto' => 'required',
      'lugar' => "required",
      'fecha' => 'required',
      'duracion' => 'required'

    ]);
    $documento_nombre = $_FILES['evidencia']['name'];
    $documento_tipo = $_FILES['evidencia']['type'];
    $documento_temp = $_FILES['evidencia']['tmp_name'];
    $asunto = $request->asunto;
    $n_reunion = $request->n_reunion;
    $asunto = $request->asunto;
    $lugar = $request->lugar;
    $duracion = $request->duracion;

    $fecha = date('d-m-y', strtotime($request->fecha));

    $conn =  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');

    if (!$conn) {
      $error = oci_error();
      die("ERROR: " . $error["message"]);
    }

    if ($documento_temp == "") {
      echo 'No hay archivosss';
      $contador = 0;
      $query = \DB::insert("insert into minuta values(sec_calidad.nextval,'$n_reunion','$asunto','$lugar','$request->fecha','$duracion',SYSDATE,null,null,null,null,'$idusuario')");
      $minuta = \DB::select("select max(id_minuta) as id from minuta where DELETED_AT is null" );
      $max_id_reunion = \DB::select(" SELECT MAX(id_reunion) as id_d FROM reunion where DELETED_AT is null and tipo_reunion= 'Reunion calidad'");
      $insert_detalle = \DB::insert("insert into detalle_reunion values(sec_detalle_reunion.nextval,SYSDATE," . $max_id_reunion[0]->id_d . ",NULL," . $minuta[0]->id . ")");

      echo  $minuta[0]->id;

      foreach ($request->input('participantes', []) as $opcion) {
        $query2 = \DB::insert("insert into detalle_ma values(SEC_DETALLE_MA.nextval," . $minuta[0]->id . ",null,SYSDATE,$opcion)");

        $contador++;
      }
    } else {
      $documento_string =  file_get_contents($documento_temp);

     
      $st = oci_parse($conn, 'INSERT INTO minuta (id_minuta, n_reunion,asunto,lugar,fecha,duracion,CREATE_AT,UPDATE_AT,DELETED_AT,tipo,idpersona,evidencia) 
            VALUES (sec_calidad.nextval, :n_reunion,:asunto,:lugar,:fecha,:duracion,SYSDATE,NULL,NULL,:tipo,:idpersona,empty_blob())
            RETURNING evidencia INTO :evidencia');

      $blob = oci_new_descriptor($conn, OCI_D_LOB);


      oci_bind_by_name($st, ":n_reunion", $n_reunion);
      oci_bind_by_name($st, ":asunto", $asunto);
      oci_bind_by_name($st, ":lugar", $lugar);
      oci_bind_by_name($st, ":fecha", $fecha);
      oci_bind_by_name($st, ":duracion", $duracion);
      oci_bind_by_name($st, ":idpersona",$idusuario);
      oci_bind_by_name($st, ":tipo", $documento_tipo);
      oci_bind_by_name($st, ":evidencia", $blob, -1, OCI_B_BLOB);

      oci_execute($st, OCI_NO_AUTO_COMMIT);
      $blob->save($documento_string);

      oci_commit($conn);

      $blob->free();
      oci_free_statement($st);
      oci_close($conn);
      $contador = 0;
      $minuta = \DB::select("select max(id_minuta) as id from minuta where DELETED_AT is null");

      echo  $minuta[0]->id;
      $max_id_reunion = \DB::select(" SELECT MAX(id_reunion) as id_d FROM reunion where DELETED_AT is null and tipo_reunion= 'Reunion calidad'");
      $insert_detalle = \DB::insert("insert into detalle_reunion values(sec_detalle_reunion.nextval,SYSDATE," . $max_id_reunion[0]->id_d . ",NULL," . $minuta[0]->id . ")");
      foreach ($request->input('participantes', []) as $opcion) {
        $query2 = \DB::insert("insert into detalle_ma values(SEC_DETALLE_MA.nextval," . $minuta[0]->id . ",null,SYSDATE,$opcion)");

        $contador++;
      }
    
    }
    //   echo $documento_tipo;

    //return Redirect::to('minuta')->with('message', 'Se ha creado minuta correctamente.');
  }
  public function DeletedMin($id_minuta)
  {
    if (session('sid') != null) {
      $idusuario = session('sid');
      $ex=\DB::select("select n_reunion as n_r from minuta where id_minuta = ".$id_minuta."");
      echo $ex[0]->n_r;
      $existe_a=\DB::select("select n_acuerdo from acuerdos where  n_acuerdo= ".$ex[0]->n_r."");
     
    if (empty($existe_a)) {
        echo 'vacio';
      $query = \DB::update("update minuta
            SET deleted_at = CURRENT_TIMESTAMP,
            idpersona = $idusuario
            WHERE id_minuta= '$id_minuta'");

            return Redirect::to('consultaminu')->with('info','Se ha eliminado correctamente.');
    }else {

      return Redirect::to('consultaminu')->with('warning','No se puede eliminar.');
    }
     
    } else {

      return Redirect::to('/login');
    }
  }
  public function ModificarMin($idm)
  {
    if (session('sid') != null) {
      $seccion = 2;


      $query = \DB::select("select  id_minuta  from minuta where deleted_at is null and id_minuta='$idm'");
      $conn =  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');
      $queryus = \DB::select("select id_usuario, nombres,ap_paterno,ap_materno from usuarios");
      $queryus2 = \DB::select("SELECT m.n_reunion, m.asunto, m.lugar, m.fecha,m.duracion,m.tipo, p.nombres,p.ap_paterno,p.ap_materno,pc.idusuarios, m.evidencia
          FROM MINUTA M
          JOIN DETALLE_MA PC ON PC.ID_MINUTA = M.id_minuta
          JOIN USUARIOS P ON P.ID_usuario = PC.IDusuarios WHERE m.id_minuta = '$idm' and m.deleted_at is null");

      $sql="SELECT n_reunion,asunto, lugar,to_char(fecha,'YYYY-MM-DD'), duracion, tipo, evidencia FROM minuta WHERE id_minuta = '$idm' and deleted_at is null";
      /*$sql = "SELECT m.n_reunion, m.asunto, m.lugar, to_char(m.fecha,'YYYY-MM-DD'),m.duracion,m.tipo,p.nombres,pc.idusuarios, m.evidencia
          FROM MINUTA M
          JOIN DETALLE_MA PC ON PC.ID_MINUTA = M.id_minuta
          JOIN USUARIOS P ON P.ID_usuario = PC.IDusuarios WHERE m.id_minuta = '$idm' and m.deleted_at is null";*/

      $stmt = oci_parse($conn, $sql);
      oci_execute($stmt);

      $archivo = oci_fetch_array($stmt, OCI_ASSOC + OCI_NUM + OCI_RETURN_NULLS);
      $n_reunion = $archivo[0];
      $asunto = $archivo[1];
      $lugar = $archivo[2];
      $fecha = $archivo[3];
      $duracion = $archivo[4];
      $tipo = $archivo[5];
      if (empty($archivo[6])) {
        // echo 'NO HAY NADA';


        oci_free_statement($stmt);
        oci_close($conn);

        $blob = "";

        //header para tranformar la salida en el tipo de archivo que hemos guardado
        header("Content-type: $tipo");


        return view('minuta')->with('seccion', $seccion)
          ->with('n_reunion', $n_reunion)
          ->with('asunto', $asunto)
          ->with('lugar', $lugar)
          ->with('fecha', $fecha)
          ->with('duracion', $duracion)
          ->with('blobd', $blob)
          ->with('tipo', $tipo)
          ->with('datos', $query[0])
          ->with(['usuarios' => $queryus])
          ->with(['usuarios_detalle' => $queryus2]);
      } else {
        //echo 'contiene algo';
        $blob = $archivo[6]->load();
        oci_free_statement($stmt);
        oci_close($conn);

        //header para tranformar la salida en el tipo de archivo que hemos guardado
        header("Content-type: $tipo");


        return view('minuta')->with('seccion', $seccion)
          ->with('n_reunion', $n_reunion)
          ->with('asunto', $asunto)
          ->with('lugar', $lugar)
          ->with('fecha', $fecha)
          ->with('duracion', $duracion)
          ->with('blobd', $blob)
          ->with('tipo', $tipo)
          ->with('datos', $query[0])
          ->with(['usuarios' => $queryus])
          ->with(['usuarios_detalle' => $queryus2]);
          ;
      }
    } else {
      return Redirect::to('/login');
    }
  }
  public function ActualizarMin(Request $request)
  {
   if (session('sid') != null) {
      $this->validate($request, [
        'asunto' => 'required',
        'lugar' => "required",
        'fecha' => 'required',
        'duracion' => 'required'
      ]);
      $idusuario = session('sid');

      $documento_nombre = $_FILES['evidencia']['name'];
      $documento_tipo = $_FILES['evidencia']['type'];
      $documento_temp = $_FILES['evidencia']['tmp_name'];
      $id = $request->id_minuta;
      $asunto = $request->asunto;
      $lugar = $request->lugar;
      $fecha = $request->fecha;
      $duracion = $request->duracion;
 
     
     // echo  $minuta[0]->id;*/
      $id = $request->id_minuta;
      $contador=0;
     $contenido =$request->input('participantes', []);
      //Si el select no tienen nada seleccionado elimina todos de la tabla detalle


  /*if( count($contenido) == 0 ){
          $deleted = \DB::delete("DELETE from detalle_ma WHERE id_minuta='$id'");
  }*/
      //Consulta de los registros insertados en detalle
      $participantes= \DB::select("SELECT idusuarios  FROM detalle_ma where id_minuta ='$id'");
  
 
     //Agrega participantes mientras haya algo seleccionado y no haya registros de participantes en la de detalle 
     var_dump(count($contenido));
if( count($contenido) != 0 && $participantes == null){
    //echo 'no hay nada';
  foreach ($request->input('participantes', []) as $opcion) {
       $query2 = \DB::insert("insert into detalle_ma values(SEC_DETALLE_MA.nextval," . $id . ",null,SYSDATE,$opcion)");

       $contador++;
  }
}
//echo "participantes registrados en detalle   ".count($participantes)."<br>";
//echo "participantes seleccionados   ".count($contenido)."<br>";

// Obtenemos los "asesores" valores seleccionados como un array
foreach ($request->input('participantes', []) as $opcion) {

 $par= \DB::select("SELECT * FROM detalle_ma where id_minuta ='$id' and idusuarios= ".intval($opcion));

 if(count($par)==0){
  //echo $opcion."<br>";
  $query2 = \DB::insert("insert into detalle_ma values(SEC_DETALLE_MA.nextval," . $id . ",null,SYSDATE,$opcion)");
 }



}
$array1= $contenido;
$array2= $participantes;
$arrayv = [];//iniciarlizar variable de arreglo
// solo se va eliminar cuando el contenido sea menor que lo que haya en detalle
if($array1 < $participantes){
//iteración de los participantes
foreach ($array2 as $par) {

  $id_usu = $par->idusuarios;
  //Sacar un valor en especifico del arreglo
  array_push($arrayv,$id_usu);
  }
  //diferenciar el resultado de los arreglos, el $arrayv va guardando los reslutados de la iteración
  $diferencias = array_diff($arrayv,$array1);
  var_dump($diferencias);
  //iterar los resultados que son diferentes
  foreach ($diferencias as  $opcion1) {
  //echo $opcion1."<br>";
  $deleted = \DB::delete("DELETE from detalle_ma WHERE id_minuta='$id' and idusuarios=$opcion1");
  }
  
}
    $conn =  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');

      if (!$conn) {
        $error = oci_error();
        die("ERROR: " . $error["message"]);
      }
      if ($documento_temp == "") {
        //echo 'No hay archivo';
        $update = \DB::update("update minuta
           set
           asunto    = '$request->asunto',
           duracion  = '$request->duracion',
           lugar     = '$request->lugar',
           fecha     = '$request->fecha',
           update_at = CURRENT_TIMESTAMP,
           idpersona= '$idusuario'
           where id_minuta = '$request->id_minuta'");
      } else {
        $fecha = date('d-m-y', strtotime($request->fecha));
        $documento_string =  file_get_contents($documento_temp);
        $blob = oci_new_descriptor($conn, OCI_D_LOB);
        $st = oci_parse($conn, "UPDATE minuta 
            SET 
            asunto= '$asunto',
            lugar ='$lugar', 
            fecha ='$fecha', 
            duracion = '$duracion',
            tipo='$documento_tipo',
            idperonsa='$idusuario',
            UPDATE_AT = CURRENT_TIMESTAMP, 
            evidencia = EMPTY_BLOB()
            WHERE id_minuta = '$id'
            RETURNING evidencia INTO :evidencia");

        oci_bind_by_name($st, ':evidencia', $blob, -1, OCI_B_BLOB);
        oci_execute($st, OCI_NO_AUTO_COMMIT);
        $blob->save($documento_string);

        oci_commit($conn);

        $blob->free();
        oci_free_statement($st);
        oci_close($conn);
      //  echo 'Hay archivo';
      }


   return Redirect::to('/consultaminu')->with('info', 'Se ha actualizado correctamente.');
    } else {
      return Redirect::to('/login');
    }
  }
  public function VerEvidencia($idm)
  {

    $conn =  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');

    $sql = "SELECT evidencia, tipo FROM minuta WHERE id_minuta = '$idm' and deleted_at is null";

    $stmt = oci_parse($conn, $sql);
    oci_execute($stmt);

    $archivo = oci_fetch_array($stmt, OCI_ASSOC + OCI_NUM + OCI_RETURN_NULLS);
    $blob = $archivo[0]->load();
    $tipo = $archivo[1];

    oci_free_statement($stmt);
    oci_close($conn);


    //header para tranformar la salida en el tipo de archivo que hemos guardado
    header("Content-type: $tipo");
    //echo $blob;  


    echo $blob;
    // echo '<img src="data:image/pdf;base64,'.base64_encode($blob) .' "/>';

    //->with(["blob"=>$blob]);
  }
}
