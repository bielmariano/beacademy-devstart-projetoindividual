@extends('template.users')
@section('title', 'Registrar')
@section('body')
<h1>Registrar-Se</h1>
<div class="justify-content-center">
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="name">Nome</label>
            <input type="text" id="name" class="form-control" name="name" />
        </div>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" class="form-control" name="email" />
        </div>
        <!-- Birthday input -->
        <div class="mb-3">
            <label for="birthday" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="birthday" name="birthday">
        </div>
        <!-- Address input -->
        <div class="mb-3">
            <label for="address" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <!-- Phone input -->
        <div class="mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div>
        <!-- Occupation input -->
        <div class="mb-3">
            <label for="occupation" class="form-label">Ocupação</label>
            <input type="text" class="form-control" id="occupation" name="occupation">
        </div>
        <!-- CPF input -->
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf">
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="password">Senha</label>
            <input type="password" id="password" class="form-control" name="password" />
        </div>
        <!-- Confirm Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="password_confirmation">Confirme a Senha</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required />
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Registrar</button>
    </form>
</div>

@endsection