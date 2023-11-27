<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EditalController extends Controller
{
    public function index()
    {
        $eventos = Evento::latest()->take(10)->get();

        return view('editais', compact('eventos'));
    }

    public function show($id)
    {
        $eventos = Evento::findOrFail($id);

        return view('editaisview', compact('eventos'));
    }
}
