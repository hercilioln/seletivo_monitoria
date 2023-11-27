<?php

namespace App\Http\Controllers;

use App\Http\Requests\VagaRequest;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Evento;
use App\Models\Vaga;
use DB;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    public function index(){
        $vagas = Vaga::all();
        return view('vagas.index', compact('vagas'));
    }

    public function create($eventoId)
    {
        //$vagas = Vaga::all();
        $evento = Evento::findOrFail($eventoId);
        $disciplina = Disciplina::all();
        return view('vagas.create', compact(  'evento', 'disciplina', 'eventoId'));
    }

    public function store(VagaRequest $request, $eventoId){
        try {
            DB::beginTransaction();
            Vaga::create($request->validated() + ['eventos_id' => $eventoId]);
            DB::commit();
            return redirect()->route('eventos.show', $eventoId)->with('success', 'Registro criado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao criar o registro.');
        }
    }

    public function show($id)
    {
        try {
            $certidao = Certidao2::findOrFail($id);
            return view('vagas.show', compact('certidao'));
        } catch (Exception $e) {
            return redirect()->route('vagas.index')->with('error', 'Erro ao exibir o registro.');
        }
    }


    public function edit($id)
    {
        $certidao = Certidao2::findOrFail($id);
        $cartorios = ConfiguracaoCartorio::all();
        $escreventes = Escrevente::all();
        return view('vagas.edit', compact('certidao', 'cartorios', 'escreventes'));
    }

    public function update(Certidao2Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $certidao = Certidao2::findOrFail($id);
            $certidao->update($request->validated());
            DB::commit();
            return redirect()->route('vagas.index')->with('success', 'Registro atualizado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('vagas.index')->with('error', 'Erro ao atualizar o registro.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $certidao = Certidao2::findOrFail($id);
            $certidao->delete();
            DB::commit();
            return redirect()->route('vagas.index')->with('success', 'Registro excluído com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('vagas.index')->with('error', 'Erro ao excluir o registro.');
        }
    }
}
