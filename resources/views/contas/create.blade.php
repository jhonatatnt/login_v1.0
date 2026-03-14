<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>Contas</title>
    
    <!-- Fonte do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!-- Estilos CSS básicos -->
    <style>
        
    </style>
</head>
<body>
    

    @include('includes.menu', [
        'classhome' => '',
        'classestrategias' => '',
        'classcontas' => 'activate'
    ])

<div id="content_section">
    
    <style>
    #content_section {
            max-width: 1024px;
            margin: 100px auto; /* centraliza horizontalmente */
            padding: 0 16px;   /* respiro em telas menores */
        }
        
                
                /* FORM CARD */
        .form-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        
        /* HEADER */
        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .form-header h2 {
            font-size: 22px;
            color: #0f172a;
        }
        
        /* GRID */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        
        /* CAMPOS */
        .form-group label {
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
            display: block;
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            font-size: 14px;
        }
        
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #0f172a;
            box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.1);
        }
        
        /* AÇÕES */
        .form-actions {
            margin-top: 25px;
            display: flex;
            justify-content: flex-end;
        }
        
        /* BOTÕES */
        .btn-primary {
            background: #0f172a;
            color: #ffffff;
            padding: 12px 20px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }
        
        .btn-secondary {
            background: #f1f5f9;
            color: #334155;
            padding: 10px 16px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
        }
        
        /* RESPONSIVO */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

    </style>

    <div class="form-card">
        <div class="form-header">
            <h2>Cadastrar Conta</h2>
            <a href="{{ route('contas.index') }}" class="btn-secondary">
                Voltar
            </a>
        </div>
        
        @if ($errors->any())
            <div style="background:#fee2e2; padding:15px; border-radius:10px; margin-bottom:20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:#991b1b;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contas.store') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label>Conta</label>
                    <input type="text" name="conta" required>
                </div>

                <div class="form-group">
                    <label>Qtd. Contratos</label>
                    <input type="number" name="qtd_contrato" required>
                </div>

                <div class="form-group">
                    <label>Email de Login</label>
                    <input type="email" name="login_email" required>
                </div>

                <div class="form-group">
                    <label>Senha de Login</label>
                    <input type="text" name="login_senha" required>
                </div>

                <div class="form-group">
                    <label>Senha de Operação</label>
                    <input type="text" name="senha_operacao" required>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status_conta">
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                        <option value="bloqueado">Bloqueado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Valor Ganho</label>
                    <input type="number" name="valor_ganho" min="0" step="0.01" value="0">
                </div>

                <div class="form-group">
                    <label>Valor Perda</label>
                    <input type="number" name="valor_perda" min="0" step="0.01" value="0">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    Salvar Conta
                </button>
            </div>
        </form>
    </div>

</div>



</body>
</html>
