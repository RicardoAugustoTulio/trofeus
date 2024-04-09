@extends('layouts/contentNavbarLayout')

@section('title', 'Editar - Garantias')

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Editar Garantia
  </h4>
  <div class="row">
    <div class="col-12">
      @include('trofeus.form', ['route' => '/'])
    </div>
  </div>
@endsection

