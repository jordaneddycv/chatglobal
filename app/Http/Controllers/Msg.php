<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ussers;

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

        if($usuarioExistente) {
            
            $session = Session();
            $session->put('nombre', $nombre);
        return view('templates/header').view('buzon');

        }else {

            $session = Session();
            $session->put('nombre', $nombre);
    
            $envio= new ussers();
            $envio->nombre = $nombre;
            $envio->save();
            return view('templates/header').view('buzon');

        }
    }
}
