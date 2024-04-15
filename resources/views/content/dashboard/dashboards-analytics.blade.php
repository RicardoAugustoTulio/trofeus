@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($trofeus as $trofeu)
                <div class="col-md-4">
                    <div class="card mb-4 card-trofeu">
                        <img
                                src="https://acdn.mitiendanube.com/stores/003/013/677/products/trofeu_mundial_de_clubes_-30_cm_de_altura-_-31-b7b4ad9b40c987d81716839184714608-1024-1024.jpg"
                                class="card-img-top" alt="{{ $trofeu->nome }}">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{ $trofeu->nome }}</h5>
                            <p class="card-trofeu-text card-text">{{ $trofeu->obs }}</p>
                            <a href="" class="btn btn-primary card-btn">
                                <span class="align-middle">Detalhes</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{$trofeus->links()}}
@endsection

<style>
  .card-trofeu:hover {
    transform: scale(1.05);
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    border-radius: 10px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
  }

  .card-trofeu-text {
    display: -webkit-box;
    -webkit-line-break: normal;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
  }

</style>
