@extends('layouts/contentNavbarLayout')

@section('title', 'Editar - Status')

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Editar Status
  </h4>
  <div class="row">
    <div class="col-12">
      @include('status_trofeu.form', ['route' => 'status-atualizar'])
    </div>
  </div>
@endsection

