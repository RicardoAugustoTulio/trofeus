@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('content')
  <div class="container">
    <div class="row">
      <h4>Exibindo resultados da busca: <b>{{request('q')}}</b></h4>
      <div class="col-12">
        <div class="card mb-4 border-top border-primary">
          <div class="card-body">
            <form>
              <div class="row">
                <input type="hidden" id="nome" name="q" class="form-control" value="{{request('q')}}">
                <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
                  <label class="form-label" for="campus">Campus</label>
                  <div class="input-group">
                    <select name="campus" class="form-control form-select">
                      <option value="">Selecione</option>
                      @foreach($campus as $campi)
                        <option
                          {{request('campus') == $campi->id ? 'selected' : ''}} value="{{$campi->id}}">{{ $campi->sigla . '-' . $campi->nome }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
                  <label class="form-label" for="modalidade">Modalidade</label>
                  <div class="input-group">
                    <select name="modalidade" class="form-control form-select">
                      <option value="">Selecione</option>
                      @foreach($modalidades as $modalidade)
                        <option
                          {{request('modalidade') == $modalidade->id ? 'selected' : ''}}value="{{$modalidade->id}}">{{$modalidade->nome}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
                  <label class="form-label" for="ano">Ano</label>
                  <div class="input-group input-group-merge">
                    <input type="number" id="ano" name="ano" class="form-control" value="{{request('ano')}}">
                  </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
                  <label class="form-label" for="colocacao">Colocação</label>
                  <div class="input-group input-group-merge">
                    <input type="number" id="colocacao" name="colocacao" class="form-control"
                           value="{{request('colocacao')}}">
                  </div>
                </div>
                <div class="col-xl-2 col-md-6 col-sm-12 mb-4">
                  <label class="form-label invisible">Hidden Label</label>
                  <div>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      @foreach ($trofeus as $trofeu)
        <div class="col-md-4">
          <div class="card mb-4 card-trofeu">
            <img src="{{ asset($trofeu->url_imagem) }}" width="285px" height="285px" class="card-img-top"
                 alt="{{ $trofeu->nome }}">
            <div class="card-body d-flex flex-column justify-content-between">
              <h5 class="card-title">{{ $trofeu->nome }}</h5>
              <p class="card-trofeu-text card-text">{{ $trofeu->obs }}</p>
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
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
