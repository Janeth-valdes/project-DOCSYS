<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ReunionController extends Controller
{
    public function Reunion()
    {
        if (session('sid') != null) {
            $seccion = 1;

            return view('reunion')->with('seccion', $seccion);
        } else {

            return Redirect::to('/login');
        }
    }

    public function Insertar(Request $request)
    {
        $idusuario = session('sid');
        $this->validate($request, [
            'nombre' => 'required',
            'f_inicio' => "required",
            'f_fin' => 'required',
            't_reunion' => 'required'
        ]);
        
        $query = \DB::insert("insert into reunion values(sec_reunion.nextval,'$request->nombre','$request->f_inicio','$request->f_fin',null,'$request->t_reunion',CURRENT_TIMESTAMP,null,null,'$idusuario')");
        //echo $query;
        return Redirect::to('reunion')->with('message', 'Se ha creado reunión correctamente.');
    }
    public function ConsultReun()
    {
        if (session('sid') != null) {
            $query = \DB::select("select *  from reunion where deleted_at is null");

            return view('consultas/consultareunion', ['datos' => $query]);
        } else {

            return Redirect::to('/login');
        }
    }
    public function DeletedRe($id_reunion)
    {
        if (session('sid') != null) {

            // $esto=$id;
            $query = \DB::update("update reunion
        SET deleted_at = CURRENT_TIMESTAMP
        WHERE id_reunion= '$id_reunion'");




            return Redirect::to('/consultareun')->with('info', 'Se ha eliminado correctamente.----->');
        } else {

            return Redirect::to('/login');
        }
    }
    public function ModificarRe($idr)
    {
        if (session('sid') != null) {

            $seccion = 2;

            $query = \DB::select("select *  from reunion where deleted_at is null and id_reunion='$idr'");

            return view('reunion')->with('seccion', $seccion)
                ->with('datos', $query[0]);
        } else {
            return Redirect::to('/login');
        }
    }
    public function ActualizarReunion(Request $request)
    {
        if (session('sid') != null) {
            $this->validate($request, [
                'nombre' => 'required',
                'f_inicio' => "required",
                'f_fin' => 'required|date',
                't_reunion' => 'required'

            ]);
            $idusuario = session('sid');
            $update = \DB::update("update reunion
        set
        nombre    = '$request->nombre',
        f_inicio    = '$request->f_inicio',
        f_fin    = '$request->f_fin',
        participantes= 'null',
        tipo_reunion='$request->t_reunion',
        update_at = CURRENT_TIMESTAMP,
        idusuarios='$idusuario'
        where id_reunion = '$request->id_reunion'");
            // echo "--->".$request->nombres;
            return Redirect::to('/consultareun')->with('info', 'Se ha actualizado correctamente.');
        } else {
            return Redirect::to('/login');
        }
    }
}
