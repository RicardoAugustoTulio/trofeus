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
                  <input type="text" class="form-control" id="nome"
                         name="nome"
                         value="{{ isset($user->nome) ? $user->nome : '' }}"/>
                </div>
              </div>
              <div class="col-sm-6">
                <label class="col-form-label" for="email">
                  E-mail(Login)
                </label>
                <div class="input-group input-group-merge">
                  <input type="email" class="form-control" id="email"
                         name="email"
                         value="{{ isset($user->email) ? $user->email : '' }}"/>
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
      <h4 class="fw-bold py-3 mb-4">
        Alterar Senha
      </h4>
      <div class="card border-top border-primary">
        <div class="card-body">
          <form id="formSenha" method="post">
            @csrf
            <div class="row g-3">
              <div class="col-sm-12">
                <label class="col-form-label" for="senhaAtual">
                  Senha Atual
                </label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
                  <input type="password" class="form-control" id="senhaAtual" name="senhaAtual"/>
                </div>
              </div>
              <div class="col-sm-12">
                <label class="col-form-label" for="novaSenha">
                  Nova senha
                </label>
                <div class="input-group input-group-merge">
                  <input type="password" class="form-control" id="novaSenha" name="novaSenha"/>
                </div>
              </div>
              <div class="col-sm-12">
                <label class="col-form-label" for="confirmarNovaSenha">
                  Confirmar Nova senha
                </label>
                <div class="input-group input-group-merge">
                  <input type="password" class="form-control" id="confirmarNovaSenha" name="confirmarNovaSenha"/>
                </div>
              </div>
            </div>
          </form>
          <div class="row mt-4">
            <div class="col">
              <button type="button" id="submit" onclick="enviarDados('{{route('salvar-senha')}}', 'formSenha', 'PUT')"
                      class="btn btn-primary" disabled>Salvar
              </button>
            </div>
          </div>
          <div id="error-message" class="text-danger mt-3"></div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="col-12 d-flex justify-content-end">
        <a class="btn btn-danger ml-auto text-white" href="/">Voltar</a>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function () {
      function validateForm() {
        var senhaAtual = $('#senhaAtual').val();
        var novaSenha = $('#novaSenha').val();
        var confirmarNovaSenha = $('#confirmarNovaSenha').val();
        var errorMessage = '';

        if (senhaAtual === '' || novaSenha === '' || confirmarNovaSenha === '') {
          errorMessage = 'Todos os campos devem estar preenchidos.';
        } else if (novaSenha !== confirmarNovaSenha) {
          errorMessage = 'As novas senhas não coincidem.';
        }

        if (errorMessage === '') {
          $('#submit').removeClass('disabled').prop('disabled', false);
          $('#error-message').text('');
        } else {
          $('#submit').addClass('disabled').prop('disabled', true);
          $('#error-message').text(errorMessage);
        }
      }

      $('#senhaAtual, #novaSenha, #confirmarNovaSenha').on('input', function () {
        validateForm();
      });
    });
  </script>
@endpush
