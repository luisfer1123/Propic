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

        return view('welcome',["total_anuncios"=>self::TotalAnunciosUser(),"categorias"=>$categorias,
            "tipos"=>$tipos,"ciudades"=>$ciudades]);
    }

    public function Somos(){
        return view('pages.Somos',['total_anuncios'=>self::TotalAnunciosUser()]);
    }

    public static function TotalAnunciosUser(){
        $Tanuncios = Anuncio::where('id_user','=',auth()->id())->count();
        return $Tanuncios;
    }
}
