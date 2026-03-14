<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Monitor de Ordens</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            background: #f1f3f5;
            font-family: Inter, Arial, sans-serif;
        }
        h2 {
            text-align: center;
            margin: 20px 0;
        }
        .grid {
            max-width: 1300px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 16px;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            padding: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,.08);
            border-left: 5px solid #0d6efd;
            animation: fadeIn .4s ease;
        }
        .status {
            font-weight: bold;
        }
        .novo {
            border-left-color: #198754;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(8px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>

<h2>📊 Monitoramento de Ordens (Tempo Real)</h2>

<div class="grid" id="ordens"></div>

<script>
    let ultimoId = 0;

    async function carregarOrdens() {
        try {
            const response = await fetch('/monitor/ordens/data', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const ordens = await response.json();
            const container = document.getElementById('ordens');

            container.innerHTML = '';

            ordens.forEach(ordem => {
                const isNova = ordem.id > ultimoId;
                if (ordem.id > ultimoId) ultimoId = ordem.id;

                container.innerHTML += `
                    <div class="card ${isNova ? 'novo' : ''}">
                        <h4>Ordem #${ordem.id}</h4>

                        <p><strong>Estratégia:</strong> ${ordem.estrategia?.nome ?? '-'}</p>
                        <p><strong>Operador:</strong> ${ordem.operador?.name_operador ?? '-'}</p>
                        <p><strong>Conta:</strong> ${ordem.conta?.conta ?? '-'}</p>
                        <p><strong>Grupo:</strong> ${ordem.grupo}</p>
                        <p><strong>Valor:</strong> R$ ${Number(ordem.valor).toFixed(2)}</p>
                        <p><strong>Tipo:</strong> ${ordem.tipo_negocio}</p>
                        <p class="status">Status: ${ordem.status}</p>

                        <small>${new Date(ordem.date_creation).toLocaleString()}</small>
                    </div>
                `;
            });

        } catch (error) {
            console.error('Erro ao carregar ordens:', error);
        }
    }

    carregarOrdens();
    setInterval(carregarOrdens, 3000);
</script>

</body>
</html>
