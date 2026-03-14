<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

<title>Novo Checklist</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<link href="{{asset('css/app.css')}}" rel="stylesheet">

<style>

#content_section{
width:1024px;
margin:100px auto 20px;
}

.table-card{
background:#ffffff;
border-radius:18px;
padding:25px;
box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.table-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

.table-header h2{
font-size:22px;
color:#0f172a;
}

.btn-primary{
background:#0f172a;
color:#fff;
padding:10px 16px;
border-radius:12px;
text-decoration:none;
font-weight:600;
border:none;
cursor:pointer;
}

.form-grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:20px;
margin-top:20px;
}

.form-group{
display:flex;
flex-direction:column;
}

.form-group label{
font-size:14px;
margin-bottom:6px;
color:#334155;
}

.form-group input{
padding:10px;
border-radius:8px;
border:1px solid #d1d5db;
}

.checkbox-grid{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:15px;
margin-top:20px;
}

.checkbox-group{
display:flex;
align-items:center;
gap:8px;
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
<h2>Novo Checklist Operacional</h2>
</div>

<form action="{{ route('check.store') }}" method="POST">

@csrf


<div class="form-group">

<label>Operador</label>

<input type="text"
value="{{ auth()->user()->name }}"
disabled>

</div>

<div class="checkbox-grid">

<label class="checkbox-group">
<input type="checkbox" name="login_plataforma">
Login Plataforma
</label>

<label class="checkbox-group">
<input type="checkbox" name="valid_contas">
Validar Contas
</label>

<label class="checkbox-group">
<input type="checkbox" name="valid_senha_op">
Validar Senha Operação
</label>

<label class="checkbox-group">
<input type="checkbox" name="valid_OCO">
Validar OCO
</label>

<label class="checkbox-group">
<input type="checkbox" name="valid_contratos">
Validar Contratos
</label>

<label class="checkbox-group">
<input type="checkbox" name="conf_replicador">
Confirmar Replicador
</label>

<label class="checkbox-group">
<input type="checkbox" name="reuniao">
Reunião Realizada
</label>

</div>

<br>

<button type="submit" class="btn-primary">
Salvar Checklist
</button>

</form>

</div>

</div>

</body>
</html>