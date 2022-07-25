@extends('template.users')
@section('title', 'Visualizar Usuário')
@section('body')
        <h1>Informações de usuário</h1>
        <table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">ID#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Aniversário</th>
      <th scope="col">Endereço</th>
      <th scope="col">Telefone</th>
      <th scope="col">Ocupação</th>
      <th scope="col">CPF</th>
      <th scope="col">Data de Cadastro</th>
      <th scope="col">Mais</th>
    </tr>
  </thead>
  <tbody class="text-center">
    <tr>
      <th scope="row">{{ $user->id}}</th>
      <td>{{ $user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->birthday}}</td>
      <td>{{$user->address}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->occupation}}</td>
      <td>{{$user->cpf}}</td>
      <td>{{date('d/m/Y - H:i', strtotime($user->created_at))}}</td>
      <td> <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning text-white">Editar</a> <a href="" class="btn btn-danger text-white mt-2"> Excluir</a> </td>
    </tr>

  </tbody>
</table>
@endsection