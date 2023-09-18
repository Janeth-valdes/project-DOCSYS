<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;

class MinutaController extends Controller
{
    public function Minuta(){
        
        if(session('sid')!=null){
            $seccion = 1;
            $query2 = \DB::select("select max(id_reunion) as id from reunion");
            if($query2[0]->id == null)
            {
            $seccion = 3;
            return view('minuta')
                    ->with('seccion',$seccion);
            }else{
            $query = \DB::select("select max(id_reunion) as id from reunion where tipo_reunion='Reunion calidad'");
            
            $query3 = \DB::select("select * from reunion where id_reunion =".$query2[0]->id);
            $query4 = \DB::select("select * from usuarios where  deleted_at is null ");
            
            

            //var_dump($usuarios); 
            return view('minuta')
                    ->with('seccion',$seccion)
                    ->with('query',$query[0])
                    ->with('datos',$query3[0])
                    ->with('usuarios',$query4);
            }
        }else{

            return Redirect::to('/login');
        }
    }
    public function ConsultMinu(){
        if(session('sid')!=null){
            $query=\DB::select("select * from minuta where deleted_at is null order by id_minuta asc");
         
            $query4 = \DB::select("select participantes from minuta where id_minuta='59'");
           //var_dump($query4);
            $array_num = count($query4);
           // echo $array_num;
              return  view('consultas/consultaminutas',['datos'=>$query]);
              
           // return view('consultas/consultaminutas');

        }else{

            return Redirect::to('/login');
        }   
     
      }
      public function Insertar(Request $request){
             
          $idusuario=session('sid');
          $this->validate($request, [
            'asunto'=>'required',
            'lugar'=>"required",
            'fecha' =>'required',
            'duracion'=>'required',
            'participantes'=>'required|array|min:1'
       
        ]);
          $documento_nombre=$_FILES['evidencia']['name'];
          $documento_tipo = $_FILES['evidencia']['type'];
          $documento_temp = $_FILES['evidencia']['tmp_name'];
          $asunto =$request->asunto;
          $n_reunion =$request->n_reunion;
          $asunto =$request->asunto;
          $lugar = $request->lugar;
          $duracion = $request->duracion;
          $participantes = $_POST['participantes'];
          $separados= implode(",",$participantes);
          $fecha = $request->fecha;
   

          $conn=  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');

          if(!$conn){
            $error= oci_error();
            die("ERROR: ".$error["message"]);
          }

          if ($documento_temp=="") {
            echo 'No hay archivosss';
     
            $query = \DB::insert("insert into minuta values(sec_calidad.nextval,'$n_reunion','$asunto','$lugar','$fecha','$duracion',CURRENT_TIMESTAMP,null,null,null,null,'$separados')");
            
          }else{
          $documento_string=  file_get_contents($documento_temp);

         
          $st= oci_parse($conn, 'INSERT INTO minuta (id_minuta, n_reunion,asunto,lugar,fecha,duracion,participantes,CREATE_AT,UPDATE_AT,DELETED_AT,tipo,evidencia) 
            VALUES (sec_calidad.nextval, :n_reunion,:asunto,:lugar,:fecha,:duracion,:participantes,CURRENT_TIMESTAMP,NULL,NULL,:tipo,empty_blob())
            RETURNING evidencia INTO :evidencia');

            $blob=oci_new_descriptor($conn, OCI_D_LOB);


            oci_bind_by_name($st, ":n_reunion",$n_reunion);
            oci_bind_by_name($st, ":asunto", $asunto);
            oci_bind_by_name($st, ":lugar", $lugar);
            oci_bind_by_name($st, ":fecha", $fecha);
            oci_bind_by_name($st, ":duracion", $duracion);
            oci_bind_by_name($st, ":participantes",$separados);
            oci_bind_by_name($st, ":tipo",$documento_tipo);
            oci_bind_by_name($st, ":evidencia", $blob, -1, OCI_B_BLOB);

            oci_execute($st, OCI_NO_AUTO_COMMIT);
            $blob->save($documento_string); 

            oci_commit($conn); 

            $blob->free();
            oci_free_statement($st);
            oci_close($conn);

          }
       //   echo $documento_tipo;
           
           return Redirect::to('minuta')->with('message','Se ha creado minuta correctamente.'); 




        
    }
    public function DeletedMin($id_minuta){
        if(session('sid')!=null){
          
            $query=\DB::update("update minuta
            SET deleted_at = CURRENT_TIMESTAMP
            WHERE id_minuta= '$id_minuta'");

            return Redirect::to('consultaminu');
   

        }else{

            return Redirect::to('/login');
        }   
     
      }
      public function ModificarMin($idm){
        if(session('sid')!=null){
        $seccion = 2;
    
        
          $query = \DB::select("select * from minuta where deleted_at is null and id_minuta='$idm'");
          $conn=  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');
  
          $sql="SELECT n_reunion,asunto, lugar,fecha, duracion, tipo, evidencia FROM minuta WHERE id_minuta = '$idm' and deleted_at is null";
          $stmt = oci_parse($conn, $sql);
          oci_execute($stmt);
          
          $archivo= oci_fetch_array($stmt, OCI_ASSOC + OCI_NUM + OCI_RETURN_NULLS);      
          $n_reunion =$archivo[0];
          $asunto =$archivo[1];
          $lugar =$archivo[2];
          $fecha =$archivo[3];
          $duracion =$archivo[4];
          $tipo =$archivo[5];
          if(empty($archivo[6])){
             // echo 'NO HAY NADA';
              oci_free_statement($stmt);
              oci_close($conn);

              $blob="";

              //header para tranformar la salida en el tipo de archivo que hemos guardado
              header("Content-type: $tipo"); 


              return view('minuta')->with('seccion',$seccion)
              ->with('n_reunion',$n_reunion)
              ->with('asunto',$asunto)
              ->with('lugar',$lugar)
              ->with('fecha',$fecha)
              ->with('duracion',$duracion)
              ->with('blobd',$blob)
              ->with('tipo',$tipo)
              ->with('datos',$query[0]);
          }else{
                //echo 'contiene algo';
                $blob=$archivo[6]->load();
                oci_free_statement($stmt);
                oci_close($conn);
                
                //header para tranformar la salida en el tipo de archivo que hemos guardado
                header("Content-type: $tipo"); 
              
            
                return view('minuta')->with('seccion',$seccion)
                ->with('n_reunion',$n_reunion)
                ->with('asunto',$asunto)
                ->with('lugar',$lugar)
                ->with('fecha',$fecha)
                ->with('duracion',$duracion)
                ->with('blobd',$blob)
                ->with('tipo',$tipo)
                ->with('datos',$query[0]);
          }
         

      }else{
        return Redirect::to('/login');
    }
}
public function ActualizarMin(Request $request){
    if(session('sid')!=null){
      $this->validate($request, [
        'asunto'=>'required',
        'lugar'=>"required",
        'fecha' =>'required',
        'duracion'=>'required'
   
    ]);
      $idusuario=session('sid');
  
          $documento_nombre=$_FILES['evidencia']['name'];
          $documento_tipo = $_FILES['evidencia']['type'];
          $documento_temp = $_FILES['evidencia']['tmp_name'];
          $id = $request->id_minuta;
          $asunto = $request->asunto;
          $lugar = $request->lugar;
          $fecha= $request->fecha;
          $duracion = $request->duracion;       
       

          $conn=  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');

         if(!$conn){
            $error= oci_error();
            die("ERROR: ".$error["message"]);
          }
          if ($documento_temp=="") {
           echo 'No hay archivo';
           $update = \DB::update("update minuta
           set
           asunto    = '$request->asunto',
           duracion  = '$request->duracion',
           lugar     = '$request->lugar',
           fecha     = '$request->fecha',
           update_at = CURRENT_TIMESTAMP
           where id_minuta = '$request->id_minuta'");


            } else {

            $documento_string=  file_get_contents($documento_temp);
            $blob=oci_new_descriptor($conn, OCI_D_LOB);
            $st= oci_parse($conn, "UPDATE minuta 
            SET 
            asunto= '$asunto',
            lugar ='$lugar', 
            fecha ='$fecha', 
            duracion = '$duracion',
            tipo='$documento_tipo',
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
              echo 'Hay archivo';
            } 
       
       
      
 
     //echo $request->asunto;

    //echo "--->ENTRO A ACTUALIZAR--->".$request->id_minuta;
    return Redirect::to('/consultaminu')->with('info','Se ha actualizado correctamente.');
  
  }else{
    return Redirect::to('/login');
  }
  }
  public function VerEvidencia($idm){
   
    $conn=  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');
    
    $sql="SELECT evidencia, tipo FROM minuta WHERE id_minuta = '$idm' and deleted_at is null";
    
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
