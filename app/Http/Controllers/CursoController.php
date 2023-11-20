<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Http\Requests\CursoRequest;
use Illuminate\Http\Request;
use DB;

class CursoController extends Controller
{
    public function index()
    {

        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');        
    }

    public function store(CursoRequest $request)
    {
        try {
            DB::beginTransaction();
            Curso::create($request->validated());
            DB::commit();
            return redirect()->route('cursos.index')->with('success', 'Registro criado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('cursos.index')->with('error', 'Erro ao criar o registro.');
        }
    }

    public function edit($id)
    {
        $cursos = Curso::findOrFail($id);
        return view('cursos.edit', compact( 'cursos'));
    }

    public function update(CursoRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $cursos = Curso::findOrFail($id);
            $cursos->update($request->validated());
            DB::commit();
            return redirect()->route('cursos.index')->with('success', 'Registro atualizado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('cursos.index')->with('error', 'Erro ao atualziar o registro.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $cursos = Curso::findOrFail($id);
            $cursos->delete();
            DB::commit();
            return redirect()->route('cursos.index')->with('success', 'Registro excluído com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('cursos.index')->with('error', 'Erro ao excluir o registro.');
        }
    }
}
