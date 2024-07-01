@extends('layouts/contentNavbarLayout')

@section('title', 'Modalidades - Gerenciar Modalidades')

@section('content')
  <h4 class="fw-bold py-3 mb-4">
    Gerenciar Modalidades
  </h4>
  <div class="row">
    <div class="col-12">
      @include('modalidades.busca')
    </div>
    <div class="col-12">
      @include('modalidades.listagem', ['modalidades' => $modalidades])
    </div>
  </div>
@endsection
