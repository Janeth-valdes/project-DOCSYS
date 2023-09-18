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
            $query2 = \DB::select("select max(id_reunion) as id from reunion");
            if($query2[0]->id == null)
            {
            $seccion = 3;
            return view('acuerdos')
                    ->with('seccion',$seccion);
            }else{
            $query = \DB::select("select max(id_reunion) as id from reunion where tipo_reunion='Reunion calidad'");
           
            $query3 = \DB::select("select * from reunion where id_reunion =".$query2[0]->id);
            $query4 = \DB::select("select * from usuarios where deleted_at is null ");
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
            $query=\DB::select("select *  from acuerdos where deleted_at is null order by id_acuerdo asc");
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
        $fechaf =$request->fecha;
        $descripcion = $request->descripcion;
        $DA=$request->DA;
        $responsable = $_POST['responsable'];
        $separados= implode(",",$responsable);
        $estatus = $request->estatus;
        $texto=$request->directorio;
       
        $conn=  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');

        if(!$conn){
          $error= oci_error();
          die("ERROR: ".$error["message"]);
        }

        if ($documento_temp=="") {
          //echo 'No hay archivo';
          $query = \DB::insert("insert into acuerdos values(sec_acuerdos.nextval,'$n_acuerdo','$fechaf','$separados','$descripcion','$DA',CURRENT_TIMESTAMP,null,null,'$estatus',null,null)");
       
        }else{
        $documento_string=  file_get_contents($documento_temp);

       
        $st= oci_parse($conn, 'INSERT INTO acuerdos (id_acuerdo,n_acuerdo, fecha,responsable, descripcion,DA,CREATE_AT,UPDATE_AT,DELETED_AT,estatus,tipo,evidencia) 
          VALUES (sec_acuerdos.nextval,:n_acuerdo,:fecha,:responsable,:descripcion,:DA,CURRENT_TIMESTAMP,NULL,NULL,:estatus,:tipo,empty_blob())
          RETURNING evidencia INTO :evidencia');

          $blob=oci_new_descriptor($conn, OCI_D_LOB);


          oci_bind_by_name($st, ":n_acuerdo",$n_acuerdo);
          oci_bind_by_name($st, ":fecha", $fechaf);
          oci_bind_by_name($st, ":responsable", $separados);
          oci_bind_by_name($st, ":descripcion", $descripcion);
          oci_bind_by_name($st, ":DA", $DA);
          oci_bind_by_name($st, ":estatus",$estatus);
          oci_bind_by_name($st, ":tipo",$documento_tipo);
          oci_bind_by_name($st, ":evidencia", $blob, -1, OCI_B_BLOB);

          oci_execute($st, OCI_NO_AUTO_COMMIT);
          $blob->save($documento_string); 

          oci_commit($conn); 

          $blob->free();
          oci_free_statement($st);  
          oci_close($conn);
        
       //$query = \DB::insert("insert into acuerdos values(sec_acuerdos.nextval,'$request->n_acuerdo','$request->fecha','$request->responsable','$request->descripcion','$nombrea',CURRENT_TIMESTAMP,null,null,'$request->estatus')");
    
     // return Redirect::to('consultaacue');
     
        }
        return Redirect::to('acuerdos')->with('message','Se ha creado acuerdo correctamente.'); 
     
    }
    public function DeletedAc($id_acuerdo){
        if(session('sid')!=null){
          
            $query=\DB::update("update acuerdos
            SET deleted_at = CURRENT_TIMESTAMP
            WHERE id_acuerdo= '$id_acuerdo'");

            return Redirect::to('consultaacue');
   

        }else{

            return Redirect::to('/login');
        }   
     
      }
      public function ModificarAc($ida){
        if(session('sid')!=null){
        $seccion = 2;
        
          $query = \DB::select("select * from acuerdos where deleted_at is null and id_acuerdo='$ida'");
          $conn=  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');
  
          $sql="SELECT n_acuerdo, fecha, responsable, descripcion,DA, estatus, tipo, evidencia FROM acuerdos WHERE id_acuerdo = '$ida' and deleted_at is null";
          $stmt = oci_parse($conn, $sql);
          oci_execute($stmt);
          
          $archivo= oci_fetch_array($stmt, OCI_ASSOC + OCI_NUM + OCI_RETURN_NULLS);      
          $n_acuerdo =$archivo[0];
          $fecha =$archivo[1];
          $responsable =$archivo[2];
          $descripcion =$archivo[3];
          $DA          =$archivo[4];
          $estatus =$archivo[5];
          $tipo =$archivo[6];
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
              ->with('responsable',$responsable)
              ->with('descripcion',$descripcion)
              ->with('DA',$DA)
              ->with('estatus',$estatus)
              ->with('blobd',$blob)
              ->with('tipo',$tipo)
              ->with('datos',$query[0]);
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
              ->with('responsable',$responsable)
              ->with('descripcion',$descripcion)
              ->with('DA',$DA)
              ->with('estatus',$estatus)
              ->with('blobd',$blob)
              ->with('tipo',$tipo)
              ->with('datos',$query[0]);
          }
        }else{
        return Redirect::to('/login');
    }
}
public function ActualizarAcu(Request $request){
    if(session('sid')!=null){
      $this->validate($request, [
        'fecha'=>'required',
        'responsable'=>"required",
        'descripcion' =>'required',
        'DA'=>'required'
   
    ]);
      $documento_nombre=$_FILES['evidencia']['name'];
      $documento_tipo = $_FILES['evidencia']['type'];
      $documento_temp = $_FILES['evidencia']['tmp_name'];
      $id = $request->id_acuerdo;
      $fecha = $request->fecha;
      $responsable = $request->responsable;
      $descripcion = $request->descripcion;  
      $DA          = $request->DA;  
      $estatus = $request->estatus;   
   

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
       responsable  = '$request->responsable',
       descripcion     = '$request->descripcion',
       DA              ='$DA',
       update_at = CURRENT_TIMESTAMP
       where id_acuerdo = '$request->id_acuerdo'");


        } else {

          $documento_string=  file_get_contents($documento_temp);
          $blob=oci_new_descriptor($conn, OCI_D_LOB);
          $st= oci_parse($conn, "UPDATE acuerdos 
          SET 
          fecha= '$fecha',
          responsable = '$responsable',
          descripcion ='$descripcion', 
          DA              ='$DA',
          UPDATE_AT = CURRENT_TIMESTAMP, 
          estatus= '$estatus',
          tipo='$documento_tipo',
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

}
