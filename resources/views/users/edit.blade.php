@extends('template.users')
@section('title', "Usuário {{$user->name}}")
@section('body')
<h1>Editar usuário {{$user->name}}</h1>

@if($errors->any())

<div class="alert alert-danger" role="alert">
  @foreach($errors->all() as $error)
  {{ $error }} <br>
  @endforeach
</div>

@endif

<form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="Nome" value="{{$user->name}}">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
  </div>
  <div class="mb-3">
    <label for="birthday" class="form-label">Data de Nascimento</label>
    <input type="date" class="form-control" id="birthday" name="birthday" value="{{$user->birthday}}">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Endereço</label>
    <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Telefone</label>
    <input type="tel" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
  </div>

  <div class="mb-3">
    <label for="occupation" class="form-label">Ocupação</label>
    <input type="text" class="form-control" id="occupation" name="occupation" value="{{$user->occupation}}">
  </div>
  <div class="mb-3">
    <label for="cpf" class="form-label">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" value="{{$user->cpf}}">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Senha</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Imagem</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>
  
  <div class="form-check mb-5">
  <input class="form-check-input" type="checkbox" value="1" id="is_admin" name="is_admin">
  <label class="form-check-label" for="is_admin">
    Administrador
  </label>
</div>

  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection