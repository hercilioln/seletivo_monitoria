<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Http\Requests\DisciplinaRequest;
use Illuminate\Http\Request;
use DB;

class DisciplinaController extends Controller
{
    public function index()
    {

        $disciplinas = Disciplina::all();
        return view('disciplinas.index', compact('disciplinas'));
    }

    public function create()
    {
        return view('disciplinas.create');        
    }

    public function store(DisciplinaRequest $request)
    {
        try {
            DB::beginTransaction();
            Disciplina::create($request->validated());
            DB::commit();
            return redirect()->route('disciplinas.index')->with('success', 'Registro criado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('disciplinas.index')->with('error', 'Erro ao criar o registro.');
        }
    }

    public function edit($id)
    {
        $disciplinas = Disciplina::findOrFail($id);
        return view('disciplinas.edit', compact( 'disciplinas'));
    }

    public function update(DisciplinaRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $disciplinas = Disciplina::findOrFail($id);
            $disciplinas->update($request->validated());
            DB::commit();
            return redirect()->route('disciplinas.index')->with('success', 'Registro atualizado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('disciplinas.index')->with('error', 'Erro ao atualziar o registro.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $disciplinas = Disciplina::findOrFail($id);
            $disciplinas->delete();
            DB::commit();
            return redirect()->route('disciplinas.index')->with('success', 'Registro excluído com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('disciplinas.index')->with('error', 'Erro ao excluir o registro.');
        }
    }
}
