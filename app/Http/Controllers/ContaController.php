<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contas = Conta::orderBy('id_conta', 'desc')->get();

        return view('contas.index', compact('contas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'conta'           => 'required|max:50',
            'qtd_contrato'    => 'required|integer|min:1',
            'login_email'     => 'required|email|max:200',
            'login_senha'     => 'required|min:1|max:300',
            'senha_operacao'  => 'required|min:1|max:300',
            'valor_ganho'     => 'nullable|numeric',
            'valor_perda'     => 'nullable|numeric',
            'status_conta'    => 'nullable|string|max:20',
        ]);

        try {
            Conta::create([
                'conta'          => $validated['conta'],
                'qtd_contrato'   => $validated['qtd_contrato'],
                'login_email'    => $validated['login_email'],
                'login_senha'    => $validated['login_senha'],
                'senha_operacao' => $validated['senha_operacao'],
                'valor_ganho'    => $validated['valor_ganho'] ?? 0,
                'valor_perda'    => $validated['valor_perda'] ?? 0,
                'status_conta'   => $validated['status_conta'] ?? 'ativo',
                'date_creation'  => now(),
            ]);

            return redirect()
                ->route('contas.index')
                ->with('status', 'Conta criada com sucesso!');
        } catch (\Exception $ex) {
            return back()->withInput()->withErrors([
                'error' => 'Erro ao criar conta.',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $conta = Conta::findOrFail($id);

        return view('contas.edit', compact('conta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $conta = Conta::findOrFail($id);

        $validated = $request->validate([
            'conta'        => 'required|max:50',
            'qtd_contrato' => 'required|integer|min:1',
            'valor_ganho'  => 'required|numeric',
            'valor_perda'  => 'required|numeric',
            'status_conta' => 'required|string|max:20',
        ]);

        try {
            $conta->update($validated);

            return redirect()
                ->route('contas.index')
                ->with('status', 'Conta atualizada com sucesso!');
        } catch (\Exception $ex) {
            return back()->withErrors([
                'error' => 'Erro ao atualizar conta.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Conta::findOrFail($id)->delete();

        return redirect()
            ->route('contas.index')
            ->with('status', 'Conta removida com sucesso!');
    }
}
