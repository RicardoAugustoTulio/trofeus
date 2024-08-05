@extends('layouts/contentNavbarLayout')

@section('title', 'Editar - Perfil')

@section('content')

  <h4 class="fw-bold py-3 mb-4">
    Editar Perfil - {{$user->name}}
  </h4>
  <div class="row">
    <div class="col-12">
      <div class="card border-top border-primary mb-4">
        <div class="card-body">
          <form id="form" method="post">
            @csrf
            @if(isset($user->id))
              <input type="hidden" name="id" id="id"
                     value="{{$user->id}}">
            @endif
            <div class="row g-3">
              <div class="col-sm-6">
                <label class="col-form-label" for="nome">
                  Nome
                </label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
                  <input type="text" class="form-control" id="name"
                         name="name"
                         value="{{ isset($user->name) ? $user->name : '' }}" />
                </div>
              </div>
            </div>
          </form>
          <div class="row mt-4">
            <div class="col">
              @if (isset($user->id))
                @php $metodo = 'PUT' @endphp
              @else
                @php $metodo = 'POST' @endphp
              @endif
              <button type="button" id="submit"
                      onclick="enviarDados('{{route('salvar-perfil')}}', 'form', 'POST')"
                      class="btn btn-primary">Salvar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
      <a class="btn btn-danger ml-auto text-white" href="/">Voltar</a>
    </div>
    @endsection
    @push('js')
      <script>
        document.getElementById('form').addEventListener('keypress', function(e) {
          if (e.key === 'Enter') {
            e.preventDefault(); // Previne o comportamento padrão de Enter
            $('#submit').click();// Envia o formulário
          }
        });
      </script>
  @endpush
