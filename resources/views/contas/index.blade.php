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
            width: 1024px;
            margin: 100px auto 20px;
        }
        
        .table-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .table-header h2 {
            font-size: 22px;
            color: #0f172a;
        }
        
        .btn-primary {
            background: #0f172a;
            color: #fff;
            padding: 10px 16px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
        }
        
        .modern-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .modern-table thead {
            background: #f8fafc;
        }
        
        .modern-table th {
            text-align: left;
            padding: 14px;
            font-size: 14px;
            color: #334155;
        }
        
        .modern-table td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }
        
        .modern-table tr:hover {
            background: #f9fafb;
        }
        
        .status {
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status.ativo {
            background: #dcfce7;
            color: #166534;
        }
        
        .status.inativo {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .status.bloqueado {
            background: #fef3c7;
            color: #92400e;
        }
        
        .actions {
            display: flex;
            gap: 10px;
        }
        
        .btn-edit {
            background: #e0f2fe;
            color: #0369a1;
            padding: 8px 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }
        
        .btn-delete {
            background: #fee2e2;
            color: #991b1b;
            border: none;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }
        
        .empty {
            text-align: center;
            padding: 20px;
            color: #64748b;
        }
        
        /* Responsivo */
        @media (max-width: 768px) {
            #content_section {
                width: 100%;
                padding: 0 15px;
            }
        
            .modern-table {
                font-size: 13px;
            }
        }

    </style>
    

    <div class="table-card">
        <div class="table-header">
            <h2>Lista de Contas</h2>
            <a href="{{ route('cadastro_contas') }}" class="btn-primary">+ Nova Conta</a>
        </div>

        <table class="modern-table">
            <thead>
                <tr>
                    <th>Conta</th>
                    <th>Contratos</th>
                    <th>Email</th>
                    <th>Senha login</th>
                    <th>Senha operação</th>
                    <th>Ganho</th>
                    <th>Perda</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @forelse($contas as $conta)
                    <tr>
                        <td>{{ $conta->conta }}</td>
                        <td>{{ $conta->qtd_contrato }}</td>
                        <td>{{ $conta->login_email }}</td>
                        <td>{{ $conta->login_senha }}</td>
                        <td>{{ $conta->senha_operacao }}</td>
                        <td>R$ {{ number_format($conta->valor_ganho, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($conta->valor_perda, 2, ',', '.') }}</td>

                        <td>
                            <span class="status {{ $conta->status_conta }}">
                                {{ ucfirst($conta->status_conta) }}
                            </span>
                        </td>

                        <td class="actions">
                            <!--<a href="{{ route('contas.edit', $conta->id_conta) }}" class="btn-edit">-->
                            <!--    Editar-->
                            <!--</a>-->

                            <form action="{{ route('contas.destroy', $conta->id_conta) }}"
                                  method="POST"
                                  onsubmit="return confirm('Deseja realmente excluir esta conta?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty">
                            Nenhuma conta cadastrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>



</body>
</html>
