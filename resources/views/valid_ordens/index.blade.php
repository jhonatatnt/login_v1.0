<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

<title>Validação de Ordens</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<style>
#content_section {
    width: 1024px;
    margin: 50px auto 20px;
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

.btn-primary, .btn-success, .btn-back {
    background: #0f172a;
    color: #fff;
    padding: 10px 16px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 15px;
}

.btn-back {
    background: #64748b;
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

.status.ok {
    background: #dcfce7;
    color: #166534;
}

.status.pendente {
    background: #fee2e2;
    color: #991b1b;
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

.form-section {
    background: #f8fafc;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 20px;
}

.form-section label {
    font-weight: 600;
    margin-top: 10px;
}

.form-section select, 
.form-section input {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    margin-top: 5px;
    margin-bottom: 15px;
}

.form-buttons {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

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
</head>

<body>

<div id="content_section">

<div class="table-card">

<div class="table-header">
<h2>Validação de Ordens</h2>
</div>

<!-- Botão Voltar -->
<a href="{{ route('home') }}" class="btn-back">Voltar</a>

<!-- Formulário de Validação -->
<form method="POST" action="{{ route('valid_ordens.store') }}" class="form-section">
@csrf

<h4>Nova Validação</h4>

<label>Ordem</label>
<select name="ordem_id" required>
@foreach($ordens as $ordem)
<option value="{{ $ordem->id }}">Ordem #{{ $ordem->id }} | {{ $ordem->grupo }}</option>
@endforeach
</select>

<label>Status</label>
<select name="status">
<option value="aguardando">Aguardando</option>
<option value="executada">Executada</option>
<option value="finalizada">Finalizada</option>
</select>

<label>Resultado</label>
<select name="resultado">
<option value="">--</option>
<option value="ganhou">Gain</option>
<option value="perdeu">Loss</option>
</select>

<div class="form-buttons">
<button type="submit" class="btn-success">Salvar Validação</button>
</div>

</form>

<hr>

<!-- Histórico de Validações -->
<h3>Histórico</h3>

<table class="modern-table">
<thead>
<tr>
<th>ID</th>
<th>Ordem</th>
<th>Status</th>
<th>Resultado</th>
<th>Ação</th>
</tr>
</thead>
<tbody>
@forelse($validacoes as $v)
<tr>
<td>{{ $v->id_valid_ordens }}</td>
<td>{{ $v->ordem_id }}</td>
<td>
<span class="status {{ $v->status == 'executada' || $v->status == 'finalizada' ? 'ok' : 'pendente' }}">
{{ ucfirst($v->status) }}
</span>
</td>
<td>
@if($v->resultado == 'ganhou')
<span class="status ok">GAIN</span>
@elseif($v->resultado == 'perdeu')
<span class="status pendente">LOSS</span>
@else
<span class="status pendente">--</span>
@endif
</td>
<td class="actions">
<form method="POST" action="{{ route('valid_ordens.destroy',$v->id_valid_ordens) }}">
@csrf
@method('DELETE')
<button class="btn-delete">Excluir</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="5" class="empty">Nenhuma validação cadastrada.</td>
</tr>
@endforelse
</tbody>
</table>

</div> <!-- table-card -->
</div> <!-- content_section -->

</body>
</html>