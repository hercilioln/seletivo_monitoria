<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfiguracaoCartorioRequest;
use App\Models\ConfiguracaoCartorio;
use Illuminate\Http\Request;
use DB;

class ConfiguracaoCartorioController extends Controller
{
    public function index()
    {

        $cartorio = ConfiguracaoCartorio::all();
        return view('cartorios.index', compact('cartorio'));
    }

    public function create()
    {
        return view('cartorios.create');        
    }

    public function store(ConfiguracaoCartorioRequest $request)
    {
        try {
            DB::beginTransaction();
            ConfiguracaoCartorio::create($request->validated());
            DB::commit();
            return redirect()->route('cartorio.index')->with('success', 'Registro criado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('escrevente.index')->with('error', 'Erro ao criar o registro.');
        }
    }

    public function edit($id)
    {
        $cartorio = ConfiguracaoCartorio::findOrFail($id);
        return view('cartorios.edit', compact( 'cartorio'));
    }

    public function update(ConfiguracaoCartorioRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $cartorio = ConfiguracaoCartorio::findOrFail($id);
            $cartorio->update($request->validated());
            DB::commit();
            return redirect()->route('cartorio.index')->with('success', 'Registro atualizado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('escrevente.index')->with('error', 'Erro ao atualziar o registro.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $cartorio = ConfiguracaoCartorio::findOrFail($id);
            $cartorio->delete();
            DB::commit();
            return redirect()->route('cartorio.index')->with('success', 'Registro excluído com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('escrevente.index')->with('error', 'Erro ao excluir o registro.');
        }
    }
}
