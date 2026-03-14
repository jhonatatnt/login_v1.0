<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ValidOrdem;
use App\Models\Ordem;
use Illuminate\Support\Facades\Auth;

class ValidOrdemController extends Controller
{

    public function index()
    {
        $ordens = Ordem::orderBy('date_creation','desc')->get();
        $validacoes = ValidOrdem::with('ordem')->get();

        return view('valid_ordens.index', compact('ordens','validacoes'));
    }

    public function store(Request $request)
    {
        ValidOrdem::create([
            'id_user' => Auth::id(),
            'ordem_id' => $request->ordem_id,
            'status' => $request->status,
            'resultado' => $request->resultado
        ]);

        return redirect()->back()->with('success','Validação registrada');
    }

    public function edit($id)
    {
        $validacao = ValidOrdem::findOrFail($id);

        return view('valid_ordens.edit', compact('validacao'));
    }

    public function update(Request $request, $id)
    {
        $validacao = ValidOrdem::findOrFail($id);

        $validacao->update([
            'status' => $request->status,
            'resultado' => $request->resultado
        ]);

        return redirect()->route('valid_ordens.index');
    }

    public function destroy($id)
    {
        $validacao = ValidOrdem::findOrFail($id);
        $validacao->delete();

        return redirect()->back();
    }
}