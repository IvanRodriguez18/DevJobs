<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Experiencia;
use App\Salario;
use App\Ubicacion;
use App\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$vacantes = auth()->user()->vacantes;
        $vacantes = Vacante::where('user_id', auth()->user()->id)->latest()->simplePaginate(6);
        //dd($vacantes);
        return view('vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //haciendo la consulta a la tabla de categoria
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();
        return view('vacantes.create')
        ->with('categorias', $categorias)
        ->with('experiencias', $experiencias)
        ->with('ubicaciones', $ubicaciones)
        ->with('salarios', $salarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validando los datos del formulario
        $data = $request->validate([
            'vacante' => 'required|min:10',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'skill' => 'required'
        ]);
        /*Almacenar la vancante en la base de datos*/
        auth()->user()->vacantes()->create([
            'vacante' => $data['vacante'],
            'imagen' => $data['imagen'],
            'skill' => $data['skill'],
            'descripcion' => $data['descripcion'],
            'salario_id' => $data['salario'],
            'ubicacion_id' => $data['ubicacion'],
            'experiencia_id' => $data['experiencia'],
            'categoria_id' => $data['categoria']

        ]);
        return redirect()->action('VacanteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        //
        if ($vacante->estatus == 0) {
            return abort(404);
        }
        return view('vacantes.show')->with('vacante', $vacante);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        $this->authorize('view', $vacante);

        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();
        return view('vacantes.edit')
        ->with('categorias', $categorias)
        ->with('experiencias', $experiencias)
        ->with('ubicaciones', $ubicaciones)
        ->with('salarios', $salarios)
        ->with('vacante', $vacante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        $this->authorize('update', $vacante);

        //Validando los datos del formulario
        $data = $request->validate([
            'vacante' => 'required|min:10',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'skill' => 'required'
        ]);

        $vacante->vacante = $data['vacante'];
        $vacante->skill = $data['skill'];
        $vacante->imagen = $data['imagen'];
        $vacante->descripcion = $data['descripcion'];
        $vacante->categoria_id = $data['categoria'];
        $vacante->experiencia_id = $data['experiencia'];
        $vacante->ubicacion_id = $data['ubicacion'];
        $vacante->salario_id = $data['salario'];

        $vacante->save();

        return redirect()->action('VacanteController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante,Request $request)
    {
        $this->authorize('delete', $vacante);
        $vacante->delete();
        return response()->json(['message' => 'success']);
    }

    /*Metodo extra en el controlador para subir las imagenes de la vacante*/
    public function imagen(Request $request)
    {
        $imagen = $request->file('file');
        $nombreImagen = time() . '.' . $imagen->extension();
        $imagen->move(public_path('storage/vacantes'), $nombreImagen);
        return response()->json(['success' => $nombreImagen]);
    }
    /*Metodo para borrar la imagenes del servidor*/
    public function borrarimagen(Request $request)
    {
        if ($request->ajax())
        {
            $imagen = $request->get('imagen');
            //Con este if verificamos que la imagen exista en el servidor
            if (File::exists('storage/vacantes/' . $imagen))
            {
                //Este código elimina la imagen del servidor
                File::delete('storage/vacantes/' . $imagen);
            }
            return response('success', 'Imagen eliminada');
        }
    }
    /*Metodo pára cambiar el estatus de una vacante*/
    public function cambiaEstatusVacante(Request $request, Vacante $vacante)
    {
        //Leer nuevo estado y asignarlo
        $vacante->estatus = $request->estatus;
        //guardar el estado en la BD
        $vacante->save();
        return response()->json(['respuesta' => 'Success']);
    }

    /*Metodo para realizar la busqueda de una vacante*/
    public function buscar(Request $request)
    {
        $data = $request->validate([
            'categoria' => 'required',
            'ubicacion' => 'required'
        ]);

        //Asignación de variables para la busqueda de vacantes
        $categoria = $data['categoria'];
        $ubicacion = $data['ubicacion'];

        $vacantes = Vacante::latest()->where('categoria_id', '=', $categoria)
        ->where('ubicacion_id', '=', $ubicacion)
        ->get();

        return view('buscar.index', compact('vacantes'));
    }

    public function resultado()
    {
        return "Mostrando los resultados de la busqueda con el metodo resultado";
    }
}
