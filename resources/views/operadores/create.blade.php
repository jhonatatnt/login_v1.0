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
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body>
    
    @include('includes.menu',['classhome' => '', 'classestrategias' => '', 'classcontas' => '', 'classoperadores' => 'activate'])

<div id="content_section">
    
    <style>
    /* CONTAINER PRINCIPAL */
    #content_section {
        width: 1024px;
        margin: 110px auto 30px; /* espaço para o menu fixo */
    }

    /* CARD DO FORMULÁRIO */
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
        margin: 0;
    }

    /* GRID */
    .form-grid {
        display: grid;
        grid-template-columns: 260px 1fr;
        gap: 28px;
        align-items: start;
    }
    
    /* FOTO CENTRAL */
.foto-wrapper {
    align-items: center;
    text-align: center;
}

.foto-wrapper label {
    margin-bottom: 10px;
}

.foto-card {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 12px 25px rgba(0,0,0,0.12);
    transition: all 0.3s ease;
}

/* FOTO OCUPA MÚLTIPLAS LINHAS */


.grid-foto {
    grid-row: 1 / span 4;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.foto-card img {
    width: 160px;
    height: 160px;
    border-radius: 50%;
    object-fit: cover;
    background: #fff;
}

.foto-card:hover {
    transform: scale(1.03);
}



    /* CAMPOS */
    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 6px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        font-size: 14px;
        transition: all 0.2s ease;
        background: #fff;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #0f172a;
        box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.1);
    }

    /* AÇÕES */
    .form-actions {
        margin-top: 30px;
        display: flex;
        justify-content: flex-end;
    }

    /* BOTÕES */
    .btn-primary {
        background: #0f172a;
        color: #ffffff;
        padding: 12px 22px;
        border-radius: 12px;
        border: none;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
    }

    .btn-primary:hover {
        opacity: 0.9;
    }

    .btn-secondary {
        background: #f1f5f9;
        color: #334155;
        padding: 10px 18px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
    }

    /* RESPONSIVO */
    @media (max-width: 1024px) {
        #content_section {
            width: 100%;
            padding: 0 16px;
        }
    }
    
    @media (max-width: 768px) {
    .form-grid {
            grid-template-columns: 1fr;
        }
    .form-grid {
        grid-template-columns: 1fr;
        justify-items: center;
    }

    .foto-wrapper {
        margin-bottom: 20px;
    }
}

</style>
    
    <div class="form-card">
        <div class="form-header">
            <h2>Cadastrar Operador</h2>
            <a href="{{ route('operadores.index') }}" class="btn-secondary">Voltar</a>

        </div>
        
                    <style>
                .alert-error {
                    background: #fee2e2;
                    color: #991b1b;
                    padding: 14px 18px;
                    border-radius: 12px;
                    margin-bottom: 20px;
                }
                
                .alert-error ul {
                    margin: 0;
                    padding-left: 18px;
                }

            </style>
            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <form action="{{ route('operadores.store') }}" method="POST">
            @csrf
            
            <div class="form-group" style="margin-bottom:45px;">
                <select name="colaborador_id" id="colaborador" required>
                    <option value="">Selecione um colaborador</option>
                    @foreach ($colaboradores as $colaborador)
                        <option 
                            value="{{ $colaborador->id }}"
                            data-nome="{{ $colaborador->nome_completo }}"
                            data-cidade="{{ $colaborador->cidade }}"
                            data-foto="https://sygest.wevcapital.com.br/media/{{ ltrim($colaborador->foto, '/') }}?token=2f9d8a7b1c4e6f0a9d3e8b2c"
                        >
                            {{ $colaborador->nome_completo }}
</option>

                            {{ $colaborador->nome_completo }}
                        </option>
                    @endforeach
                </select>

            </div>

            <div class="form-grid">

                <div class="form-group foto-wrapper grid-foto">
                
                    <div class="foto-card">
                        <img 
                            id="foto_op" 
                            src="{{ asset('imgs/profile.png') }}"
                            alt="Foto do operador"
                        >
                    </div>
                
                    <input type="hidden" name="foto" id="foto_input" value="{{ asset('images/avatar-default.png') }}">
                </div>

    
    
                <div class="form-group">
                    <label>Nome do Operador</label>
                    <input type="text" name="name_operador" id="nome_operador" readonly required placeholder="Selecione um colaborador">
                </div>
            
                <div class="form-group">
                    <label>Local</label>
                    <input type="text" name="local" id="local_operador" placeholder="Selecione um colaborador" readonly>
                </div>
            
                <div class="form-group">
                    <label>Cor Identificação</label>
                    <input type="color" name="color" value="#0971d3" style="height:45px">
                </div>
            
                <div class="form-group span-full">
                    <label>Status</label>
                    <select name="status_ativo">
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>

            
            </div>


            <div class="form-actions">
                <button class="btn-primary">Salvar Operador</button>
            </div>
        </form>
    </div>

</div>


<script>
    $(document).ready(function () {

        $('#colaborador').select2({
            placeholder: 'Selecione um colaborador',
            width: '100%',
            templateResult: function (data) {
                if (!data.id) return data.text;

                let imagem = $(data.element).data('foto');

                return $(`
                    <span style="display:flex;align-items:center;gap:10px;">
                        <img 
                            src="${imagem}" 
                            style="
                                width:40px;
                                height:40px;
                                border-radius:50%;
                                object-fit:cover;
                                object-position:center;
                            "
                        >
                        <span>${data.text}</span>
                    </span>
                `);
            },
            templateSelection: function (data) {
                if (!data.id) return data.text;

                let imagem = $(data.element).data('foto');

                return $(`
                    <span style="display:flex;align-items:center;gap:8px;">
                        <img 
                            src="${imagem}" 
                            style="
                                width:28px;
                                height:28px;
                                border-radius:50%;
                                object-fit:cover;
                                object-position:center;
                            "
                        >
                        <span>${data.text}</span>
                    </span>
                `);
            }
        });

        $('#colaborador').on('change', function () {

            let option = $(this).find(':selected');

            let nome   = option.data('nome');
            let cidade = option.data('cidade');
            let foto   = option.data('foto');

            if (!nome) return;

            $('#nome_operador').val(nome);
            $('#local_operador').val(cidade);
            $('#foto_op').attr('src', foto).fadeIn();
            $('#foto_input').val(foto);
        });

    });
</script>





</body>
</html>
