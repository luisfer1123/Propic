<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Ciudade;
use App\Models\Categoria;
use App\Models\Tipo;
use App\Models\Anuncio;
use App\Models\Foto;
use App\Http\Requests\AnuncioRequest;
use Illuminate\Support\Facades\DB;



class AnuncioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$anuncios = Anuncio::all();
        $Tanuncios = Anuncio::where('id_user','=',auth()->id())->count();
        $anuncios = DB::select("select  a.id,ci.nombre as 'ciudad',f.nombre as 'nombre_foto',c.nombre as 'categoria' ,t.nombre as 'tipo_anuncio',a.descripcion,
        a.cuartos,a.metros_cuadrados,date_format( a.created_at,'%d/%m/%y') as 'created_at' from anuncios a,categorias c,fotos f,tipos t,ciudades ci where a.id_ciudad = ci.id and a.id_categoria = c.id
        and a.tipo_anuncio = t.id and f.id_anuncio = a.id ");

        $departamentos=Departamento::all();
        $categorias = Categoria::all();
        $tipos = Tipo::all();

        return view('pages.anuncios',["total_anuncios"=>$Tanuncios,"anuncios"=>$anuncios,"categorias"=>$categorias,"tipos"=>$tipos],compact("departamentos"));

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
            $id_anuncio = $anuncio_nuevo->id;
            if($request->hasFile("imagenes")){
                $files = $request->file("imagenes");
                foreach($files as $file){
                    $fotos = new Foto();
                    $num = rand(0,9999);
                    $file_name = $num.'-'.uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path()."/images/anuncios",$file_name);
                    $fotos->nombre = $file_name;
                    $fotos->id_anuncio = $id_anuncio; 
                    $fotos->save();
                }
            }

            
            
            
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
