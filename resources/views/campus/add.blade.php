@extends('layouts/contentNavbarLayout')

@section('title', 'Novo - Campus')

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Novo Campus
  </h4>
  <div class="row">
    <div class="col-12">
      @include('campus.form', ['route' => 'campus-salvar'])
    </div>
  </div>
@endsection

