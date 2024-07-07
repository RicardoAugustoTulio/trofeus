@extends('layouts/contentNavbarLayout')

@section('title', 'Editar - Troféu')

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Editar Troféu
  </h4>
  <div class="row">
    <div class="col-12">
      @include('trofeus.form', ['route' => 'trofeus-atualizar'])
    </div>
  </div>
@endsection

