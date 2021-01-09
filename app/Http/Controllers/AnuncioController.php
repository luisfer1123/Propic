<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Ciudade;
use App\Models\Categoria;
use App\Models\Tipo;
use App\Models\Anuncio;
use App\Http\Requests\AnuncioRequest;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos=Departamento::all();
        $categorias = Categoria::all();
        $tipos = Tipo::all();
        return view('pages.anuncios',["categorias"=>$categorias,"tipos"=>$tipos],compact("departamentos"));

    }

    public function ciudades(Request $request){
        if ($request->ajax()) {
            $ciudades = Ciudade::where('id_departamento', $request->id_departamento)->get();
            foreach ($ciudades as $ciudad) {
                $ciudadesArray[$ciudad->id] = $ciudad->nombre;
            }
            return response()->json($ciudadesArray);
        }
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
    public function store(AnuncioRequest $request)
    {
        
            $anuncio_nuevo = new Anuncio();
            $anuncio_nuevo->id_user = auth()->id();
            $anuncio_nuevo->id_ciudad = request('ciudad');
            $anuncio_nuevo->id_categoria = request('categoria');
            $anuncio_nuevo->tipo_anuncio = request('tipo');
            $anuncio_nuevo->barrio = request('barrio');
            $anuncio_nuevo->direccion = request('direccion');
            $anuncio_nuevo->descripcion = request('descripcion');
            $anuncio_nuevo->cuartos = request('cuartos');
            $anuncio_nuevo->metros_cuadrados = request('Mcuadrados');
            $anuncio_nuevo->save();
        
        return redirect('/anuncios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
