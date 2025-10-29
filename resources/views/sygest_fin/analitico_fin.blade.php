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
            <a href="{{route('analitico')}}">Base analítica</a>
        </div>
    
        <div id="div_table">
            <style>
                #div_table{
                    display: block;
                    width: 1024px;
                    min-height: 350px; 
                    max-height: 100vh;
                    margin: 0px auto;
                    overflow: scroll;
                    /* border: solid 1px black; */
                }

                table {
                    width: 100%;
                    border-collapse: separate;
                    border-spacing: 0 8px;
                    margin: 0;
                }

                thead tr {
                    background-color: #00b3ad;
                    color: white;
                }

                thead th {
                    padding: 12px;
                    text-align: left;
                    font-weight: 500;
                    font-size: 14px;
                    white-space: nowrap;
                }

                thead tr:first-child th:first-child {
                    border-top-left-radius: 10px;
                }

                thead tr:first-child th:last-child {
                    border-top-right-radius: 10px;
                }

                tbody tr {
                    background-color: #f9fefe;
                    color: #00857f;
                }

                tbody td {
                    padding: 12px;
                    font-size: 12px;
                }

                .acoes {
                    display: flex;
                    gap: 8px;
                }

                .btn-acao {
                    display: inline-block;
                    width: 16px;
                    height: 16px;
                    margin-top: 5px;
                    background-color: #ccc;
                    border-radius: 4px;
                }

                tbody tr:hover {
                    background-color: #eefaf9;
                    cursor: pointer;
                }
            </style>

            <table>
            <thead>
            <tr>
                <th>Data do Lançamento</th>
                <th>Período</th>
                <th>Tipo</th>
                <th>Cód. Mov.</th>
                <th>Cód. Conta</th>
                <th>Classificação</th>
                <th>Cód. CC</th>
                <th>Centro de Custo</th>
                <th>Descrição</th>
                <th>Detalhamento</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($contabilidade->where('valor', '!=', 0) as $item)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($item->data_lancamento)->format('d/m/Y') }}</td>
                        <td>{{ $item->periodo_competencia }}</td>
                        <td>{{ $item->tipo_lancamento }}</td>
                        <td>{{ $item->codigo_movimentacao }}</td>
                        <td>{{ $item->codigo_conta }}</td>
                        <td>{{ strtoupper($item->classificacao_conta) }}</td>
                        <td>{{ $item->codigo_cc }}</td>
                        <td>{{ strtoupper($item->centro_custo ?? 'N/A') }}</td>
                        <td>{{ $item->descricao_lancamento }}</td>
                        <td>{{ $item->detalhamento }}</td>
                        <td style="color: {{ $item->valor < 0 ? 'red' : 'inherit' }}">
                            R$ {{ number_format($item->valor, 2, ',', '.') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" style="text-align: center;">Nenhum lançamento encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

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