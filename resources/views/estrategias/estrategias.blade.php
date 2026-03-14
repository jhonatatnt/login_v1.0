<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>Estratégia</title>
    
    <!-- Fonte do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!-- Estilos CSS básicos -->
    <style>
        
    </style>
</head>
<body>
    
    @include('includes.menu',['classhome' => '', 'classestrategias' => 'activate', 'classcontas' => '', 'classoperadores' => ''])

<div id="content_section" style="margin-top: 10px;">
        
    <form action="{{ route('estrategias.store') }}" method="POST" id="form_estrategia">
        @csrf

        <div class="container_btn">
            
            <style>

                .container_btn {
                    width: 1024px;
                    margin: 100px auto 20px auto;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }
                
                /* Lado esquerdo */
                #section_left {
                    display: flex;
                    align-items: center;
                    gap: 14px;
                }
                
                /* Título "Adicionar contas" */
                .title_btn {
                    font-size: 14px;
                    font-weight: 600;
                    color: #444;
                    padding-right: 8px;
                }
                
                /* Botões + e - */
                .formBtn {
                    width: 40px;
                    height: 40px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 20px;
                    font-weight: 600;
                    background: #fff;
                    color: #333;
                    border-radius: 10px;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.08);
                }
                
                .formBtn:hover {
                    background: #000;
                    color: #fff;
                    transform: translateY(-1px);
                }
                
                /* Lado direito */
                #section_right {
                    display: flex;
                    justify-content: flex-end;
                }
                
                /* Botão Enviar ordem */
                #section_right button, #histBtn {
                    padding: 6px 18px;
                    font-size: 14px;
                    font-weight: 600;
                    border: none;
                    border-radius: 12px;
                    background: linear-gradient(135deg, #111 0%, #000 100%);
                    color: #fff;
                    cursor: pointer;
                    transition: all 0.25s ease;
                    box-shadow: 0 3px 10px rgba(0,0,0,0.2);
                    border: solid 2px #000;
                }
                
                #section_right button:hover {
                    background: linear-gradient(135deg, #0f9d58 0%, #1dbf73 100%);
                    transform: translateY(-1px);
                }
                
                #histBtn:hover {
                    background: #fff;
                    color: #000;
                    border: solid 2px #000;
                }
                
                
                /* Clique */
                #section_right button:active,
                .formBtn:active {
                    transform: translateY(0);
                    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
                }

            </style>
            
            <div id="section_left">
                <div id="histBtn" onclick="window.location.href = '{{ route('estrategias.historico') }}'">Histórico de estratégias
                </div>
                <div class="title_btn">
                    <span>Adicionar contas</span>
                </div>
                <!-- Botão "+" -->
                <div class="formBtn" id="addbtn" onclick="addAccountsBox()">+</div>
                <!-- Botão "-" -->
                <div class="formBtn" id="rmvbtn" onclick="RemoveAccountsBox()">-</div>
            </div>
            
            <div id="section_right">
                <button id="btn_submit" type="submit">Enviar</button>
            </div>
            
            
        </div>


        <div class="container">
            
            <style>
                .alert {
    padding: 15px 18px;
    border-radius: 8px;
    margin-bottom: 15px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
}

.alert ul {
    margin: 8px 0 0;
    padding-left: 18px;
}

.alert li {
    margin-bottom: 4px;
}

/* ERRO */
.alert-error {
    background-color: #ffe5e5;
    border: 1px solid #ff6b6b;
    color: #b30000;
}

