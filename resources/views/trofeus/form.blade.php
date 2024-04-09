<div class="card border-top border-primary">
  <div class="card-body">
    <form id="form" method="post">
      @csrf
      @if(isset($garantia->id))
        <input type="hidden" name="id" id="id"
               value="{{$garantia->id}}">
      @endif
      <div class="row g-3">
        <div class="col-sm-6">
          <label class="col-form-label" for="titulo_garantia">
            Título
          </label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
            <input type="text" class="form-control" id="titulo_garantia"
                   name="titulo_garantia"
                   value="{{ isset($garantia->titulo_garantia) ? $garantia->titulo_garantia : '' }}"/>
          </div>
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="garantia">
            Garantia
            <a type="button" data-bs-toggle="tooltip" data-bs-offset="0,4"
               data-bs-placement="top" data-bs-html="true" title=""
               data-bs-original-title="<span>Exemplo: 1 ano contra defeitos de fabricação</span>"><i
                class="bx bx-help-circle"></i></a>
          </label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
            <input type="text" class="form-control" id="garantia"
                   name="garantia"
                   value="{{ isset($garantia->garantia) ? $garantia->garantia : '' }}"/>
          </div>
        </div>
        <div class="col-sm-12">
          <label class="col-form-label" for="obs_garantia">
            Observações
          </label>
          <div class="input-group input-group-merge">
            @include('components.ckeditor', ['name' => 'obs_garantia', 'descricao' => isset($garantia) ? $garantia->obs_garantia : ''])
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
                onclick="enviarForm('{{route($route)}}', 'form', '{{$metodo}}')"
                class="btn btn-primary">Salvar
        </button>
      </div>
      <div class="col">
        <div class="col-12 d-flex justify-content-end">
          <a class="btn btn-danger ml-auto" style="color:white;" href="{{route('/')}}">Voltar</a>
        </div>
      </div>
    </div>
  </div>
</div>
