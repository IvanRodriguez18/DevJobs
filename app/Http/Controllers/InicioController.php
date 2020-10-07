<?php

namespace App\Http\Controllers;

use App\Ubicacion;
use App\Vacante;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //Importando las ultimas vacantes atraves del modelo Vacante para enviarlas a la vista
        $vacantes = Vacante::latest()->where('estatus', 1)->take(6)->get();
        $ubicaciones = Ubicacion::all();
        return view('inicio.index', compact('vacantes', 'ubicaciones'));
    }
}
