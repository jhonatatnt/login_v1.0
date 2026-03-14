<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>Operadores</title>
    
    <!-- Fonte do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!-- Estilos CSS básicos -->
    <style>
        
    </style>
</head>
<body>
    
    @include('includes.menu',['classhome' => '', 'classestrategias' => '', 'classcontas' => '', 'classoperadores' => 'activate'])


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
        
        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;      /* 🔥 evita imagem esticada */
            object-position: center;
            display: block;
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
    

    <div id="content_section">

    <div class="table-card">
        <div class="table-header">
            <h2>Operadores</h2>

            <a href="{{ route('operadores.create') }}" class="btn-primary">
                + Novo Operador
            </a>
        </div>

        <table class="modern-table">
            <thead>
                <tr>
                    <th>Operador</th>
                    <th>Local</th>
                    <th>Status</th>
                    <th style="width:120px">Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($operadores as $operador)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <img 
                                src="{{ $operador->foto }}"
                                class="avatar"
                                style="background: {{ $operador->color }};"
                            >

                            {{ $operador->name_operador }}
                        </div>
                    </td>

                    <td>{{ $operador->local }}</td>

                    <td>
                        <span class="badge {{ $operador->status_ativo ? 'ativo' : 'inativo' }}">
                            {{ $operador->status_ativo ? 'Ativo' : 'Inativo' }}
                        </span>
                    </td>
                    
                    
                    <td class="actions">
                        <!--<a href="{{ route('operadores.edit',$operador->cod_operador) }}" class="btn-edit">-->
                        <!--    Editar-->
                        <!--</a>-->

                        <form action="{{ route('operadores.destroy',$operador->cod_operador) }}"
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
                @endforeach
            </tbody>
        </table>
    </div>

</div>


</div>

    
    </div>


</body>
</html>
