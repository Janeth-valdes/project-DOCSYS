<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
Use \Carbon\Carbon;

class ControlvdocController extends Controller
{
  public function Controlvdoc(){
    if(session('sid')!=null){
     //   echo "aqui esta control version";
        $query=\DB::select("select d.nombre, d.directorio, d.DELETED_AT
                            from documentos d
                            ");

      
      return view('consultas/controlvdoc', ['doc'=>$query]);

    }else{

        return Redirect::to('/login');
    }  
  }
}