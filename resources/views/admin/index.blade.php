@extends('template.users')
@section('title', 'Dashboard')
@section ('body')

<div class="card" style="width: 50rem;">
  <img src="{{ asset('storage/construcao.png') }}" class="card-img-top" alt="Dash">
  <div class="card-body">
    <h5 class="card-title">Bem vindo ao Dashboard</h5>
    <p class="card-text">#pay.livre #be.academy #laravel</p>
  </div>
</div>

@endsection