/* SUCESSO */
.alert-success {
    background-color: #e6f9ee;
    border: 1px solid #2ecc71;
    color: #1e7e34;
}

            </style>
            
            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>Ops! Algo deu errado:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if (session('success'))
                <div class="alert alert-success">
                    <strong>Sucesso!</strong>
                    {{ session('success') }}
                </div>
            @endif


            <style>
                .container {
                    width: 1024px;
                    margin: 7px auto 14px auto;
                }
                  
                #grupo_a{
                    display:block;
                    float:left;
                    width:500px;
                }
                #grupo_b{
                    display:block;
                    float:right;
                    width:500px;
                }
                
                .container_form{
                    display:block;
                    width: 500px;
                    background:#ECECEC;
                    border-radius: 14px;
                }
                .form_gp{
                    padding:21px;
                }
                
                .title_gp{
                    display:block;
                    width:100%;
                    background:#000;
                    border-radius: 7px;
                    margin-bottom: 14px;
                }
                
                .title_gp h2{
                    display:block;
                    width:100%;
                    text-align:center;
                    font-size: 1.2rem;
                    color:#fff;
                }
                
                .profile_op{
                    display:block;
                    width: 241px;
                    height:241px;
                    background:#fff;
                    border-radius:21px;
                    margin-bottom: 14px;
                }
              
                .row {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 25px;
                }
            
                .col {
                    width: 48%;
                }
            
                label {
                    font-size: 14px;
                    font-weight: 600;
                    color: #444;
                    margin-bottom: 6px;
                    display: block;
                }
            
                select, input {
                    width: 100%;
                    padding: 10px 14px;
                    border: 1px solid #ccc;
                    border-radius: 8px;
                    font-size: 14px;
                    background: #fafafa;
                }
            
                .avatarBox {
                    display: flex;
                    align-items: center;
                    gap: 12px;
                    margin-bottom: 8px;
                }
            
                .avatar {
                    width: 48px;
                    height: 48px;
                    border-radius: 50%;
                    object-fit: cover;
                }
            
            </style>
            
            <div id="grupo_a">
                
                <div class="title_gp">
                    <h2>Grupo A</h2>
                </div>
                
                <div class="container_form">
                
                    <div class="form_gp">
                        <!-- Linha 1: Operadores -->
                        <div class="row">
                            <div class="col">
                                <div class="avatarBox">
                                    
                                    
                                    <img src="https://sygest.wevcapital.com.br/media/colaboradores/user.png?token=2f9d8a7b1c4e6f0a9d3e8b2c" class="avatar">
                                    <div><label for="op_mestre_a">Operador mestre</label></div>
                                </div>
                                
                                <select id="op_mestre_a" name="op_mestre_a">
                                    <option value="" disabled selected>Selecione</option>
                                    @foreach ($operadores as $operador)
                                        <option value="{{ $operador->cod_operador }}" data-avatar="{{ $operador->foto }}"
                                            @selected(request('operador') == $operador->cod_operador)>
                                            {{ $operador->name_operador }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                    
                            <div class="col">
                                <div class="avatarBox">
                                    <img src="https://sygest.wevcapital.com.br/media/colaboradores/user.png?token=2f9d8a7b1c4e6f0a9d3e8b2c" class="avatar">
                                    <div><label for="op_sec_a">Op. Secundário</label></div>
                                </div>
                                <select id="op_sec_a" name="op_sec_a">
                                    <option value="" disabled selected>Selecione</option>
                                    @foreach ($operadores as $operador)
                                        <option value="{{ $operador->cod_operador }}" data-avatar="{{ $operador->foto }}"
                                            @selected(request('operador') == $operador->cod_operador)>
                                            {{ $operador->name_operador }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <!-- Container para contas dinâmicas -->
                        <div class="accountsContainer grupo_a">
    
                            <!-- Bloco de contas inicial -->
                            <div class="accountsBox grupo_a">
                                <div class="row">
                                    <div class="col">
                                        <label>Conta mestre</label>

                                        <select class="contas_mestre_a" name="contas_mestre_a[]">
                                            <option value="" disabled selected>Selecione</option>
                                        
                                            @foreach ($contas as $conta)
                                                <option value="{{ $conta->id_conta }}">
                                                    {{ $conta->conta }} - {{ $conta->login_email }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                    
                                    <div class="col">
                                        <label>Conta secundária</label>
                                        <select class="contas_sec_a" name="contas_sec_a[]">
                                            <option value="" disabled selected>Selecione</option>
                                        
                                            @foreach ($contas as $conta)
                                                <option value="{{ $conta->id_conta }}">
                                                    {{ $conta->conta }} - {{ $conta->login_email }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                    
                        <!-- Linha 3: Tipo de trade -->
                        <div class="row" style="margin-top: 30px;">
                            <div class="col" style="width: 30%;">
                                
                                <label for="tipo_op_a">Tipo de trader</label>
    
                                <select id="tipo_op_a" name="tipo_op_a">
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="compra">Compra</option>
                                    <option value="venda">Venda</option>
                                </select>
                                
                            </div>
                    
                            <div class="col" style="width: 32%;">
                                <label for="valor_mestre_a">Preço</label>
                                <input type="text" id="valor_mestre_a" name="valor_mestre_a" value="146600">
                            </div>
                    
                            <div class="col" style="width: 32%;">
                                <label for="variacao_a">Variação</label>
                                <input type="text" id="variacao_a" name="variacao_a" value="0">
                            </div>
                        </div>
                    </div>
                    
                    <div class="review_trader review_trader_a">
                        
                        <h3>Resumo de ordem - Grupo A</h3>

                        <div class="review_grid">
                            <div class="review_col">
                                <p><strong>Operador mestre:</strong></p>
                                <p><strong>Conta mestre:</strong></p>
                                <p><strong>Preço:</strong></p>
                                <p><strong>Ganho:</strong></p>
                                <p><strong>Perda:</strong></p>
                                <p><strong>Contratos:</strong></p>
                            </div>
                
                            <div class="review_col">
                                <p><strong>Operador secundário:</strong></p>
                                <p><strong>Conta sec.:</strong></p>
                                <p><strong>Preco + variacao:</strong></p>
                                <p><strong>Ganho:</strong></p>
                                <p><strong>Perda:</strong></p>
                                <p><strong>Contratos:</strong></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
            <div id="grupo_b">
                
                <div class="title_gp">
                    <h2>Grupo B</h2>
                </div>
                
                <div class="container_form">
                
                    <div class="form_gp">
    
                            <!-- Linha 1: Operadores -->
                            <div class="row">
                                <div class="col">
                                    <div class="avatarBox">
                                        <img src="https://sygest.wevcapital.com.br/media/colaboradores/user.png?token=2f9d8a7b1c4e6f0a9d3e8b2c" class="avatar">
                                        <div><label for="op_mestre_b">Operador mestre</label></div>
                                    </div>
                                    <select id="op_mestre_b" name="op_mestre_b">
                                        <option value="" disabled selected>Selecione</option>
                                        @foreach ($operadores as $operador)
                                            <option value="{{ $operador->cod_operador }}" data-avatar="{{ $operador->foto }}"
                                                @selected(request('operador') == $operador->cod_operador)>
                                                {{ $operador->name_operador }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                        
                                <div class="col">
                                    <div class="avatarBox">
                                        <img src="https://sygest.wevcapital.com.br/media/colaboradores/user.png?token=2f9d8a7b1c4e6f0a9d3e8b2c" class="avatar">
                                        <div><label for="op_sec_b">Op. Secundário</label></div>
                                    </div>
                                    <select id="op_sec_b" name="op_sec_b">
                                        <option value="" disabled selected>Selecione</option>
                                        @foreach ($operadores as $operador)
                                            <option value="{{ $operador->cod_operador }}" data-avatar="{{ $operador->foto }}"
                                                @selected(request('operador') == $operador->cod_operador)>
                                                {{ $operador->name_operador }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <!-- Container para contas dinâmicas -->
                            <div class="accountsContainer grupo_b">
    
                        
                                <!-- Bloco de contas inicial -->
                                <div class="accountsBox grupo_b">
                                    <div class="row">
                                        <div class="col">
                                            <label>Conta mestre</label>
                                            <select class="contas_mestre_b" name="contas_mestre_b[]">
                                                <option value="" disabled selected >Selecione</option>
                                        
                                            @foreach ($contas as $conta)
                                                <option value="{{ $conta->id_conta }}">
                                                    {{ $conta->conta }} - {{ $conta->login_email }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                        
                                        <div class="col">
                                            <label>Conta secundária</label>
                                            <select class="contas_sec_b" name="contas_sec_b[]">
                                                <option value="" disabled selected >Selecione</option>
                                        
                                            @foreach ($contas as $conta)
                                                <option value="{{ $conta->id_conta }}">
                                                    {{ $conta->conta }} - {{ $conta->login_email }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        
                            </div>
                        
                            <!-- Linha 3: Tipo de trade -->
                            <div class="row" style="margin-top: 30px;">
                                
                                <div class="col" style="width: 30%;">
                                    <label for="tipo_op_b">Tipo de trader</label>
    
                                    <select id="tipo_op_b" name="tipo_op_b">
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="compra" >Compra</option>
                                        <option value="venda" >Venda</option>
                                    </select>
                                </div>
                        
                                <div class="col" style="width: 32%;">
                                    <label for="preco_b">Preço</label>
                                    <input type="text" id="preco_b" name="preco_b" value="146600" readonly>
                                </div>
                        
                                <div class="col" style="width: 32%;">
                                    <label for="variacao_b">Variação</label>
                                    <input type="text" id="variacao_b" name="variacao_b" value="0" readonly>
                                </div>
                            </div>
                    </div>
                    
                    
                    <style>
                        .review_trader {
                            margin: 0 20px;
                            padding: 20px;
                            background: #eaeaea;
                            border-radius: 14px;
                            font-size: 14px;
                            color: #000;
                        }
                        
                        .review_trader.compra {
                            background: #ccff99; /* verde suave */
                        }
                        
                        .review_trader.venda {
                            background: #ffd6d6; /* vermelho suave */
                        }

                        
                        .review_trader_a h3, .review_trader_b h3 {
                            margin-bottom: 7px;
                            font-size: 16px;
                            font-weight: 700;
                        }
                        
                        .review_grid {
                            display: grid;
                            grid-template-columns: 1fr 1fr;
                            gap: 20px;
                        }
                        
                        .review_col p {
                            margin: 4px 0;
                        }

                    </style>
                    
                    <div class="review_trader review_trader_b">
                        
                        <h3>Resumo de ordem - Grupo B</h3>

                        <div class="review_grid">
                            <div class="review_col">
                                <p><strong>Operador mestre:</strong></p>
                                <p><strong>Conta mestre:</strong></p>
                                <p><strong>Preço:</strong></p>
                                <p><strong>Ganho:</strong></p>
                                <p><strong>Perda:</strong></p>
                                <p><strong>Contratos:</strong></p>
                            </div>
                
                            <div class="review_col">
                                <p><strong>Operador secundário:</strong></p>
                                <p><strong>Conta sec.:</strong></p>
                                <p><strong>Preco + variacao:</strong></p>
                                <p><strong>Ganho:</strong></p>
                                <p><strong>Perda:</strong></p>
                                <p><strong>Contratos:</strong></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>    
        
        </div>
    </form>
    
</div>
        

<script>
    const contas = @json($contas);

    function gerarOptionsContas() {
        return contas.map(conta =>
            `<option value="${conta.id_conta}">
                ${conta.conta} - ${conta.login_email}
            </option>`
        ).join('');
    }
</script>


<script>
function addAccountsBox() {

    /* ===== GRUPO A ===== */
    const containerA = document.querySelector('.accountsContainer.grupo_a');

    const boxA = document.createElement('div');
    boxA.classList.add('accountsBox', 'grupo_a');

    boxA.innerHTML = `
        <div class="row">
            <div class="col">
                <select class="contas_mestre_a" name="contas_mestre_a[]">
                    <option value="" disabled selected>Selecione</option>
                    ${gerarOptionsContas()}
                </select>
            </div>

            <div class="col">
                <select class="contas_sec_a" name="contas_sec_a[]">
                    <option value="" disabled selected>Selecione</option>
                    ${gerarOptionsContas()}
                </select>
            </div>
        </div>
    `;

    containerA.appendChild(boxA);

    /* ===== GRUPO B ===== */
    const containerB = document.querySelector('.accountsContainer.grupo_b');

    const boxB = document.createElement('div');
    boxB.classList.add('accountsBox', 'grupo_b');

    boxB.innerHTML = `
        <div class="row">
            <div class="col">
                <select class="contas_mestre_b" name="contas_mestre_b[]">
                    <option value="" disabled selected>Selecione</option>
                    ${gerarOptionsContas()}
                </select>
            </div>

            <div class="col">
                <select class="contas_sec_b" name="contas_sec_b[]">
                    <option value="" disabled selected>Selecione</option>
                    ${gerarOptionsContas()}
                </select>
            </div>
        </div>
    `;

    containerB.appendChild(boxB);

    atualizarTudo();
}


function RemoveAccountsBox() {

    const containerA = document.querySelector('.accountsContainer.grupo_a');
    const containerB = document.querySelector('.accountsContainer.grupo_b');

    const boxesA = containerA.querySelectorAll('.accountsBox');
    const boxesB = containerB.querySelectorAll('.accountsBox');

    if (boxesA.length <= 1 || boxesB.length <= 1) return;

    boxesA[boxesA.length - 1].remove();
    boxesB[boxesB.length - 1].remove();

    atualizarTudo();
}

</script>



<script>
document.addEventListener('DOMContentLoaded', function () {

    const precoA = document.getElementById('valor_mestre_a');
    const variacaoA = document.getElementById('variacao_a');
    const tipoA = document.getElementById('tipo_op_a');

    const precoB = document.getElementById('preco_b');
    const variacaoB = document.getElementById('variacao_b');
    const tipoB = document.getElementById('tipo_op_b');

    if (!precoA || !precoB) return;

    precoA.addEventListener('input', () => {
        precoB.value = precoA.value;
    });

    variacaoA.addEventListener('input', () => {
        variacaoB.value = variacaoA.value;
    });

    tipoA.addEventListener('change', () => {
        tipoB.value = tipoA.value === 'compra' ? 'venda' : 'compra';
    });

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    function bindAvatar(selectId) {
        const select = document.getElementById(selectId);
        if (!select) return;

        const avatarImg = select
            .closest('.col')
            .querySelector('.avatar');

        select.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const avatar = selectedOption.getAttribute('data-avatar');

            if (avatar) {
                avatarImg.src = avatar;
            }
        });
    }

    // Grupo A
    bindAvatar('op_mestre_a');
    bindAvatar('op_sec_a');

    // Grupo B
    bindAvatar('op_mestre_b');
    bindAvatar('op_sec_b');

});
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    /* ==========================
       FUNÇÕES AUXILIARES
    ========================== */

    function getSelectedText(select) {
        if (!select || select.selectedIndex <= 0) return '-';
        return select.options[select.selectedIndex].text;
    }

    function getMultipleSelectedTexts(selector) {
        const selects = document.querySelectorAll(selector);
        const values = [];

        selects.forEach(select => {
            if (select.selectedIndex > 0) {
                values.push(select.options[select.selectedIndex].text);
            }
        });

        return values.length ? values.join('<br>') : '-';
    }

    function parseNumber(value) {
        if (!value) return 0;
        return parseFloat(value.replace(',', '.')) || 0;
    }

    /* ==========================
       RESUMO GRUPO A
    ========================== */

    function updateResumoGrupoA() {
        const operadorMestre   = getSelectedText(document.getElementById('op_mestre_a'));
        const operadorSec      = getSelectedText(document.getElementById('op_sec_a'));

        const contasMestre     = getMultipleSelectedTexts('[name="contas_mestre_a[]"]');
        const contasSec        = getMultipleSelectedTexts('[name="contas_sec_a[]"]');

        const preco            = parseNumber(document.getElementById('valor_mestre_a')?.value);
        const variacao         = parseNumber(document.getElementById('variacao_a')?.value);
        const tipo             = document.getElementById('tipo_op_a')?.value;

        const precoFinal       = preco + variacao;

        const resumo = document.querySelector('.review_trader_a');
        if (!resumo) return;

        resumo.classList.remove('compra', 'venda');
        if (tipo) resumo.classList.add(tipo);

        resumo.querySelector('.review_col:nth-child(1)').innerHTML = `
            <p><strong>Operador mestre:</strong> ${operadorMestre}</p>
            <p><strong>Contas mestre:</strong><br>${contasMestre}</p>
            <p><strong>Preço:</strong> <strong>${preco.toFixed(2)}</strong></p>
        `;

        resumo.querySelector('.review_col:nth-child(2)').innerHTML = `
            <p><strong>Operador secundário:</strong> ${operadorSec}</p>
            <p><strong>Contas secundárias:</strong><br>${contasSec}</p>
            <p><strong>Preço + variação:</strong> ${precoFinal.toFixed(2)}</p>
        `;
    }

    /* ==========================
       RESUMO GRUPO B (INVERSO)
    ========================== */

    function updateResumoGrupoB() {
        const operadorMestre = getSelectedText(document.getElementById('op_mestre_b'));
        const operadorSec    = getSelectedText(document.getElementById('op_sec_b'));

        const contasMestre   = getMultipleSelectedTexts('[name="contas_mestre_b[]"]');
        const contasSec      = getMultipleSelectedTexts('[name="contas_sec_b[]"]');

        const preco          = parseNumber(document.getElementById('preco_b')?.value);
        const variacao       = parseNumber(document.getElementById('variacao_b')?.value);

        const tipoA = document.getElementById('tipo_op_a')?.value;
        const tipoB = tipoA === 'compra' ? 'venda' : tipoA === 'venda' ? 'compra' : '';

        const precoFinal = preco + variacao;

        const resumo = document.querySelector('.review_trader_b');
        if (!resumo) return;

        resumo.classList.remove('compra', 'venda');
        if (tipoB) resumo.classList.add(tipoB);

        resumo.querySelector('.review_col:nth-child(1)').innerHTML = `
            <p><strong>Operador mestre:</strong> ${operadorMestre}</p>
            <p><strong>Contas mestre:</strong><br>${contasMestre}</p>
            <p><strong>Preço:</strong> <strong>${preco.toFixed(2)}</strong></p>
        `;

        resumo.querySelector('.review_col:nth-child(2)').innerHTML = `
            <p><strong>Operador secundário:</strong> ${operadorSec}</p>
            <p><strong>Contas secundárias:</strong><br>${contasSec}</p>
            <p><strong>Preço + variação:</strong> ${precoFinal.toFixed(2)}</p>
        `;
    }

    /* ==========================
       EVENT DELEGATION (CORE)
    ========================== */

    window.atualizarTudo = function () {
        updateResumoGrupoA();
        updateResumoGrupoB();
    };

    document.addEventListener('change', e => {
        if (e.target.matches('select, input')) {
            atualizarTudo();
        }
    });

    document.addEventListener('input', e => {
        if (e.target.matches('input')) {
            atualizarTudo();
        }
    });

    // Inicial
    atualizarTudo();
});
</script>







</body>
</html>
