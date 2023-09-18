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
            return view('mejora')->with('seccion',$seccion);

        }else{

            return Redirect::to('/login');
        }  

    }
    public function ConsultMej(){
        if(session('sid')!=null){
            $query=\DB::select("select *  from mejora where deleted_at is null");
        
         
            return view('consultas/consultamejora',['datos'=>$query]);

        }else{

            return Redirect::to('/login');
        }   
     
     }
     public function Insertar(Request $request){
        $this->validate($request, [
            'fecha'=>'required',
            'nombre'=>"required",
            'diagnostico' =>'required',
            'mejora'=>'required',
            'efectos'=>'required'
       
        ]);
  
        $query = \DB::insert("insert into mejora values(sec_mejora.nextval,'$request->fecha','$request->nombre','$request->diagnostico','$request->mejora','$request->efectos',CURRENT_TIMESTAMP,null,null,null)");
        return Redirect::to('mejora')->with('message','Se ha enviado mejora correctamente.'); 
    }
    public function DeletedMe($id_mejora){
        if(session('sid')!=null){
          
            $query=\DB::update("update mejora
            SET deleted_at = CURRENT_TIMESTAMP
            WHERE id_mejora= '$id_mejora'");

            return Redirect::to('consultamej');
   

        }else{

            return Redirect::to('/login');
        }   
     
      }
      public function ModificarMe($idm){
        if(session('sid')!=null){
        $seccion = 2;
        $query = \DB::select("select *  from mejora where deleted_at is null and id_mejora='$idm'");

        return view('mejora')->with('seccion',$seccion)
                              ->with('datos',$query[0]);
        }else{
        return Redirect::to('/login');
    }
}
public function ActualizarMe(Request $request){
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
            fecha           = CURRENT_TIMESTAMP,
            nombre          = '$request->nombre',
            diagnostico    = '$request->diagnostico',
            mejora        = '$request->mejora',
            efectos         = '$request->efectos',
            update_at = CURRENT_TIMESTAMP
            where id_mejora = '$request->id_mejora'");
       
   // echo "--->".$request->id_mejora;
    return Redirect::to('/consultamej')->with('info','Se ha actualizado correctamente.');
  
  }else{
    return Redirect::to('/login');
  }
  }

}
