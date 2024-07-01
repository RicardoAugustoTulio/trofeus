<div class="card border-top border-primary">
  <div class="card-body">
    <form id="form" method="post">
      @csrf
      @if(isset($trofeu->id))
        <input type="hidden" name="id" id="id"
               value="{{$trofeu->id}}">
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
                   value="{{ isset($trofeu->nome) ? $trofeu->nome : old('nome') }}" />
          </div>
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="ano">
            Ano
            {{--            <a type="button" data-bs-toggle="tooltip" data-bs-offset="0,4"--}}
            {{--               data-bs-placement="top" data-bs-html="true" title=""--}}
            {{--               data-bs-original-title="<span>Exemplo:</span>"><i--}}
            {{--                class="bx bx-help-circle"></i></a>--}}
          </label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
            <input type="number" class="form-control" id="ano"
                   name="ano"
                   value="{{ isset($trofeu->ano) ? $trofeu->ano : old('ano') }}" />
          </div>
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="colocacao">
            Colocação
            {{--            <a type="button" data-bs-toggle="tooltip" data-bs-offset="0,4"--}}
            {{--               data-bs-placement="top" data-bs-html="true" title=""--}}
            {{--               data-bs-original-title="<span>Exemplo:</span>"><i--}}
            {{--                class="bx bx-help-circle"></i></a>--}}
          </label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
            <input type="number" class="form-control" id="colocacao"
                   name="colocacao"
                   value="{{ isset($trofeu->colocacao) ? $trofeu->colocacao : old('colocacao') }}" />
          </div>
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="obs">
            Subtítulo/Observação
          </label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
            <input type="text" class="form-control" id="obs"
                   name="obs"
                   value="{{ isset($trofeu->obs) ? $trofeu->obs : old('obs') }}" />
          </div>
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="campus_id">
            Campus
          </label>
          <div class="input-group input-group-merge">

            <select name="campus_id" class="form-control">
              <option value="">Selecione</option>
              @foreach($campus as $campi)
                <option {{isset($trofeu) && $trofeu->campus_id == $campi->id ? 'selected' : ''}}
                        {{old('campus_id') == $campi->id ? 'selected' : ''}}
                        value="{{$campi->id}}">{{$campi->sigla .'-'. $campi->nome}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="modalidade_id">
            Modalidade
          </label>
          <div class="input-group input-group-merge">

            <select name="modalidade_id" class="form-control">
              <option value="">Selecione</option>
              @foreach($modalidades as $modalidade)
                <option
                  {{old('modalidade_id') == $modalidade->id ? 'selected' : ''}}
                  {{isset($trofeu) && $trofeu->modalidade_id == $modalidade->id ? 'selected' : ''}}
                  value="{{$modalidade->id}}">{{$modalidade->nome}}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="status">
            Status
          </label>
          <div class="input-group input-group-merge">

            <select name="status_id" class="form-control">
              <option value="">Selecione</option>
              @foreach($statusTrofeu as $status)
                <option
                  {{old('status_id') == $status->id ? 'selected' : ''}}
                  {{isset($trofeu) && $trofeu->status_id == $status->id ? 'selected' : ''}}
                  value="{{$status->id}}">{{$status->nome}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-12">
          <label class="col-form-label" for="obs_trofeu">
            História
          </label>
          <div class="input-group input-group-merge">
            <textarea name="historia" class="form-control"
                      rows="7">{{isset($trofeu) ? $trofeu->historia : old('historia')}}</textarea>
            {{--            @include('components.ckeditor', ['name' => 'obs_trofeu', 'descricao' => isset($trofeu) ? $trofeu->obs_trofeu : ''])--}}
          </div>
        </div>
      </div>
    </form>
    <div class="row mt-4">
      <div class="col">
        @if (isset($trofeu->id))
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
          <a class="btn btn-danger ml-auto" style="color:white;" href="{{route('trofeus-listagem')}}">Voltar</a>
        </div>
      </div>
    </div>
  </div>
</div>
