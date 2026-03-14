<?php

namespace App\Http\Controllers;

use App\Models\Operador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operadores = Operador::orderBy('id_operador', 'desc')->get();

        return view('operadores.index', compact('operadores'));
    }

    /**
     * 
     */
    public function create()
    {

        $colaboradores = DB::connection('mysql_sygest')
            ->table('colaboradores')
            ->orderBy('id')
            ->get();
    
        return view('operadores.create', compact('colaboradores'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_operador' => 'required|min:2|max:200',
            'foto'          => 'nullable|string',
            'color'         => 'nullable|string|max:7',
            'local'         => 'nullable|string|max:150',
            'status_ativo'  => 'nullable|integer|in:0,1',
        ]);
    
        // Verifica se já existe DELETADO
        $operadorDeletado = Operador::onlyTrashed()
            ->where('name_operador', $validated['name_operador'])
            ->first();
    
        if ($operadorDeletado) {
            $operadorDeletado->restore();
    
            $operadorDeletado->update([
                'foto'          => $validated['foto'] ?? null,
                'color'         => $validated['color'] ?? '#010101',
                'local'         => $validated['local'] ?? null,
                'status_ativo'  => $validated['status_ativo'] ?? 1,
            ]);
    
            return redirect()
                ->route('operadores.index')
                ->with('status', 'Operador restaurado com sucesso!');
        }
    
        // Verifica se já existe ATIVO
        $operadorAtivo = Operador::where('name_operador', $validated['name_operador'])->first();
    
        if ($operadorAtivo) {
            return back()
                ->withInput()
                ->withErrors([
                    'name_operador' => 'Este operador já está cadastrado.'
                ]);
        }
    
        // Se não existe, cria novo
        try {
            Operador::create([
                'name_operador' => $validated['name_operador'],
                'foto'          => $validated['foto'] ?? null,
                'color'         => $validated['color'] ?? '#010101',
                'local'         => $validated['local'] ?? null,
                'status_ativo'  => $validated['status_ativo'] ?? 1,
                'date_creation' => now(),
            ]);
    
            return redirect()
                ->route('operadores.index')
                ->with('status', 'Operador criado com sucesso!');
        } catch (\Exception $ex) {
            return back()
                ->withInput()
                ->withErrors([
                    'error' => 'Erro ao criar operador.'
                ]);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $operador = Operador::findOrFail($id);

        return view('operadores.show', compact('operador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $operador = Operador::findOrFail($id);

        return view('operadores.edit', compact('operador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $operador = Operador::findOrFail($id);

        $validated = $request->validate([
            'name_operador' => 'required|min:2|max:200',
            'foto'          => 'nullable|string',
            'color'         => 'nullable|string|max:7',
            'local'         => 'nullable|string|max:150',
            'status_ativo'  => 'required|integer|in:0,1',
        ]);

        try {
            $operador->update($validated);

            return redirect()
                ->route('operadores.index')
                ->with('status', 'Operador atualizado com sucesso!');
        } catch (\Exception $ex) {
            return back()->withErrors([
                'error' => 'Erro ao atualizar operador.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Operador::findOrFail($id)->delete();

            return redirect()
                ->route('operadores.index')
                ->with('status', 'Operador removido com sucesso!');
        } catch (\Exception $ex) {
            return back()->withErrors([
                'error' => 'Erro ao remover operador.',
            ]);
        }
    }
}
