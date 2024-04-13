@extends('layouts/contentNavbarLayout')

@section('title', 'Novo - Status')

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Novo Status
  </h4>
  <div class="row">
    <div class="col-12">
      @include('status_trofeu.form', ['route' => 'status-salvar'])
    </div>
  </div>
@endsection

