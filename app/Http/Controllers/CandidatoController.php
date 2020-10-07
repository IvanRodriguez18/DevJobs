<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Vacante;
use Illuminate\Http\Request;
use App\Notifications\NuevoCandidato;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Obteniendo el id de la vacante actual
        $id_vacante =  $request->route('id');
        //Obteniendo los candidatos por cada vacante dependiendo el id que pase el usuario
        $vacante = Vacante::findOrFail($id_vacante);
        $this->authorize('view', $vacante);
        return view('candidatos.index', compact('vacante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validando los datos del formulario de candidato
        $data = $request->validate([
            'nombre' => 'required|min:10',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf',
            'vacante_id' => 'required'
        ]);
        //Almacenar el archivo PDF en la base de datos
        if ($request->file('cv'))
        {
            $archivo = $request->file('cv');
            $nombreArchivoservidor = time() . "." . $request->file('cv')->extension();
            $ubicacionServidor = public_path('/storage/cv');
            $archivo->move($ubicacionServidor, $nombreArchivoservidor);
        }

        $vacante = Vacante::find($data['vacante_id']);

        $vacante->candidatos()->create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'cv' => $nombreArchivoservidor
        ]);

        $reclutador = $vacante->reclutador;
        $reclutador->notify( new NuevoCandidato($vacante->vacante, $vacante->id));

        //$candidato = new Candidato();
        //$candidato->fill($data);
        //$candidato->save();

        return back()->with('success', 'Tus datos han sido enviados correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
