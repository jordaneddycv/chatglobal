<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Msg extends Controller
{
    public function mensajeria(){
        // return view('templates/header').view('buzon');
        return view('loger');
    }

    public function verificar(){
        echo "prueba";exit;
        return view('templates/header').view('buzon');
    }
}
