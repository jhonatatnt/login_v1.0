<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contabilidade;

class FinanceiroController extends Controller
{
    public function index()
    {
        $contabilidade = Contabilidade::all(); // ou filtrado por período, se quiser
        return view('sygest_fin.home_fin', compact('contabilidade'));
    }

    public function analitico()
    {
        $contabilidade = Contabilidade::all();
        return view('sygest_fin.analitico_fin', compact('contabilidade'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_lancamento' => 'required|date',
            'periodo_competencia' => 'required|string',
            'tipo_lancamento' => 'required|string',
            'codigo_movimentacao' => 'required|string',
            'codigo_conta' => 'required|string',
            'classificacao_conta' => 'required|string',
            'codigo_cc' => 'required|string',
            'centro_custo' => 'required|string',
            'descricao_lancamento' => 'required|string',
            'detalhamento' => 'nullable|string',
            'valor' => 'required|numeric',
        ]);

        Contabilidade::create($request->all());

        return redirect()->route('registro-conta')->with('success', 'Registro salvo com sucesso!');
    }
}


