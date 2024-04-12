<div class="card border-top border-primary">
  <div class="card-body">
    <form id="form" method="post">
      @csrf
      @if(isset($campus->id))
        <input type="hidden" name="id" id="id"
               value="{{$campus->id}}">
      @endif
      <div class="row g-3">
        <div class="col-sm-6">
          <label class="col-form-label" for="nome">
            Nome
            <a type="button" data-bs-toggle="tooltip" data-bs-offset="0,4"
               data-bs-placement="top" data-bs-html="true" title=""
               data-bs-original-title="<span>Exemplo: Campus Curitiba</span>"><i
                class="bx bx-help-circle"></i></a>
          </label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
            <input type="text" class="form-control" id="nome"
                   name="nome"
                   value="{{ isset($campus->nome) ? $campus->nome : '' }}" />
          </div>
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="campus">
            Instituto
            <a type="button" data-bs-toggle="tooltip" data-bs-offset="0,4"
               data-bs-placement="top" data-bs-html="true" title=""
               data-bs-original-title="<span>Exemplo: IFPR</span>"><i
                class="bx bx-help-circle"></i></a>
          </label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
            <input type="text" class="form-control" id="sigla"
                   name="sigla"
                   value="{{ isset($campus->sigla) ? $campus->sigla : '' }}" />
          </div>
        </div>
        <div class="col-sm-12">
          <label class="col-form-label" for="descricao">
            Descrição
          </label>
          <div class="input-group input-group-merge">
            <textarea class="form-control" name="descricao" rows="5" placeholder="Descrição do campus">{{isset($campus->descricao) ? $campus->descricao : ''}}</textarea>
          </div>
        </div>
      </div>
    </form>
    <div class="row mt-4">
      <div class="col">
        @if (isset($campus->id))
          @php $metodo = 'PUT' @endphp
        @else
          @php $metodo = 'POST' @endphp
        @endif
        <button type="button"
                onclick="enviarDados('{{route($route)}}', 'form', '{{$metodo}}')"
                class="btn btn-primary">Salvar
        </button>
      </div>
      <div class="col">
        <div class="col-12 d-flex justify-content-end">
          <a class="btn btn-danger ml-auto text-white" href="{{route('campus-listagem')}}">Voltar</a>
        </div>
      </div>
    </div>
  </div>
</div>
