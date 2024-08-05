@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($trofeus as $trofeu)
                <div class="col-md-4">
                    <div class="card mb-4 card-trofeu">
                      <img src="{{ asset($trofeu->url_imagem) }}" style=" max-height: 428px" width="100%" height="100%" class="card-img-top" alt="{{ $trofeu->nome }}">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{ $trofeu->nome }}</h5>
                            <a href="{{route('trofeu-detalhe',$trofeu->id)}}" class="btn btn-primary card-btn">
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
