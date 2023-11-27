<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use App\Models\User;
use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {

        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');        
    }

    public function store(AlunoRequest $request)
    {
        //dd($request->all());
        try {
            DB::beginTransaction();
    
            $nomeAluno = $request->input('user_name');
            
            $nomeArquivo = Str::slug($nomeAluno) . '.' . $request->file('historico')->getClientOriginalExtension();
            $arquivoPath = $request->file('historico')->storeAs('alunos', $nomeArquivo, 'public');
            
            $user = User::firstOrCreate(
                ['email' => $request->input('email')],
                [
                    'name' => $nomeAluno,
                    'password' => bcrypt($request->input('password')), 
                    'role' => 'aluno',
                ]
            );

            $dadosValidados = $request->validated();
            $dadosValidados['user_id'] = $user->id;
            $dadosValidados['historico'] = $arquivoPath;
    
            Aluno::create($dadosValidados);
    
            DB::commit();
            return redirect()->route('login')->with('success', 'Registro criado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao criar o registro.');
        }
    }

    public function edit($id)
    {
        $alunos = Aluno::findOrFail($id);
        return view('alunos.edit', compact( 'alunos'));
    }

    public function update(AlunoRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $alunos = Aluno::findOrFail($id);
            $alunos->update($request->validated());
            DB::commit();
            return redirect()->route('alunos.index')->with('success', 'Registro atualizado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('alunos.index')->with('error', 'Erro ao atualziar o registro.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
    
            // Obter o evento
            $alunos = Aluno::findOrFail($id);
    
            // Obter o caminho do arquivo
            $caminhoArquivo = $alunos->arquivos;
    
            // Excluir o evento (isso também exclui o arquivo associado)
            $alunos->delete();
    
            // Excluir o arquivo fisicamente
            Storage::delete($caminhoArquivo);
    
            DB::commit();
    
            return redirect()->route('alunos.index')->with('success', 'Registro excluído com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('alunos.index')->with('error', 'Erro ao excluir o registro.');
        }
    }

    
    public function show($id)
    {
        try {
            $eventos = Evento::findOrFail($id);
            return view('eventos.show', compact('eventos'));
        } catch (Exception $e) {
            return redirect()->route('eventos.index')->with('error', 'Erro ao exibir o registro.');
        }
    }
}
