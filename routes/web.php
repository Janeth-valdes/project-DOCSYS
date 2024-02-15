<?php

use App\Http\Controllers\AcuerdosController;
use App\Http\Controllers\ControlvdocController;
use App\Http\Controllers\DocumentosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MejoraController;
use App\Http\Controllers\MinutaController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Routing\RouteUri;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::view('login','login');
//RUTAS LOGIN
Route::get('login', function () { return view('login');})->name('login');


Route::get('/',[LoginController::class, 'Index'])->name('/');


Route::controller(LoginController::class)->group(function(){
    Route::post('login1','Login1')->name('login1');
    Route::get('cerrarsesion','Logout')->name('cerrarsesion');
    Route::get('verdoc/{id}','Verdocumento')->name('verdoc');
});

//RUTAS REUNION
Route::controller(ReunionController::class)->group(function(){
    Route::get('reunion','Reunion')->name('reunion');
    Route::post('EnvioReunion','Insertar')->name('EnvioReunion');
    Route::get('consultareun','ConsultReun')->name('consultareun');
    Route::post('desactivarre/{id}','DeletedRe')->name('desactivarre');
    Route::get('modificarre/{id}','ModificarRe')->name('modificarre');
    Route::post('actualizarreunion','ActualizarReunion')->name('actualizarreunion');


});


//RUTAS MINUTA
Route::controller(MinutaController::class)->group(function(){
    Route::get('minuta','Minuta')->name('minuta');
    Route::post('EnvioMinuta','Insertar')->name('EnvioMinuta');
    Route::get('consultaminu','ConsultMinu')->name('consultaminu');
    Route::post('desactivarmin/{id}','DeletedMin')->name('desactivarmin');
    Route::get('modificarminuta/{id}','ModificarMin')->name('modificarminuta');
    Route::post('actualizarmin','ActualizarMin')->name('actualizarmin');
    Route::get('verevi/{idm}','VerEvidencia')->name('verevi');

});

//RUTAS ACUERDOS
Route::controller(AcuerdosController::class)->group(function(){
    Route::get('acuerdos','Acuerdos')->name('acuerdos');
    Route::post('EnvioAcuerdos','Insertar')->name('EnvioAcuerdos');
    Route::get('consultaacue','ConsultAcue')->name('consultaacue');
    Route::post('desactivarac/{id}','DeletedAc')->name('desactivarac');
    Route::get('modificarac/{id}','ModificarAc')->name('modificarac');
    Route::post('actualizarac','ActualizarAcu')->name('actualizarac');
    Route::get('verevia/{ida}','VerEvidenciaA')->name('verevia');
    Route::post('buscarac','BuscarAcuerdos')->name('buscarac');
});

//RUTAS MEJORA
Route::controller(MejoraController::class)->group(function(){
    Route::get('mejora','Mejora')->name('mejora');
    Route::post('EnvioMejora','Insertar')->name('EnvioMejora');
    Route::get('consultamej','ConsultMej')->name('consultamej');
    Route::post('desactivarme/{id}','DeletedMe')->name('desactivarme');
    Route::get('modificarme/{id}','ModificarMe')->name('modificarme');
    Route::post('actualizarme','ActualizarMe')->name('actualizarme');

});

//RUTAS DOCUMENTOS

Route::controller(DocumentosController::class)->group(function(){
    Route::post('EnvioDocumento','Insertar')->name('EnvioDocumento');
    Route::get('documento','Documentos')->name('documento');
    Route::get('consultadoc','ConsultDoc')->name('consultadoc');
    Route::get('consultadocEdit','ConsultDocEdit')->name('consultadocEdit');
    Route::get('listado','Index');
    Route::post('desactivardoc/{id}','DeletedDoc')->name('desactivardoc');
    Route::get('controlvdoc','Controlvdoc')->name('controlvdoc');
   
   
});
Route::controller(ControlvdocController::class)->group(function(){
    Route::get('controlvdoc','Controlvdoc')->name('controlvdoc');
   
   
});

//RUTAS USUARIOS
Route::controller(UsuariosController::class)->group(function(){
    Route::get('usuarios','Usuarios')->name('usuarios');
    Route::post('EnvioUsuarios','Insertar')->name('EnvioUsuarios');
    Route::get('consultausu','ConsultUsu')->name('consultausu');
    Route::post('desactivarus/{id}','DeletedUs')->name('desactivarus');
    Route::get('modificarus/{id}','ModificarUs')->name('modificarus');
    Route::post('actualizarus','ActualizarUs')->name('actualizarus');

});

