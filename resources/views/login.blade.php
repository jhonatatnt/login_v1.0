@extends('layouts.app')

@section('content')
  <div class="login-container">

    @if(session('status'))
      <span class="txt_error">
        {{ session('status') }}
      </span>
    @endif


    <h2>Entrar na Conta</h2>
    <form action="{{route('auth')}}" method="POST">

      @csrf
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required autocomplete="email" value="{{ old('email') }}">
      </div>

      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" required autocomplete="current-password" value="{{ old('email') }}">
      </div>

      <button type="submit" class="btn-login">Entrar</button>

    </form>
    <div class="login-footer">
      <p>N«ªo tem uma conta? <a href="{{ route('create-account') }}">Criar conta</a></p>
      <p><a href="{{route('forgot-password')}}">Esqueceu a senha?</a></p>
    </div>
  </div>
@endsection


