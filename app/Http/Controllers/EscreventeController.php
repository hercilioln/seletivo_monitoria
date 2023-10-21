<?php

namespace App\Http\Controllers;

use App\Http\Requests\EscreventeRequest;
use App\Models\Escrevente;
use Illuminate\Http\Request;
use DB;

class EscreventeController extends Controller
{
    public function index(){
        $escreventes = Escrevente::all();
        return view('escreventes.index', compact('escreventes'));
    }

    public function create()
    {
        return view('escreventes.create');
    }

    public function store(EscreventeRequest $request){
        try {
            DB::beginTransaction();
            Escrevente::create($request->validated());
            DB::commit();
            return redirect()->route('escrevente.index')->with('success', 'Registro criado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('escrevente.index')->with('error', 'Erro ao criar o registro.');
        }
    }

    public function edit($id)
    {
        $escreventes = Escrevente::findOrFail($id);
        return view('escreventes.edit', compact('escreventes'));
    }

    public function update(EscreventeRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $escreventes = Escrevente::findOrFail($id);
            $escreventes->update($request->validated());
            DB::commit();
            return redirect()->route('escrevente.index')->with('success', 'Registro atualizado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('escrevente.index')->with('error', 'Erro ao atualizar o registro.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $escreventes = Escrevente::findOrFail($id);
            $escreventes->delete();
            DB::commit();
            return redirect()->route('escrevente.index')->with('success', 'Registro excluído com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('escrevente.index')->with('error', 'Erro ao excluir o registro.');
        }
    }
}
