<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\Ciudade;
use App\Models\Tipo;
use App\Models\Categoria;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categorias = Categoria::all();
        $tipos = Tipo::all();
        $ciudades = Ciudade::all();

        $Tanuncios = Anuncio::where('id_user','=',auth()->id())->count();
        return view('welcome',["total_anuncios"=>$Tanuncios,"categorias"=>$categorias,
            "tipos"=>$tipos,"ciudades"=>$ciudades]);
    }
}
