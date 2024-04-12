@extends('layouts/contentNavbarLayout')

@section('title', 'Editar - Campus')

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Editar Campus
  </h4>
  <div class="row">
    <div class="col-12">
      @include('campus.form', ['route' => 'campus-atualizar'])
    </div>
  </div>
@endsection

