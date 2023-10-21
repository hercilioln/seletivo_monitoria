<?php

namespace App\Http\Controllers;

use App\Models\Certidao2;
use App\Models\Escrevente;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $escreventes = Escrevente::count();
        $certidoes2 = Certidao2::count();

        $ultimasCertidoes = Certidao2::latest()->take(10)->get();

        return view('home', compact('escreventes', 'certidoes2', 'ultimasCertidoes'));
    }
}
