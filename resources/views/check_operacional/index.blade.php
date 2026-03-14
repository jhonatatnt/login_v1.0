<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

<title>Checklist Operacional</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<link href="{{asset('css/app.css')}}" rel="stylesheet">

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

@include('includes.menu', [
'classhome' => '',
'classestrategias' => '',
'classcontas' => '',
'classcheck' => 'activate'
])

<div id="content_section">

<div class="table-card">

<div class="table-header">
<h2>Checklist Operacional Trader</h2>

<a href="/check/create" class="btn-primary">
+ Novo Checklist
</a>

</div>

<table class="modern-table">

<thead>

<tr>
<th>Data</th>
<th>Operador</th>
<th>Login Plataforma</th>
<th>Contas</th>
<th>Senha</th>
<th>OCO</th>
<th>Contratos</th>
<th>Replicador</th>
<th>Reunião</th>
</tr>

</thead>

<tbody>

@forelse($checks as $check)

<tr>

<td>{{ $check->data_creation ?? '-' }}</td>

<td>{{ $check->operador->name ?? '-' }}</td>

<td>
<span class="status {{ $check->login_plataforma ? 'ok' : 'pendente' }}">
{{ $check->login_plataforma ? 'OK' : 'Pendente' }}
</span>
</td>

<td>
<span class="status {{ $check->valid_contas ? 'ok' : 'pendente' }}">
{{ $check->valid_contas ? 'OK' : 'Pendente' }}
</span>
</td>

<td>
<span class="status {{ $check->valid_senha_op ? 'ok' : 'pendente' }}">
{{ $check->valid_senha_op ? 'OK' : 'Pendente' }}
</span>
</td>

<td>
<span class="status {{ $check->valid_OCO ? 'ok' : 'pendente' }}">
{{ $check->valid_OCO ? 'OK' : 'Pendente' }}
</span>
</td>

<td>
<span class="status {{ $check->valid_contratos ? 'ok' : 'pendente' }}">
{{ $check->valid_contratos ? 'OK' : 'Pendente' }}
</span>
</td>

<td>
<span class="status {{ $check->conf_replicador ? 'ok' : 'pendente' }}">
{{ $check->conf_replicador ? 'OK' : 'Pendente' }}
</span>
</td>

<td>
<span class="status {{ $check->reuniao ? 'ok' : 'pendente' }}">
{{ $check->reuniao ? 'OK' : 'Pendente' }}
</span>
</td>


</tr>

@empty

<tr>
<td colspan="9" class="empty">
Nenhum checklist cadastrado.
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</body>
</html>