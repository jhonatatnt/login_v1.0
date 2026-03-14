<?php

namespace App\Http\Controllers;

use App\Models\Estrategia;
use App\Models\Conta;
use App\Models\Operador;
use App\Models\Ordem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EstrategiaController extends Controller
{

    
    public function estrategias()
    {
        
        $operadores = Operador::orderBy('name_operador')->get();

        $contas = Conta::where('status_conta', 'ativo')
            ->orderBy('conta')
            ->get();
            
        // dd($operadores);
    
        return view('estrategias.estrategias', compact('operadores', 'contas'));
    }
    


public function historico(Request $request)
{

// QUERY PRINCIPAL
$query = DB::table('estrategias as e')
->leftJoin('operadores as ma','ma.cod_operador','=','e.op_mestre_a')
->leftJoin('operadores as sa','sa.cod_operador','=','e.op_sec_a')
->leftJoin('operadores as mb','mb.cod_operador','=','e.op_mestre_b')
->leftJoin('operadores as sb','sb.cod_operador','=','e.op_sec_b')

->select(
'e.*',
'ma.name_operador as mestre_a',
'sa.name_operador as sec_a',
'mb.name_operador as mestre_b',
'sb.name_operador as sec_b'
);


// FILTRO DATA INICIO
if($request->filled('data_inicio')){
$query->whereDate('e.date_creation','>=',$request->data_inicio);
}


// FILTRO DATA FIM
if($request->filled('data_fim')){
$query->whereDate('e.date_creation','<=',$request->data_fim);
}


// FILTRO OPERADOR
if($request->filled('operador')){

$query->where(function($q) use ($request){

$q->where('ma.name_operador',$request->operador)
->orWhere('sa.name_operador',$request->operador)
->orWhere('mb.name_operador',$request->operador)
->orWhere('sb.name_operador',$request->operador);

});

}


// EXECUTA QUERY
$estrategias = $query
->orderBy('e.date_creation','desc')
->get();


// BUSCAR TODAS CONTAS
$contas = DB::table('contas')
->select('id_conta','conta')
->get()
->keyBy('id_conta');


// CONVERTER IDS DE CONTAS PARA NOMES
foreach ($estrategias as $e) {

$e->contas_mestre_a = collect(json_decode($e->contas_mestre_a ?? '[]'))
->map(fn($id) => $contas[$id]->conta ?? $id)
->implode(', ');

$e->contas_sec_a = collect(json_decode($e->contas_sec_a ?? '[]'))
->map(fn($id) => $contas[$id]->conta ?? $id)
->implode(', ');

$e->contas_mestre_b = collect(json_decode($e->contas_mestre_b ?? '[]'))
->map(fn($id) => $contas[$id]->conta ?? $id)
->implode(', ');

$e->contas_sec_b = collect(json_decode($e->contas_sec_b ?? '[]'))
->map(fn($id) => $contas[$id]->conta ?? $id)
->implode(', ');

}


// LISTA OPERADORES PARA O SELECT
$operadores = DB::table('operadores')
->whereIn('cod_operador', function($q){
$q->select('op_mestre_a')->from('estrategias');
})
->orWhereIn('cod_operador', function($q){
$q->select('op_sec_a')->from('estrategias');
})
->orWhereIn('cod_operador', function($q){
$q->select('op_mestre_b')->from('estrategias');
})
->orWhereIn('cod_operador', function($q){
$q->select('op_sec_b')->from('estrategias');
})
->select('cod_operador','name_operador')
->distinct()
->orderBy('name_operador')
->get();


// RETORNA PARA VIEW
return view('estrategias.historico', compact('estrategias','operadores'));

}
    

public function store(Request $request)
{
    $validated = $request->validate([
        'op_mestre_a'        => 'required|exists:operadores,cod_operador',
        'op_sec_a'           => 'required|exists:operadores,cod_operador',
        'valor_mestre_a'     => 'required|numeric',
        'tipo_op_a'          => 'required|string|max:50',
        'variacao_a'         => 'nullable|integer',
    
        'contas_mestre_a'    => 'required|array|min:1',
        'contas_mestre_a.*'  => 'integer',
    
        'contas_sec_a'       => 'required|array|min:1',
        'contas_sec_a.*'     => 'integer',
    
        'op_mestre_b'        => 'required|exists:operadores,cod_operador',
        'op_sec_b'           => 'required|exists:operadores,cod_operador',
        'tipo_op_b'          => 'required|string|max:50',
    
        'contas_mestre_b'    => 'required|array|min:1',
        'contas_mestre_b.*'  => 'integer',
    
        'contas_sec_b'       => 'required|array|min:1',
        'contas_sec_b.*'     => 'integer',
    ]);


    // // 🔒 Verifica duplicidade da estratégia
    // $existe = Estrategia::where('op_mestre_a', $validated['op_mestre_a'])
    //     ->where('op_sec_a', $validated['op_sec_a'])
    //     ->where('op_mestre_b', $validated['op_mestre_b'])
    //     ->where('op_sec_b', $validated['op_sec_b'])
    //     ->exists();

    // if ($existe) {
    //     return back()
    //         ->withInput()
    //         ->withErrors([
    //             'estrategia' => 'Esta estratégia já está cadastrada.'
    //         ]);
    // }

    try {
        DB::transaction(function () use ($validated) {
            
            $margem = 5; // 👈 DEFINIÇÃO DA MARGEM

            // 1️⃣ Cria a estratégia
            $estrategia = Estrategia::create([
                'op_mestre_a'     => $validated['op_mestre_a'],
                'op_sec_a'        => $validated['op_sec_a'],
                'valor_mestre_a'  => $validated['valor_mestre_a'],
                'tipo_op_a'       => $validated['tipo_op_a'],
                'variacao_a'      => $validated['variacao_a'] ?? null,
                'contas_mestre_a' => $validated['contas_mestre_a'],
                'contas_sec_a'    => $validated['contas_sec_a'],

                'op_mestre_b'     => $validated['op_mestre_b'],
                'op_sec_b'        => $validated['op_sec_b'],
                'tipo_op_b'       => $validated['tipo_op_b'],
                'contas_mestre_b' => $validated['contas_mestre_b'],
                'contas_sec_b'    => $validated['contas_sec_b'],

                'date_creation'   => now(),
            ]);

            /*
            |--------------------------------------------------------------------------
            | ORDENS – GRUPO A
            |--------------------------------------------------------------------------
            */

            // 🔹 Mestre A
            foreach (array_unique($validated['contas_mestre_a']) as $idConta) {
                Ordem::create([
                    'id_estrategy' => $estrategia->id,
                    'cod_operador' => $validated['op_mestre_a'],
                    'tipo_operador'   => 'mestre',
                    'id_conta'     => $idConta,
                    'grupo'        => 'A',
                    'valor'        => $validated['valor_mestre_a'],
                    'tipo_negocio' => $validated['tipo_op_a'],
                    'status'       => 'Pendente',
                    'visibility'   => 1,
                ]);
            }

            // 🔹 Secundário A
            foreach (array_unique($validated['contas_sec_a']) as $idConta) {
                Ordem::create([
                    'id_estrategy' => $estrategia->id,
                    'cod_operador' => $validated['op_sec_a'],
                    'tipo_operador'   => 'secundario',
                    'id_conta'     => $idConta,
                    'grupo'        => 'A',
                    'valor' => (float) $validated['valor_mestre_a'] + (float) $validated['variacao_a'],
                    'tipo_negocio' => $validated['tipo_op_a'],
                    'status'       => 'Pendente',
                    'visibility'   => 1,
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | ORDENS – GRUPO B
            |--------------------------------------------------------------------------
            */

            // 🔹 Mestre B
            foreach (array_unique($validated['contas_mestre_b']) as $idConta) {

                $valorB = ($validated['tipo_op_a'] === 'compra')
                    ? $validated['valor_mestre_a'] - $margem
                    : $validated['valor_mestre_a'] + $margem;
            
                Ordem::create([
                    'id_estrategy'   => $estrategia->id,
                    'cod_operador'   => $validated['op_mestre_b'],
                    'id_conta'       => $idConta,
                    'tipo_operador'  => 'mestre',
                    'grupo'          => 'B',
                    'valor'          => $valorB,
                    'tipo_negocio'   => $validated['tipo_op_b'],
                    'status'         => 'Pendente',
                    'visibility'     => 1,
                ]);
            }


            // 🔹 Secundário B
            foreach (array_unique($validated['contas_sec_b']) as $idConta) {
            
                $valorB = ($validated['tipo_op_a'] === 'compra')
                    ? ($validated['valor_mestre_a'] + $validated['variacao_a']) - $margem
                    : ($validated['valor_mestre_a'] + $validated['variacao_a']) + $margem;
            
                Ordem::create([
                    'id_estrategy'   => $estrategia->id,
                    'cod_operador'   => $validated['op_sec_b'],
                    'id_conta'       => $idConta,
                    'tipo_operador'  => 'secundario',
                    'grupo'          => 'B',
                    'valor'          => $valorB,
                    'tipo_negocio'   => $validated['tipo_op_b'],
                    'status'         => 'Pendente',
                    'visibility'     => 1,
                ]);
            }


        });

        return redirect()
            ->route('estrategias')
            ->with('status', 'Estratégia criada com sucesso e ordens geradas!');
    } catch (\Exception $ex) {
        return back()
            ->withInput()
            ->withErrors([
                'error' => 'Erro ao criar estratégia.'
            ]);
        // dd($ex->getMessage(), $ex->getTrace());
    }
}



    public function show($id)
    {
        return Estrategia::findOrFail($id);
    }

    public function destroy($id)
    {
        Estrategia::findOrFail($id)->delete();
        return response()->noContent();
    }
}
