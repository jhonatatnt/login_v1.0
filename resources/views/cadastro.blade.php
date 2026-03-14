@extends('layouts.app')

@section('title', 'Cadastro de Usuário')

@section('content')
  <div class="register-container">

    @if(session('status'))
      <span class="txt_sucess">
        {{ session('status') }}
      </span>
    @endif

    <h2 style="margin-bottom:21px;">Criar conta</h2>

    <form action="{{ route('insert-account') }}" method="POST">

      @csrf

      <div class="form-group">
        <label for="name">Nome</label>
        @error('name')
          <p class="field_error"> {{ $message }}</p>
        @enderror
        <input type="text" id="name" name="name" value="{{old('name')}}" class="@error('name') field_error @enderror">
        
      </div>

      <div class="form-group">
          <label for="lastname">Sobrenome</label>
        
          @error('lastname')
            <p class="field_error">{{ $message }}</p>
          @enderror
        
          <input 
              type="text" 
              id="lastname" 
              name="lastname" 
              value="{{ old('lastname') }}" 
              class="@error('lastname') field_error @enderror">
        </div>

      <div class="form-group">
        <label for="password">Senha</label>
        @error('password')
          <p class="field_error"> {{ $message }}</p>
        @enderror
        <input type="password" id="password" name="password" value="{{old('password')}}" class="@error('password') field_error @enderror">
        
      </div>

      <!-- <div class="form-group">
        <label for="verif_password">Confirmar senha</label>
        <input type="password" id="verif_password" name="verif_password">
      </div> -->

      <div class="form-group">
        <label for="email">E-mail</label>
        @error('email')
        <p class="field_error"> {{ $message }}</p>
        @enderror
        <input type="text" id="email" name="email" value="{{old('email')}}" class="@error('email') field_error @enderror">
      </div>
      

      <button type="submit" class="btn-login">Cadastre-se</button>

      

    </form>
    <div class="login-footer">
      <p>Já tem uma conta? <a href="{{route('login')}}">Entrar</a></p>
    </div>
  </div>
@endsection