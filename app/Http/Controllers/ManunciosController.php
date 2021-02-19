<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncio;
class ManunciosController extends Controller
{
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
