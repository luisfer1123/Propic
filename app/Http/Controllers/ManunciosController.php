<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncio;
use App\Models\Departamento;
use App\Models\Ciudade;
use App\Models\Categoria;
use App\Models\Tipo;
use App\Models\Foto;

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
                "tipos"=>$tipos,"ciudad"=>$ciudad_id,"id_anuncio"=>$id],compact("departamentos"));
                    
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
        $portadaA = Anuncio::findOrFail($id);
        $fotosA = DB::select("select nombre from fotos where id_anuncio=$id");


        $Manuncio = Anuncio::findOrFail($id);
        $Manuncio->id_ciudad = $request->get('ciudad');
        $Manuncio->id_categoria = $request->get('categoria');
        $Manuncio->tipo_anuncio = $request->get('tipo');
        $Manuncio->barrio = $request->get('barrio');
        $Manuncio->direccion = $request->get('direccion');
        $Manuncio->descripcion = $request->get('descripcion');
        $Manuncio->cuartos = $request->get('cuartos');
        $Manuncio->metros_cuadrados = $request->get('Mcuadrados');

        if($request->hasFile("portada") && $request->hasFile("imagenes")){
            $files = $request->file('portada');
            $num = rand(0,9999);
            $portada_name = $num.'-'.uniqid().'_'.time() . '.' . $portada->getClientOriginalExtension();
            $portada->move(public_path()."/images/anuncios",$portada_name);
            $Manuncio->portada = $portada_name;
            $Manuncio->update();

            unlink('images/anuncios/'.$portadaA);

            $files = $request->file("imagenes");
            foreach($files as $file){
                $fotos = Foto::where("id_anuncio","=",$id);
                $num = rand(0,9999);
                $file_name = $num.'-'.uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path()."/images/anuncios",$file_name);
                $fotos->nombre = $file_name;
                $fotos->id_anuncio = $id; 
                $fotos->update();
            }

            foreach($fotosA as $foto){
                unlink('images/anuncios/'.$foto->nombre);
            }
        }elseif($request->hasFile("portada")){
            $files = $request->file('portada');
            $num = rand(0,9999);
            $portada_name = $num.'-'.uniqid().'_'.time() . '.' . $portada->getClientOriginalExtension();
            $portada->move(public_path()."/images/anuncios",$portada_name);
            $Manuncio->portada = $portada_name;
            $Manuncio->update();

            unlink('images/anuncios/'.$portadaA);
        }elseif($request->hasFile("imagenes")){
            $files = $request->file("imagenes");
            foreach($files as $file){
                $fotos = Foto::where("id_anuncio","=",$id);
                $num = rand(0,9999);
                $file_name = $num.'-'.uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path()."/images/anuncios",$file_name);
                $fotos->nombre = $file_name;
                $fotos->id_anuncio = $id; 
                $fotos->update();
            }

            foreach($fotosA as $foto){
                unlink('images/anuncios/'.$foto->nombre);
            }
        }else{
            $Manuncio->update();
        }

        return redirect('/MisAnuncios');

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
