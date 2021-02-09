<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;

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
        $Tanuncios = Anuncio::where('id_user','=',auth()->id())->count();
        return view('welcome',["total_anuncios"=>$Tanuncios]);
    }
}
