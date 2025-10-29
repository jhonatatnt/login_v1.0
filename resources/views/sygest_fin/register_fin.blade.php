<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>Gestão Financeira</title>
    
    <!-- Fonte do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!-- Estilos CSS básicos -->
    <style>
        
    </style>
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <img id="logo" src="{{ asset('imgs/sygest.png') }}">
    </header>

    <div id="content_menu">
        <nav>
            <!--<a href="/task">Plano de ação</a>-->
            <a href="/pessoal">Gestão de Pessoas</a>
            <a href="{{route('financeiro')}}" class="activate">Gestão financeira</a>

             <div id="section_user">
                @auth
                    <p>Bem-vindo, <strong>{{ Auth::user()->name }}</strong></p>
                @endauth
                
                @guest
                    <p>Você não está logado.</p>
                @endguest
                <button>
                    <img src="{{ asset('imgs/avatar.png') }}" alt="Avatar" onclick="btn_mn_sec()">
                </button>
            </div>
        </nav>
    </div>

    <div id="content_mn_sec">
        <div id="menu_sec">
            <button onclick="window.location.href='/'" style="display: block; padding:0;">
                <img class="img_btn_mn" src="{{ asset('storage/logout.png') }}" alt="logout" width="35">
            </button>
        </div>
    </div>
    
    <div id="content_section" style="margin-top: 105px;">
        <div class="breadcrumb">

            <style>
                .breadcrumb {
                    display: block;
                    width: 1024px;
                    margin: 0 auto;
                    font-size: 12px;
                    padding: 20px 20px;
                }

                .breadcrumb a {
                    color: #007267;
                    text-decoration: none;
                    font-weight: 400;
                    transition: color 0.2s ease;
                }

                .breadcrumb a:hover {
                    cursor:pointer;
                }

            </style>

            <a href="{{route('financeiro')}}">Gestão Financeira</a>
            <span>›</span>
            <a href="{{route('/registro-conta')}}">Registro de contas</a>
        </div>
    
        <div id="form_container">

            <style>
                #form_container {
                    width: 100%;
                    max-width: 1024px;
                    margin: 40px auto;
                    padding: 20px;
                    background-color: #f9fefe;
                    border-radius: 8px;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
                    font-family: 'Inter', sans-serif;
                }

                #form_container h2 {
                    font-size: 20px;
                    margin-bottom: 20px;
                    color: #007267;
                }

                .form_grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                    gap: 20px;
                }

                .form_group label {
                    display: block;
                    font-size: 13px;
                    font-weight: 600;
                    margin-bottom: 6px;
                    color: #00857f;
                }

                .form_group input,
                .form_group select {
                    width: 100%;
                    padding: 10px;
                    font-size: 14px;
                    border: 1px solid #ccc;
                    border-radius: 6px;
                    background-color: #fff;
                }

                .form_group input:focus,
                .form_group select:focus {
                    outline: none;
                    border-color: #00b3ad;
                    box-shadow: 0 0 0 1px #00b3ad3a;
                }

                .form_actions {
                    text-align: right;
                    margin-top: 30px;
                }

                .form_actions button {
                    background-color: #00b3ad;
                    color: white;
                    padding: 10px 20px;
                    font-size: 14px;
                    border: none;
                    border-radius: 6px;
                    cursor: pointer;
                    transition: background-color 0.2s ease;
                }

                .form_actions button:hover {
                    background-color: #007267;
                }

            </style>
                
            <h2>Adicionar Novo Lançamento</h2>

            @if(session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('registro-conta') }}" method="POST">
                @csrf
                <div class="form_grid">
                    <div class="form_group">
                        <label for="data_lancamento">Data do Lançamento</label>
                        <input type="date" name="data_lancamento" required>
                    </div>

                    <div class="form_group">
                        <label for="periodo_competencia">Período (ex: jul/25)</label>
                        <input type="text" name="periodo_competencia" placeholder="ex: jul/25" required>
                    </div>

                    <div class="form_group">
                        <label for="tipo_lancamento">Tipo</label>
                        <select name="tipo_lancamento" required>
                            <option value="">Selecione</option>
                            <option value="Receita (+)">Receita (+)</option>
                            <option value="Despesa (-)">Despesa (-)</option>
                            <option value="Aplicação Financeira">Aplicação Financeira</option>
                        </select>
                    </div>

                    <div class="form_group">
                        <label for="codigo_movimentacao">Código Movimentação</label>
                        <input type="text" name="codigo_movimentacao" required>
                    </div>

                    <div class="form_group">
                        <label for="codigo_conta">Código da Conta</label>
                        <input type="text" name="codigo_conta" required>
                    </div>

                    <div class="form_group">
                        <label for="classificacao_conta">Classificação da Conta</label>
                        <input type="text" name="classificacao_conta" required>
                    </div>

                    <div class="form_group">
                        <label for="codigo_cc">Código CC</label>
                        <input type="text" name="codigo_cc" required>
                    </div>

                    <div class="form_group">
                        <label for="centro_custo">Centro de Custo</label>
                        <input type="text" name="centro_custo" required>
                    </div>

                    <div class="form_group">
                        <label for="descricao_lancamento">Descrição</label>
                        <input type="text" name="descricao_lancamento" required>
                    </div>

                    <div class="form_group">
                        <label for="detalhamento">Detalhamento</label>
                        <input type="text" name="detalhamento">
                    </div>

                    <div class="form_group">
                        <label for="valor">Valor (R$)</label>
                        <input type="number" step="0.01" name="valor" required>
                    </div>
                </div>

                <div class="form_actions">
                    <button type="submit">Salvar Lançamento</button>
                </div>
            </form>
        </div>

    </div>


    <script>
        function btn_mn_sec(){
            const menu_sec = document.getElementById('menu_sec');
            const header = document.querySelector('header');
            const content_mn_sec = document.getElementById('content_mn_sec');
            
            
            if(menu_sec.style.visibility == 'visible'){
                menu_sec.style.visibility = 'hidden';
                content_mn_sec.style.display = 'none';
                // header.style.height = 60 + 'px';
            }
            else{
                menu_sec.style.visibility = 'visible';
                // header.style.height = 360 + 'px';
                content_mn_sec.style.display = 'block';
            }
        }
    </script>


</body>
</html>