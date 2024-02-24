<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ussers;
use App\Models\mensajes;
use Illuminate\Support\Facades\DB;


class Msg extends Controller
{
    public function mensajeria(){
        // return view('templates/header').view('buzon');
        return view('loger');
    }

    public function close(){
        Session::forget('usuario_id'); 
        return view('loger');
    }

    public function verificar(Request $request){
        $nombre = $request->post('nombre_usser');

        // Verificar si el nombre ya existe en la base de datos
        $usuarioExistente = Ussers::where('nombre', $nombre)->first();
        $session = Session();

        if($usuarioExistente) {
            
            $session->put('nombre', $nombre);
            $session->put('usuario_id', $usuarioExistente->id);

            $otrosUsuarios = Ussers::where('id', '!=', $usuarioExistente->id)->get();

            //si lo hago de esta manera me devolvera con llaves y todo pues es un vardump
            // $otrosUsuariosArray = $otrosUsuarios->toArray();
            // var_dump($otrosUsuariosArray);
            /* otra forma de hacerlo con for */
            //  foreach ($otrosUsuarios as $usuario) {
            //      echo $usuario->nombre . "<br>";
            //      echo $usuario->id . "<br>";
            //  }

            // $otrosUsuariosArray = array_values($otrosUsuarios->toArray());

        return view('templates/header').view('buzon', ['listaUsuarios' => $otrosUsuarios]);

        }else {

            $session->put('nombre', $nombre);
    
            $envio= new ussers();
            $envio->nombre = $nombre;
            $envio->save();

            $newusser = Ussers::where('nombre', $nombre)->first();
            
            $session->put('nombre', $nombre);
            $session->put('usuario_id', $newusser->id);



            // $otrosUsuarios = Ussers::where('id', '!=', $newusser->id)->pluck('nombre', 'id');}

            // $otrosUsuariosArray = array_values($otrosUsuarios->toArray());
            $otrosUsuarios = Ussers::where('id', '!=', $newusser->id)->get();

            return view('templates/header').view('buzon', ['listaUsuarios' => $otrosUsuarios]);
            
        }
    }

/************************************AQUI SERA PARA GUARDAR MENSAJES**********************************************/

//     public function guardar_mensaje(Request $request){

//         $txt = $request->post('mensaje');
//         $id_destinario = $request->post('idUsuario');
//         // Verificar si el nombre ya existe en la base de datos
//         $buzonglobal= new mensajes();
//         $buzonglobal->id_usuario = session('usuario_id');
//         $buzonglobal->id_receptor = $id_destinario;//f
//         $buzonglobal->mensaje = $txt;
//         $buzonglobal->save();

//         $mensajes = DB::table('mensajes')
//         ->select('mensaje', 'id_usuario')
//         ->where(function ($query) use ($id_destinario) {
//             $query->where('id_usuario', session('usuario_id'))
//                   ->where('id_receptor', $id_destinario);
//         })
//         ->orWhere(function ($query) use ($id_destinario) {
//             $query->where('id_usuario', $id_destinario)
//                   ->where('id_receptor', session('usuario_id'));
//         })
//         ->orderBy('tiempo_mensaje', 'asc') // Ordenar por la columna tiempo_mensaje de forma ascendente (desde el más antiguo)
//         ->get();
    
//         return $mensajes;
//     }
// }
public function guardar_mensaje(Request $request){
    $id_destinario = $request->post('idUsuario');
    // Verificar si la solicitud tiene datos para guardar
    if ($request->has('mensaje') && $request->has('idUsuario')) {
        $txt = $request->post('mensaje');
        $id_destinario = $request->post('idUsuario');
        
        // Guardar el mensaje en la base de datos
        $buzonglobal= new mensajes();
        $buzonglobal->id_usuario = session('usuario_id');
        $buzonglobal->id_receptor = $id_destinario;
        $buzonglobal->mensaje = $txt;
        $buzonglobal->save();
    }

    // Obtener los mensajes
    $mensajes = DB::table('mensajes')
        ->select('mensaje', 'id_usuario')
        ->where(function ($query) use ($id_destinario) {
            $query->where('id_usuario', session('usuario_id'))
                  ->where('id_receptor', $id_destinario);
        })
        ->orWhere(function ($query) use ($id_destinario) {
            $query->where('id_usuario', $id_destinario)
                  ->where('id_receptor', session('usuario_id'));
        })
        ->orderBy('tiempo_mensaje', 'asc')
        ->get();

    // Retornar los mensajes
    return $mensajes;
    }
}