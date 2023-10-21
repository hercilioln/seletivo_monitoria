<?php

namespace App\Http\Controllers;

use App\Http\Requests\Certidao2Request;
use App\Models\Certidao2;
use App\Models\ConfiguracaoCartorio;
use App\Models\Escrevente;
use Illuminate\Http\Request;
use DB;

class Certidao2Controller extends Controller
{
    public function index(){
        $certidoes = Certidao2::all();
        return view('certidao2.index', compact('certidoes'));
    }

    public function create()
    {
        $cartorios = ConfiguracaoCartorio::all();
        $escreventes = Escrevente::all();
        return view('certidao2.create', compact('cartorios', 'escreventes'));
    }

    public function store(Certidao2Request $request){
        try {
            DB::beginTransaction();
            Certidao2::create($request->validated());
            DB::commit();
            return redirect()->route('certidao2.index')->with('success', 'Registro criado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('certidao2.index')->with('error', 'Erro ao criar o registro.');
        }
    }

    public function show($id)
    {
        try {
            $certidao = Certidao2::findOrFail($id);
            return view('certidao2.show', compact('certidao'));
        } catch (Exception $e) {
            return redirect()->route('certidao2.index')->with('error', 'Erro ao exibir o registro.');
        }
    }


    public function edit($id)
    {
        $certidao = Certidao2::findOrFail($id);
        $cartorios = ConfiguracaoCartorio::all();
        $escreventes = Escrevente::all();
        return view('certidao2.edit', compact('certidao', 'cartorios', 'escreventes'));
    }

    public function update(Certidao2Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $certidao = Certidao2::findOrFail($id);
            $certidao->update($request->validated());
            DB::commit();
            return redirect()->route('certidao2.index')->with('success', 'Registro atualizado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('certidao2.index')->with('error', 'Erro ao atualizar o registro.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $certidao = Certidao2::findOrFail($id);
            $certidao->delete();
            DB::commit();
            return redirect()->route('certidao2.index')->with('success', 'Registro excluído com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('certidao2.index')->with('error', 'Erro ao excluir o registro.');
        }
    }
}
