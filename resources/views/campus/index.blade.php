@extends('layouts/contentNavbarLayout')

@section('title', 'Campus - Gerenciar Campus')

@section('content')
  <h4 class="fw-bold py-3 mb-4">
    Gerenciar Campus
  </h4>
  <div class="row">
    <div class="col-12">
      @include('campus.busca')
    </div>
    <div class="col-12">
      @include('campus.listagem', ['campusCollect' => $campus])
    </div>
  </div>
@endsection
