<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ReunionController extends Controller
{
    public function Reunion(){
        if(session('sid')!=null){
        $seccion = 1;
        
        return view('reunion')->with('seccion',$seccion);

        }else{

            return Redirect::to('/login');
        }
}

public function Insertar(Request $request){
    $idusuario=session('sid');
    $this->validate($request, [
        'nombre'=>'required',
        'f_inicio'=>"required",
        'f_fin' =>'required',
        't_reunion'=>'required'
   
    ]);
    $query = \DB::insert("insert into reunion values(sec_reunion.nextval,'$request->nombre','$request->f_inicio','$request->f_fin','$request->t_reunion',CURRENT_TIMESTAMP,null,null,'$idusuario')");
    //echo $query;

    return Redirect::to('reunion')->with('message','Se ha creado reunión correctamente.'); 

}
public function ConsultReun(){
        if(session('sid')!=null){
        $query=\DB::select("select id_reunion, nombre,  to_char(f_inicio,'DD-MM-YYYY') as f_inicio,to_char(f_fin,'DD-MM-YYYY') as f_fin,tipo_reunion  from reunion where deleted_at is null order by id_reunion asc");
      // $f_inicio= date('Y-m-d', strtotime($query[0]->f_inicio));
       //$fecha2= date('Y-m-d', strtotime($query[0]->f_fin));
     
        return view('consultas/consultareunion', ['datos'=>$query])
          ;

        }else{

        return Redirect::to('/login');
        }   
}
  public function DeletedRe($id_reunion){
        if(session('sid')!=null){
       $idusuario=session('sid');
     // $esto=$id;
    $existe_m=\DB::select("select n_reunion from minuta where  n_reunion= ".$id_reunion."");

    if (empty($existe_m)) {
        echo 'vacio';
       
        $query=\DB::update("update reunion
        SET deleted_at = CURRENT_TIMESTAMP,
        idusuarios = $idusuario
        WHERE id_reunion= '$id_reunion'");
        return Redirect::to('/consultareun')->with('info','Se ha eliminado correctamente.');
    }else{
        echo 'si existe';
        return Redirect::to('/consultareun')->with('warning','No se puede eliminar.');
    }
     
        
     
        }else{

        return Redirect::to('/login');
    }   
}
  public function ModificarRe($idr){
        if(session('sid')!=null){
            
        $seccion = 2;
      
        $query = \DB::select("select id_reunion, nombre,  to_char(f_inicio,'YYYY-MM-DD')  as f_inicio,to_char(f_fin,'YYYY-MM-DD') as f_fin,tipo_reunion   from reunion where deleted_at is null and id_reunion='$idr'");

        return view('reunion')->with('seccion',$seccion)
                              ->with('datos',$query[0]);
        }else{
        return Redirect::to('/login');
    }
}
public function ActualizarReunion(Request $request){
    if(session('sid')!=null){
        $this->validate($request, [
            'nombre'=>'required',
            'f_inicio'=>"required",
            'f_fin' =>'required|date',
            't_reunion'=>'required'
       
        ]);
        $idusuario=session('sid');
        $update = \DB::update("update reunion
        set
        nombre    = '$request->nombre',
        f_inicio    = '$request->f_inicio',
        f_fin    = '$request->f_fin',
        tipo_reunion='$request->t_reunion',
        update_at = CURRENT_TIMESTAMP,
        idusuarios='$idusuario'
        where id_reunion = '$request->id_reunion'");
    // echo "--->".$request->nombres;
       return Redirect::to('/consultareun')->with('info','Se ha actualizado correctamente.');
    
    }else{
       return Redirect::to('/login');
    }
}
 
  
}
