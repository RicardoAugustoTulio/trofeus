@extends('layouts/contentNavbarLayout')

@section('title', 'Novo - Troféu')

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Novo Troféu
  </h4>
  <div class="row">
    <div class="col-12">
      <div class="card border-top border-primary">
        <div class="card-body">
          <form id="form" method="post">
            @csrf
            @if(isset($exemplo->id))
              <input type="hidden" name="id" id="id"
                     value="{{$exemplo->id}}">
            @endif
            <div class="row g-3">
              <div class="col-sm-6">
                <label class="col-form-label" for="exemplo1">
                  exemplo1
                </label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
                  <input type="text" class="form-control" id="exemplo1"
                         name="exemplo1"
                         value="{{ isset($variavel->exemplo1) ? $variavel->exemplo1 : '' }}" />
                </div>
              </div>
              <div class="col-sm-6">
                <label class="col-form-label" for="exemplo2">
                  exemplo2
                  <a type="button" data-bs-toggle="tooltip" data-bs-offset="0,4"
                     data-bs-placement="top" data-bs-html="true" title=""
                     data-bs-original-title="<span>Exemplo: 1 ano contra defeitos de fabricação</span>"><i
                      class="bx bx-help-circle"></i></a>
                </label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
                  <input type="text" class="form-control" id="exemplo2"
                         name="exemplo2"
                         value="{{ isset($variavel->exemplo2) ? $variavel->exemplo2 : '' }}" />
                </div>
              </div>
            </div>
          </form>
          <div class="row mt-4">
            <div class="col">
              @if (isset($garantia->id))
                @php $metodo = 'PUT' @endphp
              @else
                @php $metodo = 'POST' @endphp
              @endif

              <button type="button"
                      onclick="enviarDados('{{route('salvar-exemplo')}}', 'form', '{{$metodo}}')"
                      class="btn btn-primary">Salvar
              </button>
            </div>
            <div class="col">
              <div class="col-12 d-flex justify-content-end">
                <a class="btn btn-danger ml-auto" style="color:white;" href="{{route('home')}}">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

