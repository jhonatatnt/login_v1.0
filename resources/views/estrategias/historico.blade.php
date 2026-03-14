<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

<title>Estratégia</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<link href="{{asset('css/app.css')}}" rel="stylesheet">

<style>

body{
    font-family:'Inter',sans-serif;
}

/* CONTAINER PRINCIPAL */
#content_section{
    width:1024px;
    margin:100px auto 20px;
}

/* CARD */
.table-card{
    background:#fff;
    border-radius:18px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

/* HEADER */
.table-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

/* BOTÕES */
.btn-dark{
    padding:8px 18px;
    border-radius:12px;
    border:none;
    background:#0f172a;
    color:#fff;
    font-weight:600;
    cursor:pointer;
}

.btn-dark:hover{
    background:#1dbf73;
}

/* FILTROS */
.filters{
    display:flex;
    gap:10px;
    align-items:flex-end;
}

.filters input,
.filters select{
    padding:7px 10px;
    border-radius:8px;
    border:1px solid #ccc;
    font-size:13px;
}

/* TABELA */
.modern-table{
    width:100%;
    border-collapse:collapse;
    font-size:13px;
}

.modern-table thead{
    background:#f8fafc;
}

.modern-table th{
    text-align:left;
    padding:14px;
    font-size:13px;
    color:#334155;
    white-space:nowrap;
}

.modern-table td{
    padding:14px;
    border-bottom:1px solid #e5e7eb;
    white-space:nowrap;
}

.modern-table tr:hover{
    background:#f9fafb;
}

/* BADGES */
.badge{
    padding:6px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
}

.badge.compra{
    background:#dcfce7;
    color:#166534;
}

.badge.venda{
    background:#fee2e2;
    color:#991b1b;
}

/* SCROLL TABELA */
.table-scroll{
    overflow-x:auto;
}

/* RESPONSIVO */
@media(max-width:768px){

#content_section{
    width:100%;
    padding:0 15px;
}

}

</style>
</head>

<body>

@include('includes.menu',['classhome' => '', 'classestrategias' => 'activate', 'classcontas' => '', 'classoperadores' => ''])

<div id="content_section">

<form action="" method="POST" id="form_estrategia">
@csrf

<div class="table-card">

<div class="table-header">

<div>
<button type="button" class="btn-dark" onclick="window.location.href='{{ route('estrategias') }}'">
Voltar
</button>
</div>

<div class="filters">

<input type="date" id="data_inicio" name="data_inicio" value="{{ request('data_inicio') }}">
<input type="date" id="data_fim" name="data_fim" value="{{ request('data_fim') }}">

<select id="operador" name="operador">

<option value="">Operador</option>

@foreach($operadores as $op)

<option value="{{ $op->name_operador }}"
{{ request('operador') == $op->name_operador ? 'selected' : '' }}>

{{ $op->name_operador }}

</option>

@endforeach

</select>

<button type="button" class="btn-dark" onclick="filtrarEstrategias()">
Filtrar
</button>

</div>

</div>

<div class="table-scroll">

<table class="modern-table">

<thead>
<tr>

<th>ID</th>

<th>Op. Mestre A</th>
<th>Op. Sec. A</th>
<th>Valor Mestre A</th>
<th>Tipo Op A</th>
<th>Variação A</th>
<th>Contas Mestre A</th>
<th>Contas Sec. A</th>

<th>Op. Mestre B</th>
<th>Op. Sec. B</th>
<th>Tipo Op B</th>
<th>Contas Mestre B</th>
<th>Contas Sec. B</th>

<th>Data Criação</th>

</tr>
</thead>

<tbody>

@forelse($estrategias as $e)

<tr>

<td>{{ $e->id }}</td>

<td>{{ $e->mestre_a }}</td>
<td>{{ $e->sec_a }}</td>

<td>{{ number_format($e->valor_mestre_a, 2, ',', '.') }}</td>

<td>
<span class="badge {{ strtolower($e->tipo_op_a) == 'compra' ? 'compra' : 'venda' }}">
{{ $e->tipo_op_a }}
</span>
</td>

<td>{{ $e->variacao_a }}</td>

<td>{{ $e->contas_mestre_a }}</td>
<td>{{ $e->contas_sec_a }}</td>

<td>{{ $e->mestre_b }}</td>
<td>{{ $e->sec_b }}</td>

<td>
<span class="badge {{ strtolower($e->tipo_op_b) == 'compra' ? 'compra' : 'venda' }}">
{{ $e->tipo_op_b }}
</span>
</td>

<td>{{ $e->contas_mestre_b }}</td>
<td>{{ $e->contas_sec_b }}</td>

<td>
{{ \Carbon\Carbon::parse($e->date_creation)->format('d/m/Y H:i') }}
</td>

</tr>

@empty

<tr>
<td colspan="14" style="text-align:center;padding:20px;color:#64748b;">
Nenhuma estratégia encontrada
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</form>

</div>

<script>

function filtrarEstrategias(){

    const dataInicio = document.getElementById('data_inicio').value;
    const dataFim = document.getElementById('data_fim').value;
    const operador = document.getElementById('operador').value;
    
    let params = new URLSearchParams();
    
    if(dataInicio) params.append('data_inicio', dataInicio);
    if(dataFim) params.append('data_fim', dataFim);
    if(operador) params.append('operador', operador);
    
    const url = "{{ route('estrategias.historico') }}" + '?' + params.toString();
    
    window.location.href = url;

}

</script>

</body>
</html>