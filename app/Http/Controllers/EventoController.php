<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventoRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;

class EventoController extends Controller
{
    public function index()
    {

        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.create');        
    }

    public function store(EventoRequest $request)
    {
        try {
            DB::beginTransaction();
    
            // Obtém o nome do edital
            $nomeEdital = $request->input('nome');
    
            // Substitui espaços por underscores e remove caracteres especiais para criar um nome de arquivo seguro
            $nomeArquivo = Str::slug($nomeEdital) . '.' . $request->file('arquivos')->getClientOriginalExtension();
    
            // Salvar o arquivo na pasta storage/public/editais com o nome personalizado
            $arquivoPath = $request->file('arquivos')->storeAs('editais', $nomeArquivo, 'public');
    
            // Adicionar o caminho do arquivo ao array de dados validados
            $dadosValidados = $request->validated();
            $dadosValidados['arquivos'] = $arquivoPath;
    
            // Criar o evento no banco de dados
            Evento::create($dadosValidados);
    
            DB::commit();
            return redirect()->route('eventos.index')->with('success', 'Registro criado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('eventos.index')->with('error', 'Erro ao criar o registro.');
        }
    }

    public function edit($id)
    {
        $eventos = Evento::findOrFail($id);
        return view('eventos.edit', compact( 'eventos'));
    }

    public function update(EventoRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $eventos = Evento::findOrFail($id);
            $eventos->update($request->validated());
            DB::commit();
            return redirect()->route('eventos.index')->with('success', 'Registro atualizado com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('eventos.index')->with('error', 'Erro ao atualziar o registro.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
    
            // Obter o evento
            $evento = Evento::findOrFail($id);
    
            // Obter o caminho do arquivo
            $caminhoArquivo = $evento->arquivos;
    
            // Excluir o evento (isso também exclui o arquivo associado)
            $evento->delete();
    
            // Excluir o arquivo fisicamente
            Storage::delete($caminhoArquivo);
    
            DB::commit();
    
            return redirect()->route('eventos.index')->with('success', 'Registro excluído com sucesso.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('eventos.index')->with('error', 'Erro ao excluir o registro.');
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
