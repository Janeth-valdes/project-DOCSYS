<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;

class LoginController extends Controller
{
    public function Index(){
        if(session('sid')!=null){
                    
            $session= session('sid');
            $rol= session('srol');
           // echo $rol;
            //$query=DB::table('documentos')->get();
             /*$query=\DB::select("select d.id_documento, d.nombre , d.idusuarios,d.documento, d.directorio,d.rol
                            from documentos d 
                            where deleted_at is null ");       
            //insersion de unoxuno*/
                    
            $sql =\DB::select("select d.rol
            FROM documentos d ");
            //IMPRESIÓN DE LOS ARRAYS
           //var_dump($sql[0]->rol);
           
           if(empty($sql)){
            $query=\DB::select("select d.id_documento, d.nombre , d.idusuarios,d.documento, d.directorio,d.rol
            from documentos d
            where deleted_at is null and d.rol = $rol");
          //  echo 'aqui estoy';
           }else {
            $parts = explode(',',$sql[0]->rol);
            //SEPARACIÓN DEL ARRAY POR COMAS
            //CONTEO DE NÚMERO DE ARRAYS
            $array_num = count($parts);
           // echo $parts[0];
           // echo $parts[1];
           // echo $parts[2];
      
           // echo $array_num;
           $query = array();

           for($i = 0; $i < count($parts); $i++){
            if( $rol == $parts[$i]){
                $query=\DB::select("select d.id_documento, d.nombre , d.idusuarios,d.documento, d.directorio,d.rol
                                    from documentos d 
                                    where deleted_at is null and $parts[$i]=$rol");
            }
           }
        }
           /*$query=\DB::select("select d.id_documento, d.nombre , d.idusuarios,d.documento, d.directorio,d.rol
           from documentos d 
           where deleted_at is null and $parts[0]=$rol"); */
       /*
     
           // echo $array_num;
            for ($i = 0; $i < $array_num; ++$i){
            $ejemplo2 =var_dump( $parts[$i]);

            $query=\DB::select("select d.id_documento, d.nombre , d.idusuarios,d.documento, d.directorio,d.rol
            from documentos d
            where deleted_at is null and d.rol = $rol");
        
        }*/

          return  view('index',['datos'=>$query]);
   

        }else{

            return Redirect::to('/login');
        }
}
    public function Login1(Request $request){
        $this->validate($request, [
              'usuario'=>'required|string|alpha',
              'contrasena'=>'required|string'
        
        ]);

        $usuario=$request->usuario;
        $contrasena=$request->contrasena;
        
       // $query=\DB::select("select * from usuarios where deleted_at is null and usuario='$usuario' and contrasena='$contraseña'");
        $query=\DB::select(" select *  
        from rol r 
             inner join usuarios us
        on us.id_rol = r.id_rol 
             inner join g_estudios ge
        on ge.id_ge = us.id_ge and deleted_at is null  and usuario='$usuario'and contrasena='$contrasena'");
        
        if($query!=null){

            Session::put('sid',$query[0]->id_usuario);
            Session::put('sname',$query[0]->nombres);
            Session::put('susuario',$query[0]->usuario);
            Session::put('srol',$query[0]->id_rol);
            Session::put('sarea',$query[0]->abreviatura);
    

            return Redirect::to('/');

        }else{
            return view('login')
                    ->with('msj',"No existe el Usuario o está Desactivado!");
        }
    }
    public function Logout(){
        Session::forget('sid');
		Session::forget('sname');
		Session::forget('susuario');
		Session::forget('srol');

		return redirect()->route('login');
    }
    public function Verdocumento($id){
   
        $conn=  oci_connect('docsys', '123456', '10.40.130.32/ORCL', 'AL32UTF8');
        
        $sql="SELECT DOCUMENTO, tipo FROM DOCUMENTOS WHERE ID_DOCUMENTO = '$id' and deleted_at is null";
        
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
