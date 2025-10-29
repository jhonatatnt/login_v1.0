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
            <button onclick="window.location.href='/logout'" style="display: block; padding:0;">
                <img class="img_btn_mn" src="{{ asset('imgs/logout.png') }}" alt="logout" width="35">
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
        </div>
        
    

    {{-- Filtro de período --}}
    @php
        use Carbon\Carbon;
        
        // Captura mês e ano selecionados via GET ou usa o mês vigente

        $mesSelecionado = request('mes') ?? Carbon::now()->month;
        $anoSelecionado = request('ano') ?? Carbon::now()->year;

        $nomesMeses = [
            0 => 'Todos os meses',
            1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
            5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
            9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
        ];
    @endphp


<div style="width: 1024px; margin: 0 auto 20px auto; display: flex; justify-content: space-between; align-items: center;">
    
    <h2 style="display:inline-block;
                    font-family: 'Roboto', sans-serif;
                    font-size: 16px;
                    color: #26827d; /* Verde-azulado semelhante à imagem */
                    font-weight: bold;
                    margin-left: 20px;">Filtrar por período</h2>
    

    <form method="GET" action="{{ route('financeiro') }}" style="display: flex; gap: 10px; align-items:center;">
            <select name="mes" style="padding: 6px 10px; border-radius: 5px; border: 1px solid #ccc;">
                @foreach ($nomesMeses as $num => $nome)
                    <option value="{{ $num }}" {{ $num == $mesSelecionado ? 'selected' : '' }}>{{ $nome }}</option>
                @endforeach
            </select>

            <select name="ano" style="padding: 6px 10px; border-radius: 5px; border: 1px solid #ccc;">
                @for ($i = Carbon::now()->year; $i >= Carbon::now()->year - 5; $i--)
                    <option value="{{ $i }}" {{ $i == $anoSelecionado ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>

            <button type="submit" style="padding: 7px 15px; border:none; border-radius:5px; background:#00b3ad; color:white; cursor:pointer;">
                Filtrar
            </button>
        </form>
</div>

        
        <div id="div_kpi">
            <style>
                #div_kpi{
                    display: block;
                    width: 1024px;
                    margin: 0 auto;
                    /* border: solid 1px black; */
                }

                .kpi{
                    display: inline-block;
                    width: calc(1000px/3);
                    background: #dddddd;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
                    margin-right: 2px;
                    border-radius: 7px;
                }
                .title_kpi{
                    font-size: 12px;
                    font-weight: 500;
                    /* border: solid 1px black; */
                    text-align: center;
                    margin: 12px 12px 0px 12px;
                }
                .value_kpi{
                    font-size: 24px;
                    font-weight: 700;
                    /* border: solid 1px black; */
                    text-align: center;
                    margin: 0px 12px 12px 12px;
                }

                .value_negative{color: red;}

                .value_positive{color:rgb(0, 114, 103);}

                
            </style>
            <ul>

{{-- KPIs --}}
    @php
        $filtrados = $contabilidade->filter(function ($item) use ($mesSelecionado, $anoSelecionado) {
            $data = Carbon::parse($item->data_lancamento);
            $mesOk = ($mesSelecionado == 0) || ($data->month == $mesSelecionado);
            return $mesOk && $data->year == $anoSelecionado;
        });

        $despesasMes = $filtrados->where('tipo_lancamento', 'Despesa (-)')->sum('valor');
        $receitasMes = $filtrados->where('tipo_lancamento', 'Receita (+)')->sum('valor');
        $saldoMes = $receitasMes + $despesasMes; // despesas já são negativas
    @endphp




<li class="kpi">
    <p class="title_kpi">Total gasto operacional (mês atual)</p>
    <h1 class="value_kpi value_negative">
        R$ {{ number_format($despesasMes, 2, ',', '.') }}
    </h1>
</li>

<li class="kpi">
    <p class="title_kpi">Total recebido no mês atual</p>
    <h1 class="value_kpi value_positive">
        R$ {{ number_format($receitasMes, 2, ',', '.') }}
    </h1>
</li>

<li class="kpi">
    <p class="title_kpi">Saldo do mês atual</p>
    <h1 class="value_kpi {{ $saldoMes >= 0 ? 'value_positive' : 'value_negative' }}">
        R$ {{ number_format($saldoMes, 2, ',', '.') }}
    </h1>
</li>
                
 </ul>
        </div>
        
        <div id="div_pri_section">
            <style>
                #div_pri_section{
                    display: block;
                    width: 1024px;
                    padding: 0 0px 0 15px;
                    margin: 36px auto 0 auto;
                    /* border: solid 1px black; */
                }
                #title_table {
                    display:inline-block;
                    font-family: 'Roboto', sans-serif;
                    font-size: 16px;
                    color: #26827d; /* Verde-azulado semelhante à imagem */
                    font-weight: bold;
                    margin: 3px;
                }
                #div_pri_section .btn_section{
                    display: inline-block;
                    padding: 7px 24px;
                    margin-left: 12px;
                    border: none;
                    font-size: 12px;
                    font-weight: 500;
                    border-radius: 3.5px;
                    float: right;
                    cursor: pointer;
                }

                .btn_verde{background: #00FF51; color: #2D2D2D;}
                .btn_cinza{background: #B8B8B8; color: white;}

            </style>
            <h1 id="title_table">Histórico de pagamentos</h1>
            
            <a href="registro-conta"><button class="btn_section btn_verde">Registrar conta</button></a>
            <a href="analitico-financeiro"><button class="btn_section btn_cinza">Base analítica</button><a>
            

        </div>
        
        <div id="div_table">
            <style>
                #div_table{
                    display: block;
                    width: 1024px;
                    margin: 21px auto 0 auto;
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
                    <th>Data</th>
                    <th>Tipo de Lançamento</th>
                    <th>Centro de Custo</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <!--<th>Ações</th>-->
                </tr>
                </thead>
                <!--<tbody>
                    @forelse ($contabilidade->where('valor', '!=', 0) as $item)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->data_lancamento)->format('d/m/Y') }}</td>
                            <td>{{ strtoupper($item->classificacao_conta) }}</td>
                            <td>{{ strtoupper($item->centro_custo ?? 'N/A') }}</td>
                            <td>{{ $item->descricao_lancamento }}</td>
                            <td style="color: {{ $item->valor < 0 ? 'red' : 'inherit' }}">
                                R$ {{ number_format($item->valor, 2, ',', '.') }}
                            </td>
                            <td>
                                <div class="btn-acao" title="editar"></div>
                                <div class="btn-acao" title="excluir" style="background:lightcoral;"></div>
                                <div class="btn-acao" title="visualizar" style="background:lightgreen;"></div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center;">Nenhum lançamento encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>-->
                
@php
        $contabilidadeMes = $filtrados->filter(fn($item) => $item->valor != 0);
    @endphp




@forelse ($contabilidadeMes as $item)
    <tr>
        <td>{{ \Carbon\Carbon::parse($item->data_lancamento)->format('d/m/Y') }}</td>
        <td>{{ strtoupper($item->classificacao_conta) }}</td>
        <td>{{ strtoupper($item->centro_custo ?? 'N/A') }}</td>
        <td>{{ $item->descricao_lancamento }}</td>
        <td style="color: {{ $item->valor < 0 ? 'red' : 'inherit' }}">
            R$ {{ number_format($item->valor, 2, ',', '.') }}
        </td>
        <!--<td>
            <div class="btn-acao" title="editar"></div>
            <div class="btn-acao" title="excluir" style="background:lightcoral;"></div>
            <div class="btn-acao" title="visualizar" style="background:lightgreen;"></div>
        </td>-->
    </tr>
@empty
    <tr>
        <td colspan="6" style="text-align: center;">Nenhum lançamento encontrado neste mês.</td>
    </tr>
@endforelse


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
