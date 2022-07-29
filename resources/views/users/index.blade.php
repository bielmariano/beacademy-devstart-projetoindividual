@extends('template.users')
@section('title', 'Lista de Usuários')
@section('body')
<h1>Listagem de Usuários</h1>

@if(session()->has('create'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Parabêns!</strong> {{ session()->get('create') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('edit'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Parabêns!</strong> {{ session()->get('edit') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->has('destroy'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Atenção!</strong> {{ session()->get('destroy') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container">
  <div class="row">
    <div class="col-sm mt-2 mb-5">
      <a href="{{ route('users.create') }}" class="btn btn-outline-dark">Novo Usuário</a>
    </div>
    <div class="col-sm mt-2 mb-5">
      <form action="{{ route('users.index') }}" method="GET">
        <div class="input-group">
          <input type="search" class="form-control rounded" name="search" />
          <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
        </div>
      </form>
    </div>

  </div>
</div>


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