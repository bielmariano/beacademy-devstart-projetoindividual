@extends('template.users')
@section('title', 'Visualizar Usuário')
@section('body')
        <h1>Listagem de Usuários</h1>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Data de Cadastro</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{ $user->id}}</th>
      <td>{{ $user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{date('d/m/Y - H:i', strtotime($user->created_at))}}</td>
    </tr>

  </tbody>
</table>
@endsection