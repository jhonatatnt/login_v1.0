<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>In铆cio</title>
    
    <!-- Fonte do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!-- Estilos CSS b谩sicos -->
    <style>
        
    </style>
</head>
<body>

    @include('includes.menu',['classhome' => 'activate', 'classestrategias' => '', 'classcontas' => '', 'classoperadores' => ''])

    
    <div id="content_section">
  
    <div class="container">
        
        <style>
            .container {
                width: 1024px;
                margin: 115px auto;
              }
              
            .top_card,.bottom_card{
                display:block;
            }
            
            .card {
                display:block;
                background: #C2F6C0;
                border-radius: 14px;
                padding: 12px;
                margin-bottom:21px;
                width: 241px;
                height:94px;
            }
            
            .card_venda{
                background:#FFAAAA;
            }
        
             /*Topo esquerdo (c贸digo + badge) */
            .top_left {
                display:block;
                float:left;
            }
        
            .code {
                display:block;
                float:left;
                background: #000;
                color: #fff;
                font-weight: 700;
                padding: 8px 12px;
                border-radius: 7px;
                font-size: 0.65rem;
            }
        
            .badge {
                display:block;
                float:right;
                background: #7ff07f;
                color: #fff;
                font-weight: 700;
                border-radius: 7px;
                margin: 0px 7px;
                padding: 7px 12px;
                font-size: 0.75rem;
            }
            
            .badge_venda{
                background:#FF3135;
            }
        
             /*Topo direito (info da compra) */
            .top_right {
                display:block;
                float:right;
            }
        
            .label {
              display: block;
              text-align:right;
              font-size: 0.6rem;
              font-weight: 700;
              color: #000;
              margin-bottom: 0px;
            }
        
            .value {
                display: block;
                text-align:right;
                font-size: 1.2rem;
                font-weight: 800;
                color: #000;
                line-height: 1;
            }
        
            /* Status (inferior esquerdo) */
            .bottom_left{
                display:block;
                float:left;
            }
        
            .status {
                display:block;
                text-align: center;
                background: #F2FF37;
                color: #000;
                font-weight: 700;
                padding: 3px 35px;
                margin: 10px 0;
                border-radius: 7px;
                font-size: 0.75rem;
            }
        
             /*Bandeira + c贸digo (inferior direito) */
            .bottom_right {
                display:block;
                float:right;
            }
        
            .flag {
              display: block;
              height:25px;
              align-items: center;
              background: rgba(0,0,0,0.05);
              border-radius: 7px;
              margin: 10px 0;
              padding: 3px 6px;
            }
        
            .flag img {
                display:block;
                float: left;
                height: 10px;
                margin:5px 0;
                border-radius: 2px;
            }
        
            .flag span {
                display:block;
                float: right;
                color: #000;
                margin:1px 0px 1px 3.5px;
                font-weight: 700;
                font-size: 0.65rem;
            }
        
          </style>
          
        <style>
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
            
            .op_mestre_a, .op_mestre_b{
                display:block;
                float:left;
            }
            
            .op_secundario_a, .op_secundario_b{
                display:block;
                float:right;
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
            
            .profile_container{
    position: relative;
    width: 241px;
    height: 241px;
    margin-bottom: 14px;
}

.profile_op{
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 21px;
}

/* Nome sobreposto */
.profile_name{
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 10px 20px;
    border-radius: 0 0 21px 21px;

    background: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0));
    color: #fff;
    font-weight: 600;
    text-align: left;
}

        </style>
        
        <div id="grupo_a">
            
            <div class="title_gp">
                <h2>Grupo A</h2>
            </div>
            
            <div class="op_mestre_a" id="grupo_a_mestre"></div>
            <div class="op_secundario_a" id="grupo_a_secundario"></div>
            
        </div>
        
        <div id="grupo_b">
            
            <div class="title_gp">
                <h2>Grupo B</h2>
            </div>
            
            <div class="op_mestre_b" id="grupo_b_mestre"></div>
            <div class="op_secundario_b" id="grupo_b_secundario"></div>

        </div>    
    
    </div>
    
    </div>
    
    
    <!--
        no dia vigente se nao tiver nenhuma estrategia manter front com aviso: aguardando ordem e com foto user.png
        reportar apenas ordens da mesma estrategia
        quando uma nova estrategia entrar ignorar ordens antigas 
        
        Testar mais de uma conta para mesma pessoa
        atualizar controller de estratégias para gerar ordens
    -->
    

<script>
const USER_FOTO_FALLBACK =
    'https://sygest.wevcapital.com.br/media/colaboradores/user.png?token=2f9d8a7b1c4e6f0a9d3e8b2c';

let estrategiaAtiva = null;

async function carregarOrdens() {
    try {
        const response = await fetch('/monitor/ordens/data', {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });

        const ordens = await response.json();

        // 1️⃣ SEM ORDENS
        if (!ordens || !ordens.length) {
            estrategiaAtiva = null;
            renderAguardando();
            return;
        }

        // 2️⃣ IDENTIFICA A ÚLTIMA ESTRATÉGIA PELO HORÁRIO
        const ultimaOrdem = ordens.reduce((maisRecente, atual) => {
            return new Date(atual.date_creation) > new Date(maisRecente.date_creation)
                ? atual
                : maisRecente;
        });

        const estrategiaAtual = ultimaOrdem.id_estrategy;

        // 3️⃣ SE MUDOU A ESTRATÉGIA → LIMPA TELA
        if (estrategiaAtiva !== estrategiaAtual) {
            estrategiaAtiva = estrategiaAtual;
            limparGrupos();
        }

        // 4️⃣ FILTRA SOMENTE ORDENS DA ÚLTIMA ESTRATÉGIA
        const ordensFiltradas = ordens.filter(
            o => o.id_estrategy === estrategiaAtiva
        );

        // 5️⃣ SE NÃO EXISTIR ORDEM DA ESTRATÉGIA
        if (!ordensFiltradas.length) {
            renderAguardando();
            return;
        }

        renderizarGrupos(ordensFiltradas);

    } catch (e) {
        console.error('Erro ao sincronizar ordens', e);
        estrategiaAtiva = null;
        renderAguardando();
    }
}


/* =======================
   RENDERIZAÇÃO
======================= */

function renderAguardando() {
    ['grupo_a_mestre','grupo_a_secundario','grupo_b_mestre','grupo_b_secundario']
        .forEach(id => {
            document.getElementById(id).innerHTML = aguardandoHTML();
        });
}

function limparGrupos() {
    ['grupo_a_mestre','grupo_a_secundario','grupo_b_mestre','grupo_b_secundario']
        .forEach(id => {
            document.getElementById(id).innerHTML = '';
        });
}

function renderizarGrupos(ordens) {
    const grupoA = ordens.filter(o => o.grupo === 'A');
    const grupoB = ordens.filter(o => o.grupo === 'B');

    renderGrupo(grupoA, 'grupo_a');
    renderGrupo(grupoB, 'grupo_b');
}

function renderGrupo(ordens, grupo) {
    const mestreEl = document.getElementById(`${grupo}_mestre`);
    const secundarioEl = document.getElementById(`${grupo}_secundario`);

    mestreEl.innerHTML = '';
    secundarioEl.innerHTML = '';

    if (!ordens.length) {
        mestreEl.innerHTML = aguardandoHTML();
        secundarioEl.innerHTML = aguardandoHTML();
        return;
    }

    // Agrupa por operador (1 foto por operador)
    const operadores = agruparPorOperador(ordens);

    Object.values(operadores).forEach(item => {
        const operador = item.operador;
        const ordensOperador = item.ordens;
        const tipo = ordensOperador[0].tipo_operador; // mestre | secundario

        const foto = operador?.foto?.trim()
            ? operador.foto
            : USER_FOTO_FALLBACK;

        let html = `
            <div class="profile_container">
                <img src="${foto}" class="profile_op">
                <span class="profile_name">${operador?.name_operador ?? '—'}</span>
            </div>
        `;

        ordensOperador.forEach(ordem => {
            html += `
                <div class="card ${ordem.tipo_negocio === 'venda' ? 'card_venda' : ''}">
                    <div class="top_card">
                        <div class="top_left">
                            <div class="code">${ordem.conta?.conta ?? '---'}</div>
                            <div class="badge ${ordem.tipo_negocio === 'venda' ? 'badge_venda' : ''}">
                                ${ordem.conta?.qtd_contrato ?? 0}
                            </div>
                        </div>

                        <div class="top_right">
                            <span class="label">${ordem.tipo_negocio.toUpperCase()}</span>
                            <span class="value">${Number(ordem.valor).toLocaleString('pt-BR')}</span>
                        </div>
                    </div>

                    <div class="bottom_card">
                        <div class="bottom_left">
                            <div class="status">${ordem.status.toUpperCase()}</div>
                        </div>
                        <div class="bottom_right">
                            <div class="flag">
                                <img src="https://flagcdn.com/w20/br.png">
                                <span>WIN</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        if (tipo === 'mestre') {
            mestreEl.innerHTML += html;       // ⬅️ ESQUERDA
        } else {
            secundarioEl.innerHTML += html;  // ⬅️ DIREITA
        }
    });
}


function agruparPorOperador(ordens) {
    return ordens.reduce((acc, ordem) => {
        const id = ordem.operador?.id_operador ?? 'sem_operador';

        if (!acc[id]) {
            acc[id] = {
                operador: ordem.operador,
                ordens: []
            };
        }

        acc[id].ordens.push(ordem);
        return acc;
    }, {});
}



function aguardandoHTML() {
    return `
        <div class="profile_container">
            <img src="${USER_FOTO_FALLBACK}" class="profile_op">
            <span class="profile_name">Aguardando ordem</span>
        </div>

        <div class="card" style="background:#eee">
            <div class="bottom_card">
                <div class="bottom_left">
                    <div class="status" style="background: transparent;">SEM ORDENS NO MOMENTO</div>
                </div>
        </div>
    `;
}


/* 🔄 LOOP */
carregarOrdens();
setInterval(carregarOrdens, 1000);
</script>






</body>
</html>
