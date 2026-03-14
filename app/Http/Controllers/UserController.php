<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Exemplo futuro: listar usuários
        // return view('users.index', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'      => 'required|min:2|max:200',
            'lastname'  => 'required|min:2|max:200',
            'email'     => 'required|min:5|max:200|email',
            'password'  => 'required|min:7|max:300',
        ]);

        // Validação de senha forte (helper custom)
        $strongPassword = $user->validatePassword($validated['password']);

        try {
            // Verifica se o e-mail já existe
            if (User::where('email', $validated['email'])->exists()) {
                return back()->withInput()->withErrors([
                    'email' => 'O e-mail já foi cadastrado!',
                ]);
            }

            // Criação do usuário
            $user = new User();
            $user->fill($validated);

            $user->password = Hash::make($strongPassword);
            $user->confirm_email = 'nao';
            $user->role_user = 1; // usuário comum
            $user->date_creation = now();

            $user->save();

            return back()->with('status', 'Usuário criado com sucesso!');
        } catch (\Exception $ex) {
            return back()->withErrors([
                'error' => 'Ocorreu um problema ao criar o usuário.',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exemplo:
        // $user = User::findOrFail($id);
        // return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Exemplo:
        // $user = User::findOrFail($id);
        // return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implementação futura
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implementação futura
    }
}
