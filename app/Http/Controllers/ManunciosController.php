<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncio;
use App\Models\Departamento;
use App\Models\Ciudade;
use App\Models\Categoria;
use App\Models\Tipo;

class ManunciosController extends Controller
{

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myId = auth()->id();
        $misAnuncios = DB::select("select  a.id as 'id_anuncio',a.portada,c.nombre as 'ciudad' ,ca.nombre as 'categoria',t.nombre as 'tipo' 
        from anuncios a,ciudades c,categorias ca,tipos t 
        where a.id_user=".$myId." and a.id_ciudad=c.id and a.id_categoria=ca.id and a.tipo_anuncio=t.id");

        $Tanuncios = Anuncio::where('id_user','=',auth()->id())->count();

        return view('pages.misAnuncios.Manuncios',["total_anuncios"=>$Tanuncios,"Anuncios"=>$misAnuncios]);
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
        //
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
        $Tanuncios = Anuncio::where('id_user','=',auth()->id())->count();
        $departamentos = Departamento::all();
        $datos_anuncio = Anuncio::findOrFail($id);
        $categorias = Categoria::all();
        $tipos = Tipo::all();    
        $ciudad_id = Ciudade::findOrFail($datos_anuncio->id_ciudad);

        return view('pages.misAnuncios.editAnuncio',["total_anuncios"=>$Tanuncios,
                    "datos_anuncio"=>$datos_anuncio,"categorias"=>$categorias,
                "tipos"=>$tipos,"ciudad"=>$ciudad_id],compact("departamentos"));
                    
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
