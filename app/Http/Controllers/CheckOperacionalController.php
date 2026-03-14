<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CheckOperacional;

class CheckOperacionalController extends Controller
{

    public function index()
    {
        $checks = CheckOperacional::orderBy('created_at','desc')->get();
        return view('check_operacional.index', compact('checks'));
    }

    public function create()
    {
        return view('check_operacional.create');
    }

    public function store(Request $request)
    {
    
        CheckOperacional::create([
    
            'id_operador' => Auth::id(),
    
            'login_plataforma' => $request->has('login_plataforma'),
            'valid_contas' => $request->has('valid_contas'),
            'valid_senha_op' => $request->has('valid_senha_op'),
            'valid_OCO' => $request->has('valid_OCO'),
            'valid_contratos' => $request->has('valid_contratos'),
    
            'conf_replicador' => $request->has('conf_replicador'),
            'reuniao' => $request->has('reuniao'),
    
            'data_creation' => now()
    
        ]);
    
        return redirect()->route('check.index')
            ->with('success','Checklist salvo com sucesso');
    
    }

    public function edit($id)
    {
        $check = CheckOperacional::findOrFail($id);
        return view('check_operacional.edit', compact('check'));
    }

    public function update(Request $request, $id)
    {

        $check = CheckOperacional::findOrFail($id);

        $check->update([

            'login_plataforma' => $request->login_plataforma,

            'valid_contas' => $request->has('valid_contas'),
            'valid_senha_op' => $request->has('valid_senha_op'),
            'valid_OCO' => $request->has('valid_OCO'),
            'valid_contratos' => $request->has('valid_contratos'),

            'conf_replicador' => $request->has('conf_replicador'),
            'reuniao' => $request->has('reuniao')

        ]);

        return redirect()->route('check.index');

    }

    public function destroy($id)
    {

        $check = CheckOperacional::findOrFail($id);
        $check->delete();

        return redirect()->route('check.index');

    }
}