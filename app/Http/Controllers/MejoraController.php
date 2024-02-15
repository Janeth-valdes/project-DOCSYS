<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;

class MejoraController extends Controller
{
    public function Mejora(){
        if(session('sid')!=null){
            $seccion = 1;
    
            return view('mejora')
         
            ->with('seccion',$seccion);

        }else{

            return Redirect::to('/login');
        }  

    }
    public function ConsultMej(){
        if(session('sid')!=null){
            $idusuario = session('sid');
            $rol = session('srol');
          if($rol == 1){
            $query=\DB::select("select id_mejora,to_char(fecha,'DD-MM-YYYY') as fecha, nombre, diagnostico, mejora, efectos,estatus   from mejora where deleted_at is null");
            return view('consultas/consultamejora',['datos'=>$query]);
          }else{
            $query=\DB::select("select id_mejora,to_char(fecha,'DD-MM-YYYY') as fecha, nombre, diagnostico, mejora, efectos,estatus   from mejora where idpersona= ".$idusuario." and deleted_at is null");
            return view('consultas/consultamejora',['datos'=>$query]);
          }
            

        }else{

            return Redirect::to('/login');
        }   
     
     }
     public function Insertar(Request $request){
        $idusuario = session('sid');
        $this->validate($request, [
            'fecha'=>'required',
            'nombre'=>"required",
            'diagnostico' =>'required',
            'mejora'=>'required',
            'efectos'=>'required'
       
        ]);
  
        $query = \DB::insert("insert into mejora values(sec_mejora.nextval,'$request->fecha','$request->nombre','$request->diagnostico','$request->mejora','$request->efectos',CURRENT_TIMESTAMP,null,null,null,'$idusuario')");
        return Redirect::to('mejora')->with('message','Se ha enviado mejora correctamente.'); 
    }
    public function DeletedMe($id_mejora){
        if(session('sid')!=null){
            $idusuario = session('sid');
            $query=\DB::update("update mejora
            SET deleted_at = CURRENT_TIMESTAMP,
                idpersona  = $idusuario
            WHERE id_mejora= '$id_mejora'");

            return Redirect::to('consultamej')->with('info','Se ha eliminado correctamente.');
   

        }else{

            return Redirect::to('/login');
        }   
     
      }
      public function ModificarMe($idm){
        if(session('sid')!=null){
        $seccion = 2;
        $query = \DB::select("select id_mejora,to_char(fecha,'YYYY-MM-DD') as fecha, nombre, diagnostico, mejora, efectos,estatus   from mejora where deleted_at is null and id_mejora='$idm'");
        //echo $query[0]->fecha;
        return view('mejora')->with('seccion',$seccion)
                              ->with('datos',$query[0]);
        }else{
        return Redirect::to('/login');
    }
}
public function ActualizarMe(Request $request){
    $idusuario = session('sid');
    if(session('sid')!=null){
        $this->validate($request, [
            'fecha'=>'required',
            'nombre'=>"required",
            'diagnostico' =>'required',
            'mejora'=>'required',
            'efectos'=>'required'
       
        ]);
            $idusuario=session('sid');
            $update = \DB::update("update mejora
            set
            fecha           = '$request->fecha',
            nombre          = '$request->nombre',
            diagnostico     = '$request->diagnostico',
            mejora          = '$request->mejora',
            efectos         = '$request->efectos',
            idpersona       = '$idusuario',
            update_at = CURRENT_TIMESTAMP
            where id_mejora = '$request->id_mejora'");
       
   // echo "--->".$request->id_mejora;
    return Redirect::to('/consultamej')->with('info','Se ha actualizado correctamente.');
  
  }else{
    return Redirect::to('/login');
  }
  }

}
