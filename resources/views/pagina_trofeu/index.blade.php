@extends('layouts/contentNavbarLayout')

@section('title', 'Detalhes do Troféu')

@section('content')
  <section class="bg-white rounded shadows-sm py-5">
    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div class="border border-warning rounded-4 mb-3 d-flex justify-content-center">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                 src="https://acdn.mitiendanube.com/stores/003/013/677/products/trofeu_mundial_de_clubes_-30_cm_de_altura-_-31-b7b4ad9b40c987d81716839184714608-1024-1024.jpg" />
          </div>
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark mb-4">
              {{$trofeu->nome}}
            </h4>
            {{--                        <span class="category-name">{{$trofeu->modalidade ? $trofeu->modalidade->nome : 'Nome da Modalidade'}}</span>--}}
            <span
              class="category-name">{{$trofeu->modalidade?->nome}}</span>
            <div class="d-flex flex-row my-3">
              <div class="text-warning mb-1 me-2">
                <span class="badge bg-label-primary ms-1">
                {{$trofeu->colocacao}}º LUGAR
                </span>
                @if($trofeu->colocacao == 1)
                  <span class="badge bg-label-warning ms-1">
                CAMPEÃO
              </span>
                @endif
                <span class="badge bg-label-info ms-1">
                {{$trofeu->ano}}
              </span>
              </div>
            </div>
            <div class="row">
              {{--              TODO da pra fazer um esquema de atributos dps, salvar em json sla, ou uma tabela add de atributos trofeu--}}
              <dt class="col-3">Ano:</dt>
              <dd class="col-9">{{ $trofeu->ano }}</dd>

              <dt class="col-3">Colocação:</dt>
              <dd class="col-9">{{ $trofeu->colocacao }}</dd>

              <dt class="col-3">Campus</dt>
              <dd class="col-9">{{ $trofeu->campus?->sigla . ' - ' . $trofeu->campus?->nome }}</dd>

              <dt class="col-3">Modalidade</dt>
              <dd class="col-9">{{ $trofeu->modalidade?->nome }}</dd>
            </div>

            <hr />
            <p>
              {{$trofeu->obs}}
            </p>
            <br />
            <a href="#" class="btn btn-outline-info shadow-0" onclick="tweetar({{json_encode($trofeu)}})">Compartilhar<i
                class='bx bxl-twitter ms-2'></i></a>
          </div>
        </main>
      </div>
    </div>
  </section>
  <!-- content -->

  <section class="bg-light border-top py-4">
    <div class="container">
      <div class="row gx-4">
        <div class="col-lg-8 mb-4">
          <div class="border-top border-info rounded-2 px-3 py-2 bg-white">
            <h1 style="text-align: center;" class="mt-4">História</h1>
            <!-- Pills content -->
            <div class="tab-content" id="ex1-content">
              <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel"
                   aria-labelledby="ex1-tab-1">
                <p>
                  {!! $trofeu->historia  !!}
                </p>
                <div class="row mb-2">
                  <div class="col-12 col-md-6">
                  </div>
                </div>
              </div>
            </div>
            <!-- Pills content -->
          </div>
        </div>
        <div class="col-lg-4">
          <div class="px-0 border border-secondary  rounded-2 shadow-0">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-3">Troféus Relacionados</h5>
                @foreach($trofeu->relacionados as $relacionado)
                  @if($loop->first)
                    <br />
                  @endif
                  <div class="d-flex mb-3">
                    <a href="{{route('trofeu-detalhe',$relacionado->id)}}" class="me-3" target="_blank">
                      <img
                        src="https://acdn.mitiendanube.com/stores/003/013/677/products/trofeu_mundial_de_clubes_-30_cm_de_altura-_-31-b7b4ad9b40c987d81716839184714608-1024-1024.jpg"
                        style="min-width: 96px; height: 96px;"
                        class="img-md img-thumbnail" />
                    </a>
                    <div class="info">
                      <a href="{{route('trofeu-detalhe',$relacionado->id)}}" class="nav-link mb-1" target="_blank">
                        {{$relacionado->nome}} <br />
                        {{$relacionado->ano}}
                      </a>
                      <strong class="text-dark">{{$relacionado->campus?->nome}}</strong>
                    </div>
                  </div>
                  @if(!$loop->last)
                    <hr />
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
<style>
  .category-name {
    background: linear-gradient(to right, #FFD700, #008000);
    color: #fff; /* Texto em branco para contrastar com o fundo */
    padding: 10px 20px;
    border-radius: 5px; /* Borda arredondada */
  }

</style>
