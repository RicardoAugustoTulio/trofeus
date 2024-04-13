@extends('layouts/contentNavbarLayout')

@section('title', 'Status - Gerenciar Campus')

@section('content')
  <h4 class="fw-bold py-3 mb-4">
    Gerenciar Status Disponíveis
  </h4>
  <div class="row">
    <div class="col-12">
      @include('status_trofeu.busca')
    </div>
    <div class="col-12">
      @include('status_trofeu.listagem', ['statusCollect' => $status])
    </div>
  </div>
@endsection
