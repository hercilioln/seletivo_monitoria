<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    public function index()
    {
        $inscricoes = Inscricao::all();
        return view('inscricoes.index', compact('inscricoes', ));
    }
   
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
                    'status' => 'pendente',
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

    public function edit($id)
    {
        $inscricoes = Inscricao::findOrFail($id);
        return view('inscricoes.edit', compact( 'inscricoes'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Recupera a inscrição com base no ID
            $inscricao = Inscricao::findOrFail($id);

            // Atualiza o status da inscrição
            $inscricao->update([
                'status' => $request->input('status'), // Assumindo que 'status' é o campo a ser atualizado
            ]);

            return redirect()->route('inscricoes.index')->with('success', 'Status da inscrição atualizado com sucesso.');
        } catch (\Exception $e) {
            // Lida com exceções, se necessário
            return redirect()->back()->with('error', 'Erro ao atualizar o status da inscrição.');
        }
    }

}
