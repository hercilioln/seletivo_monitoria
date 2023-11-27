<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Inscricao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MinhasInscricoesController extends Controller
{
    
    public function index()
    {
        // Recupera o aluno logado
        $aluno = Auth::user()->aluno;

        // Obtém as inscrições do aluno
        $inscricoes = $aluno->inscricoes;

        return view('minhasinscricoes', compact('inscricoes'));
    }
}