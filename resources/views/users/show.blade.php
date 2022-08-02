@extends('template.users')
@section('title', 'Visualizar Usuário')
@section('body')
<h1>Informações do usuário</h1>

<section class="section gray-bg" id="about">
  <div class="container">
    <div class="row align-items-center flex-row-reverse">
      <div class="col-lg-6">
        <div class="about-text go-to">
          <h3 class="dark-color">{{$user->name}}</h3>
          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning text-white mb-2">EDITAR</a>
          <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger text-white">DELETAR</button>
          </form>
          <div class="row about-list">
            <div class="col-md-6">
              <div class="media">
                <label>#ID</label>
                <p>{{ $user->id }}</p>
              </div>
              <div class="media">
                <label>Aniversário</label>
                <p>{{date('d/m/Y', strtotime($user->birthday))}}</p>
              </div>
              <div class="media">
                <label>E-mail</label>
                <p>{{ $user->email }}</p>
              </div>
              <div class="media">
                <label>Endereço</label>
                <p>{{ $user->address }}</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="media">
                <label>Telefone</label>
                <p>{{ $user->phone }}</p>
              </div>
              <div class="media">
                <label>Ocupação</label>
                <p>{{ $user->occupation }}</p>
              </div>
              <div class="media">
                <label>CPF</label>
                <p>{{ $user->cpf }}</p>
              </div>
              <div class="media">
                <label>Data de cadastro</label>
                <p>{{date('d/m/Y - H:i', strtotime($user->created_at))}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        @if($user->image)
        <div> <img src="{{asset('storage/'.$user->image)}}" alt="" width="250px" height="250"> </div>
        @else
        <div> <img src="{{asset('storage/profile/unisexprofile.jpg')}}" alt="" width="250" height="250"> </div>
        @endif
      </div>
    </div>

  </div>
</section>
@endsection