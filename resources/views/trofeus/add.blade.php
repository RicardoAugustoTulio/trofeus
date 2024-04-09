@extends('layouts/contentNavbarLayout')

@section('title', 'Novo - Troféu')

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Novo Troféu
  </h4>
  <div class="row">
    <div class="col-12">
      @include('trofeus.form', ['route' => '/'])
    </div>
  </div>
@endsection

