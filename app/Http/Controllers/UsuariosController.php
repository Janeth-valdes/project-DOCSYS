<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;

class UsuariosController extends Controller
{
  public function Usuarios()
  {
    if (session('sid') != null) {
      $seccion = 1;
      $query = \DB::select("select * from rol");
      $query2 = \DB::select("select * from g_estudios");
      return  view(
        'usuarios',
        ['datosrol' => $query]
      )
        ->with('seccion', $seccion)
        ->with('g_estudios', $query2);
      //  return view('usuarios');

    } else {

      return Redirect::to('/login');
    }
  }
  public function Insertar(Request $request)
  {
    $this->validate($request, [
      'nombres' => 'required',
      'ap_paterno' => "required",
      'ap_materno' => 'required',
      'usuarioo' => 'required|string|max:8|min:8',
      'contrasena' => 'required|string|max:8|min:8'

    ]);
    $query = \DB::insert("insert into usuarios values(sec_usuarios.nextval,'$request->nombres','$request->ap_paterno','$request->ap_materno','$request->usuarioo','$request->contrasena',CURRENT_TIMESTAMP,null,null,'$request->rol','$request->gestudios')");
    //echo $query;
    return Redirect::to('/consultausu')->with('message', 'Se ha creado usuario correctamente.');
  }
  public function ConsultUsu()
  {
    if (session('sid') != null) {
      $query = \DB::select("select * from rol r inner join usuarios us on us.id_rol = r.id_rol inner join g_estudios ge on ge.id_ge = us.id_ge and deleted_at is null");

      return  view('consultas/consultausuarios', ['datos' => $query]);
      //return view('consultas/consultausuarios');

    } else {

      return Redirect::to('/login');
    }
  }
  public function DeletedUs($id)
  {
    if (session('sid') != null) {
      $query = \DB::update("update usuarios
        SET deleted_at = CURRENT_TIMESTAMP
        WHERE id_usuario= '$id'");
<<<<<<< HEAD
        return Redirect::to('consultausu')->with('info','Se ha eliminado correctamente.');
=======
      return Redirect::to('consultausu');
    } else {
>>>>>>> 1db8b5d0c0ee68dd69cc3953ae3e17df68007473

      return Redirect::to('/login');
    }
  }
  public function ModificarUs($id_usuario)
  {
    if (session('sid') != null) {

      $seccion = 2;
      $query = \DB::select(" select *  
                           from rol r 
                                inner join usuarios us
                           on us.id_rol = r.id_rol 
                                inner join g_estudios ge
                           on ge.id_ge = us.id_ge and deleted_at is null and us.id_usuario='$id_usuario'");

      $query2 = \DB::select("select * from rol");
      $query3 = \DB::select("select * from g_estudios");
      // $query = \DB::select("select *  from usuarios where deleted_at is null and id_usuario='$idu'");

      return view('usuarios')->with('seccion', $seccion)
        ->with('datos', $query[0])
        ->with('datos2', $query2)
        ->with('datos3', $query3);
    } else {
      return Redirect::to('/login');
    }
  }
  public function ActualizarUs(Request $request)
  {
    if (session('sid') != null) {
      $this->validate($request, [
        'nombres' => 'required',
        'ap_paterno' => "required",
        'ap_materno' => 'required',
        'usuarioo' => 'required|string|max:8|min:8',
        'contrasena' => 'required|string|max:8|min:8'

      ]);
      $update = \DB::update("update usuarios
    set
    nombres    = '$request->nombres',
    ap_paterno = '$request->ap_paterno',
    ap_materno = '$request->ap_materno',
    usuario     = '$request->usuarioo',
    contrasena      = '$request->contrasena',
    id_rol     = '$request->rol',
    id_ge     = '$request->gestudios',
    update_at = CURRENT_TIMESTAMP
    where id_usuario = '$request->id_usuario'");
      // echo "--->".$request->nombres;
      return Redirect::to('/consultausu')->with('info', 'Se ha actualizado correctamente.');
    } else {
      return Redirect::to('/login');
    }
  }
}
