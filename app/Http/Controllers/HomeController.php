<?php

namespace App\Http\Controllers;

use App\Models\Certidao2;
use App\Models\Escrevente;
use App\Models\Evento;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {

        $eventos = Evento::count();

        $ultimosEventos = Evento::latest()->take(10)->get();

        return view('home', compact('eventos', 'ultimosEventos'));
    }
}
