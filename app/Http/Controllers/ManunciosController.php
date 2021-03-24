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
            $portada = $request->file('portada');
            $Manuncio->portada = self::UpdatePortada($portada);
            $Manuncio->update();

            if($portadaA->portada != "default.jpg"){ unlink('images/anuncios/'.$portadaA->portada); }


            foreach($fotosA as $foto){
                self::DeleteFoto($foto->nombre);
            }

            $files = $request->file("imagenes");
            self::InsertFotos($files,$id);

        }elseif($request->hasFile("portada")){
            $files = $request->file('portada');
            $Manuncio->portada = self::UpdatePortada($files);;
            $Manuncio->update();

            if($portadaA->portada != 'default.jpg'){
                unlink('images/anuncios/'.$portadaA->portada);
            }


        }elseif($request->hasFile("imagenes")){

            foreach($fotosA as $foto){
                self::DeleteFoto($foto->nombre);
            }

            $files = $request->file("imagenes");
            self::InsertFotos($files,$id);


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
        $anuncioDelete = Anuncio::findOrFail($id);
        $fotosA = Foto::where("id_anuncio","=",$anuncioDelete->id)->get();

        foreach($fotosA as $fotoD){
            self::DeleteFoto($fotoD->nombre);
        }

        self::DeletePortada($anuncioDelete->portada);

        $anuncioDelete->delete();
        return redirect('/MisAnuncios');
    }



    //functions delete
    public function DeleteFoto($nameImg){
        unlink('images/anuncios/'.$nameImg);
        Foto::where('nombre',$nameImg)->delete();
    }

    public function DeletePortada($namePortada){
        if($namePortada != "default.jpg"){
            unlink('images/anuncios/'.$namePortada);
            Anuncio::where('portada',$namePortada)->delete();
        }
    }

    //update and insert functions
    public function UpdatePortada($files){
        $num = rand(0,9999);
        $portada_name = $num.'-'.uniqid().'_'.time() . '.' . $files->getClientOriginalExtension();
        $files->move(public_path()."/images/anuncios",$portada_name);
        return $portada_name;
    }
    public function InsertFotos($files,$id){
        foreach($files as $file){
                $num = rand(0,9999);
                $file_name = $num.'-'.uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path()."/images/anuncios",$file_name);
                DB::table('fotos')->insertGetId(
                    ['nombre'=>$file_name,'id_anuncio'=>$id]
                );
        }
    }


}
