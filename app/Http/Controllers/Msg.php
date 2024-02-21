<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ussers;
use App\Models\mensajes;

class Msg extends Controller
{
    public function mensajeria(){
        // return view('templates/header').view('buzon');
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


        return view('templates/header').view('buzon',$data);

        }else {

            $session->put('nombre', $nombre);
    
            $envio= new ussers();
            $envio->nombre = $nombre;
            $envio->save();

            $session->put('nombre', $nombre);
            $session->put('usuario_id', $nuevoUsuario->id);

            return view('templates/header').view('buzon',$data);
            
        }
    }

/************************************AQUI SERA PARA GUARDAR MENSAJES**********************************************/

    public function guardar_mensaje(){

        $txt = $request->post('mensaje');
        $session = Session();
        // Verificar si el nombre ya existe en la base de datos
        $buzonglobal= new mensajes();
        $buzonglobal->id_usuario = session('usuario_id');
        $buzonglobal->id_receptor = $txt;//f
        $buzonglobal->mensaje = $txt;
        $buzonglobal->save();
        

    }

}
