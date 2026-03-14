<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ordem;
use Illuminate\Http\Request;

class OrdemController extends Controller
{
    public function index()
    {
        return Ordem::with(['estrategia', 'operador'])->get();
    }

    
    public function monitor()
    {
        return view('ordens.monitor');
    }

    // public function getOrdens()
    // {
    //     return response()->json(
    //         Ordem::with(['estrategia', 'operador', 'conta'])
    //             ->latest('date_creation')
    //             ->take(10)
    //             ->get()
    //     );
    // }
    
    
    public function getOrdens()
    {
        $inicioDia = Carbon::today();
        $fimDia = Carbon::tomorrow();
    
        return response()->json(
            Ordem::with(['estrategia','operador','conta'])
                ->whereBetween('date_creation', [$inicioDia, $fimDia])
                ->latest('date_creation')
                ->take(10)
                ->get()
        );
    }
    
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_estrategy' => 'required|exists:estrategias,id',
            'cod_operador' => 'required|exists:operadores,id',
            'id_conta' => 'required|exists:contas,id',
            'grupo' => 'required|string',
            'valor' => 'required',
            'tipo_negocio' => 'required|string',
            'status' => 'required|string',
            'visibility' => 'nullable|string',
        ]);


        return Ordem::create($validated);
    }

    public function show($id)
    {
        return Ordem::with(['estrategia', 'operador'])->findOrFail($id);
    }

    public function destroy($id)
    {
        Ordem::findOrFail($id)->delete();
        return response()->noContent();
    }
}


















    

