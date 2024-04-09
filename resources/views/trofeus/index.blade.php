@extends('layouts/contentNavbarLayout')

@section('title', 'Troféus - Gerenciar Troféus')

@section('content')
  <h4 class="fw-bold py-3 mb-4">
    Gerenciar Troféus
  </h4>
  <div class="row">
    <div class="col-12">
      @include('trofeus.busca')
    </div>
    <div class="col-12">
      @include('trofeus.listagem', ['trofeus' => collect()])
    </div>
  </div>
@endsection
