<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AcuerdosController extends Controller
{
    public function Acuerdos(){
        if(session('sid')!=null){
            $seccion = 1;
            $query2 = \DB::select("select max(id_reunion) as id from reunion where DELETED_AT is null");
            if($query2[0]->id == null)
            {
            $seccion = 3;
            return view('acuerdos')
                    ->with('seccion',$seccion);
            }else{
            $query = \DB::select("select max(id_reunion) as id from reunion where tipo_reunion='Reunion calidad' and DELETED_AT is null");
           
            $query3 = \DB::select("select * from reunion where id_reunion =".$query2[0]->id."");
            $query4 = \DB::select("select * from usuarios where DELETED_AT is null ");


            return view('acuerdos')
            ->with('seccion',$seccion)
            ->with('query',$query[0])
            ->with('datos',$query3[0])
            ->with('usuarios',$query4);
        }
        }else{

            return Redirect::to('/login');
        }  
    }
    public function ConsultAcue(){
        if(session('sid')!=null){
            $query=\DB::select("select id_acuerdo, n_acuerdo, to_char(fecha,'DD-MM-YYYY') as fecha, descripcion, da, estatus,tipo, evidencia   from acuerdos where deleted_at is null order by id_acuerdo asc");
            $query4 = \DB::select("select * from usuarios ");
            
            return view('consultas/consultaacuerdos', ['datos'=>$query])->with('usuarios',$query4);
    

        }else{

            return Redirect::to('/login');
        }   
     
     }
     public function Insertar(Request $request){
   
        $idusuario=session('sid');
        $this->validate($request, [
          'fecha'=>'required',
          'responsable'=>"required",
          'descripcion' =>'required',
          'DA'=>'required'
     
      ]);
        $documento_nombre=$_FILES['evidenciaA']['name'];
        $documento_tipo = $_FILES['evidenciaA']['type'];
        $documento_temp = $_FILES['evidenciaA']['tmp_name'];
        $n_acuerdo =$request->n_acuerdo;
        //$fechaf ='10-10-23';
        $fechaf = date('d-m-y', strtotime($request->fecha));
        $descripcion = $request->descripcion;
        $DA=$request->DA;
        $estatus = $request->estatus;
        $texto=$request->directorio;
       
        $conn=  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');

        if(!$conn){
          $error= oci_error();
          die("ERROR: ".$error["message"]);
        }

        if ($documento_temp=="") {
          $contador = 0;
          //echo 'No hay archivo';
          $query = \DB::insert("insert into acuerdos values(sec_acuerdos.nextval,'$n_acuerdo','$request->fecha','$descripcion','$DA',CURRENT_TIMESTAMP,null,null,'$estatus',null,'$idusuario',null)");
          $acuerdo = \DB::select("select max(id_acuerdo) as id from acuerdos");
      foreach ($request->input('responsable', []) as $opcion) {
        $query2 = \DB::insert("insert into detalle_ma values(SEC_DETALLE_MA.nextval,null," . $acuerdo[0]->id . ",SYSDATE,$opcion)");

        $contador++;
      }
        }else{
        $documento_string=  file_get_contents($documento_temp);

       echo $fechaf;
        $st= oci_parse($conn, 'INSERT INTO acuerdos (id_acuerdo,n_acuerdo, fecha, descripcion,DA,CREATE_AT,UPDATE_AT,DELETED_AT,estatus,tipo,idpersona,evidencia) 
          VALUES (sec_acuerdos.nextval,:n_acuerdo,:fecha,:descripcion,:DA,CURRENT_TIMESTAMP,NULL,NULL,:estatus,:tipo,:idpersona,empty_blob())
          RETURNING evidencia INTO :evidencia');

          $blob=oci_new_descriptor($conn, OCI_D_LOB);


          oci_bind_by_name($st, ":n_acuerdo",$n_acuerdo);
          oci_bind_by_name($st, ":fecha",$fechaf);
          oci_bind_by_name($st, ":descripcion", $descripcion);
          oci_bind_by_name($st, ":DA", $DA);
          oci_bind_by_name($st, ":estatus",$estatus);
          oci_bind_by_name($st, ":tipo",$documento_tipo);
          oci_bind_by_name($st, ":idpersona",$idusuario);
          oci_bind_by_name($st, ":evidencia", $blob, -1, OCI_B_BLOB);

          oci_execute($st, OCI_NO_AUTO_COMMIT);
          $blob->save($documento_string); 

          oci_commit($conn);
          $blob->free();
          oci_free_statement($st);  
          oci_close($conn);
          $contador = 0;
          $acuerdo = \DB::select("select max(id_acuerdo) as id from acuerdos");
      foreach ($request->input('responsable', []) as $opcion) {
        $query2 = \DB::insert("insert into detalle_ma values(SEC_DETALLE_MA.nextval,null," . $acuerdo[0]->id . ",SYSDATE,$opcion)");

        $contador++;
      }
       //$query = \DB::insert("insert into acuerdos values(sec_acuerdos.nextval,'$request->n_acuerdo','$request->fecha','$request->responsable','$request->descripcion','$nombrea',CURRENT_TIMESTAMP,null,null,'$request->estatus')");
    
     // return Redirect::to('consultaacue');
     
        }
        return Redirect::to('acuerdos')->with('message','Se ha creado acuerdo correctamente.'); 
     
    }
    public function DeletedAc($id_acuerdo){
        if(session('sid')!=null){
          $idusuario=session('sid');
            $query=\DB::update("update acuerdos
            SET DELETED_AT = CURRENT_TIMESTAMP,
            idpersona = $idusuario
            WHERE id_acuerdo= '$id_acuerdo'");

            return Redirect::to('consultaacue')->with('info','Se ha eliminado correctamente.');
   

        }else{

            return Redirect::to('/login');
        }   
     
      }
      public function ModificarAc($ida){
        if(session('sid')!=null){
        $seccion = 2;
        
          $query = \DB::select("select * from acuerdos where deleted_at is null and id_acuerdo='$ida'");
          $conn=  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');
          $queryus = \DB::select("select id_usuario, nombres,ap_paterno,ap_materno from usuarios");
          $queryus2 = \DB::select("SELECT A.n_acuerdo, a.fecha,a.descripcion,a.da,a.estatus,a.tipo, a.evidencia,p.nombres,p.ap_paterno,p.ap_materno,pc.idusuarios
              FROM ACUERDOS A
              JOIN DETALLE_MA PC ON PC.ID_acuerdos = a.id_acuerdo
              JOIN USUARIOS P ON P.ID_usuario = PC.IDusuarios WHERE a.id_acuerdo = '$ida' and a.deleted_at is null");
    
          $sql="SELECT n_acuerdo, to_char(fecha,'YYYY-MM-DD') as fecha, descripcion,DA, estatus, tipo,idpersona, evidencia FROM acuerdos WHERE id_acuerdo = '$ida' and deleted_at is null";
          $stmt = oci_parse($conn, $sql);
          oci_execute($stmt);
          
          $archivo= oci_fetch_array($stmt, OCI_ASSOC + OCI_NUM + OCI_RETURN_NULLS);      
          $n_acuerdo =$archivo[0];
          $fecha =$archivo[1];
          $descripcion =$archivo[2];
          $DA          =$archivo[3];
          $estatus =$archivo[4];
          $tipo =$archivo[5];
          $idpersona=$archivo[6];
          if(empty($archivo[7])){
            // echo 'NO HAY NADA';
              oci_free_statement($stmt);
              oci_close($conn);

              $blob="";

              //header para tranformar la salida en el tipo de archivo que hemos guardado
              header("Content-type: $tipo"); 


              return view('acuerdos')->with('seccion',$seccion)
              ->with('n_acuerdo',$n_acuerdo)
              ->with('fecha',$fecha)
              ->with('descripcion',$descripcion)
              ->with('DA',$DA)
              ->with('estatus',$estatus)
              ->with('blobd',$blob)
              ->with('tipo',$tipo)
              ->with('datos',$query[0])
              ->with(['usuarios' => $queryus])
          ->with(['usuarios_detalle' => $queryus2]);
          }else{
              //  echo 'contiene algo';
              
                $blob=$archivo[7]->load();
                oci_free_statement($stmt);
                oci_close($conn);
                
                //header para tranformar la salida en el tipo de archivo que hemos guardado
                header("Content-type: $tipo"); 
              
                return view('acuerdos')->with('seccion',$seccion)
              ->with('n_acuerdo',$n_acuerdo)
              ->with('fecha',$fecha)
              ->with('descripcion',$descripcion)
              ->with('DA',$DA)
              ->with('estatus',$estatus)
              ->with('blobd',$blob)
              ->with('tipo',$tipo)
              ->with('datos',$query[0])
              ->with(['usuarios' => $queryus])
          ->with(['usuarios_detalle' => $queryus2]);
          }
        }else{
        return Redirect::to('/login');
    }
}
public function ActualizarAcu(Request $request){
    if(session('sid')!=null){
      $idusuario=session('sid');
      $this->validate($request, [
        'fecha'=>'required',
        'descripcion' =>'required',
        'DA'=>'required'
   
    ]);
      $documento_nombre=$_FILES['evidencia']['name'];
      $documento_tipo = $_FILES['evidencia']['type'];
      $documento_temp = $_FILES['evidencia']['tmp_name'];
      $id = $request->id_acuerdo;
      $fecha = $request->fecha;
      $descripcion = $request->descripcion;  
      $DA          = $request->DA;  
      $estatus = $request->estatus;   
      $contador = 0;
     
      // echo  $minuta[0]->id;*/
       $id = $request->id_acuerdo;
  
      $contenido =$request->input('responsables', []);
 
       //Si el select no tienen nada seleccionado elimina todos de la tabla detalle
 
 
       $participantes= \DB::select("SELECT idusuarios  FROM detalle_ma where id_acuerdos ='$id'");
   
  
      //Agrega participantes mientras haya algo seleccionado y no haya registros de participantes en la de detalle 
      var_dump(count($contenido));
 if( count($contenido) != 0 && $participantes == null){
     //echo 'no hay nada';
   foreach ($request->input('responsables', []) as $opcion) {
        $query2 = \DB::insert("insert into detalle_ma values(SEC_DETALLE_MA.nextval,null," . $id . ",SYSDATE,$opcion)");
 
        $contador++;
   }
 }
 //echo "participantes registrados en detalle   ".count($participantes)."<br>";
 //echo "participantes seleccionados   ".count($contenido)."<br>";
 
 // Obtenemos los "asesores" valores seleccionados como un array
 foreach ($request->input('responsables', []) as $opcion) {
 
  $par= \DB::select("SELECT * FROM detalle_ma where id_acuerdos ='$id' and idusuarios= ".intval($opcion));
 
  if(count($par)==0){
   //echo $opcion."<br>";
   $query2 = \DB::insert("insert into detalle_ma values(SEC_DETALLE_MA.nextval,null," . $id . ",SYSDATE,$opcion)");
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
   $deleted = \DB::delete("DELETE from detalle_ma WHERE id_acuerdos='$id' and idusuarios=$opcion1");
   }
   
 }

      $conn=  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');

     if(!$conn){
        $error= oci_error();
        die("ERROR: ".$error["message"]);
      }
      if ($documento_temp=="") {
      // echo 'No hay archivo';
       $update = \DB::update("update acuerdos
       set
       fecha    = '$request->fecha',
       descripcion     = '$request->descripcion',
       DA              ='$DA',
       estatus= '$estatus',
       idpersona='$idusuario',
       update_at = CURRENT_TIMESTAMP
       where id_acuerdo = '$request->id_acuerdo'");


        } else {
          $fecha2 = date('d-m-y', strtotime($request->fecha));
          $documento_string=  file_get_contents($documento_temp);
          $blob=oci_new_descriptor($conn, OCI_D_LOB);
          $st= oci_parse($conn, "UPDATE acuerdos 
          SET 
          fecha= '$fecha2',
          descripcion ='$descripcion', 
          DA              ='$DA',
          estatus= '$estatus',
          UPDATE_AT = CURRENT_TIMESTAMP, 
          tipo='$documento_tipo',
          idpersona = '$idusuario',
          evidencia = EMPTY_BLOB()
          WHERE id_acuerdo = '$id'
          RETURNING evidencia INTO :evidencia");

              oci_bind_by_name($st, ':evidencia', $blob, -1, OCI_B_BLOB);
              oci_execute($st, OCI_NO_AUTO_COMMIT);
              $blob->save($documento_string); 
  
              oci_commit($conn);  
  
              $blob->free();
              oci_free_statement($st);
              oci_close($conn);
            
           // echo 'Hay archivo';
          } 
   
   
  
  //        echo 'este es el id--->'.$id;
//echo $request->asunto;

//echo "--->ENTRO A ACTUALIZAR--->".$request->id_acuerdo;

 return Redirect::to('/consultaacue')->with('info','Se ha actualizado correctamente.');
  
  }else{
    return Redirect::to('/login');
  }
  }

  public function VerEvidenciaA($ida){
   
    $conn=  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');
    
    $sql="SELECT evidencia, tipo FROM acuerdos WHERE id_acuerdo = '$ida' and deleted_at is null";
    
    $stmt = oci_parse($conn, $sql);
    oci_execute($stmt);
    
    $archivo= oci_fetch_array($stmt, OCI_ASSOC + OCI_NUM + OCI_RETURN_NULLS);      
    $blob=$archivo[0]->load();
    $tipo=$archivo[1];
    
    oci_free_statement($stmt);
    oci_close($conn);
    
    
    //header para tranformar la salida en el tipo de archivo que hemos guardado
   header("Content-type: $tipo"); 
    //echo $blob;  
 
 
 echo $blob;
// echo '<img src="data:image/pdf;base64,'.base64_encode($blob) .' "/>';

  //->with(["blob"=>$blob]);
}
public function BuscarAcuerdos(Request $request){
  $id=session('sid');
  //echo $request->Minuta;
  //echo $request->Fecha1;
  //echo $request->Estatus;
  

  if($id!=null){
    $complemento = "";
      if( $request->Fecha1 != 0 ){
        $complemento = "and fecha ='$request->Fecha1'"; 

    } if( $request->Estatus != 0 ){
        $complemento = " and estatus='$request->Estatus'";

    } if( $request->Fecha1 != null && $request->Estatus != null ){
        $complemento ="and fecha= '$request->Fecha1'  and estatus='$request->Estatus' ";
    }
  
  $querybusqueda = \DB::select("select * from acuerdos where deleted_at is null  ".$complemento."
  order by id_acuerdo asc");
  
 // var_dump($querybusqueda);
  return view('consultas/consultaacuerdos', ['datos'=>$querybusqueda]);
}else{
  return Redirect::to('login');
}}
}
