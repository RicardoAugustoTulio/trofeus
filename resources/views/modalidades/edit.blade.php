@extends('layouts/contentNavbarLayout')

@section('title', 'Editar - Modalidade')

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Editar Modalidade
  </h4>
  <div class="row">
    <div class="col-12">
      @include('modalidades.form', ['route' => 'modalidades-atualizar'])
    </div>
  </div>
@endsection

