<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscricaoController extends Controller
{
   
    public function store(Request $request)
    {
        try {
            // Recupera o aluno logado
            $aluno = auth()->user()->aluno;

            // Obtém o ID da vaga a partir do formulário
            $vagaId = $request->input('vagas_id');

            // Verifica se o aluno já está inscrito nessa vaga
            if (!$aluno->inscricoes->where('vagas_id', $vagaId)->count()) {
                // Cria uma nova inscrição
                Inscricao::create([
                    'alunos_id' => $aluno->id,
                    'vagas_id' => $vagaId,
                    'eventos_id' => $request->input('eventos_id'), 
                    'status' => 0,
                ]);

                return redirect()->back()->with('success', 'Inscrição realizada com sucesso.');
            } else {
                return redirect()->back()->with('error', 'Você já está inscrito nesta vaga.');
            }
        } catch (\Exception $e) {
            // Lida com exceções, se necessário
            return redirect()->back()->with('error', 'Erro ao processar a inscrição.');
        }
    }
}
