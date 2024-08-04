<div class="card border-top border-primary">
  <div class="card-body">
    <form id="form" method="post">
      @csrf
      @if(isset($status->id))
        <input type="hidden" name="id" id="id"
               value="{{$status->id}}">
      @endif
      <div class="row g-3">
        <div class="col-sm-6">
          <label class="col-form-label" for="nome">
            Nome
            <a type="button" data-bs-toggle="tooltip" data-bs-offset="0,4"
               data-bs-placement="top" data-bs-html="true" title=""
               data-bs-original-title="<span>Exemplo: No campus, Fora do campus, Em outro campus, Quebrado, Roubado</span>"><i
                class="bx bx-help-circle"></i></a>
          </label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
            <input type="text" class="form-control" id="nome"
                   name="nome"
                   value="{{ isset($status->nome) ? $status->nome : '' }}"/>
          </div>
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="status">
            Cor
          </label>
          <div class="input-group input-group-merge">
            <input type="color" class="form-control" id="cor"
                   name="cor"
                   value="{{ isset($status->cor) ? $status->cor : '' }}"/>
          </div>
        </div>
      </div>
    </form>
    <div class="row mt-4">
      <div class="col">
        @if (isset($status->id))
          @php $metodo = 'PUT' @endphp
        @else
          @php $metodo = 'POST' @endphp
        @endif
        <button type="button" id="submit"
                onclick="enviarDados('{{route($route)}}', 'form', '{{$metodo}}')"
                class="btn btn-primary">Salvar
        </button>
      </div>
      <div class="col">
        <div class="col-12 d-flex justify-content-end">
          <a class="btn btn-danger ml-auto text-white" href="{{route('status-listagem')}}">Voltar</a>
        </div>
      </div>
    </div>
  </div>
</div>
@push('js')
  <script>
    document.getElementById('form').addEventListener('keypress', function (e) {
      if (e.key === 'Enter') {
        e.preventDefault(); // Previne o comportamento padrão de Enter
        $('#submit').click()// Envia o formulário
      }
    });
  </script>
@endpush
