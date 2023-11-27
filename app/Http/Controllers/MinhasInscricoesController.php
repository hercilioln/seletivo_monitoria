<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class MinhasInscricoesController extends Controller
{
    public function index()
    {

        $aluno = Aluno::all();

        return view('minhasinscricoes', compact('aluno'));
    }
}