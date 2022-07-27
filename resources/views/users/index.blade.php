@extends('template.users')
@section('title', 'Lista de Usuários')
@section('body')
        <h1>Listagem de Usuários</h1>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Imagem</th>
      <th scope="col">ID#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Data de Cadastro</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      @if($user->image)
      <th> <img src="{{asset('storage/'.$user->image)}}" alt="" width="50px" height="50px"> </th>
      @else
      <th> <img src="{{asset('storage/profile/unisexprofile.jpg')}}" alt="" width="50px" height="50px"> </th>
      @endif
      <th scope="row">{{ $user->id}}</th>
      <td>{{ $user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{date('d/m/Y - H:i', strtotime($user->created_at))}}</td>
      <td> <a href="{{route('users.show', $user->id)}}" class="btn btn-info text-white">Ver mais</a></td>
    </tr>
    @endforeach

  </tbody>
</table>

<div class="justify-content-center pagination">
  {{$users->links('pagination::bootstrap-4')}}
</div>

@endsection