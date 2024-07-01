@extends('layouts/contentNavbarLayout')

@section('title', 'Nova - Modalidade')

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Nova Modalidade
  </h4>
  <div class="row">
    <div class="col-12">
      @include('modalidades.form', ['route' => 'modalidades-salvar'])
  </div>
@endsection

