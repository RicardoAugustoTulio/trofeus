<div class="card border-top border-primary">
  <div class="card-body">
    <form id="form" method="post" action="{{route($route)}}" enctype="multipart/form-data">
      @csrf
      @if(isset($trofeu->id))
        @method('put')
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
          {!!  $errors->has('nome') ? "<span class='invalid text-danger'>". $errors->first('nome') ."</span>" : '' !!}
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="ano">
            Ano
          </label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
            <input type="number" class="form-control" id="ano"
                   name="ano"
                   value="{{ isset($trofeu->ano) ? $trofeu->ano : old('ano') }}" />
          </div>
          {!!  $errors->has('ano') ? "<span class='invalid text-danger'>". $errors->first('ano') ."</span>" : '' !!}
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="colocacao">
            Colocação
          </label>
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class='bx bxs-info-circle'></i></span>
            <input type="number" class="form-control" id="colocacao"
                   name="colocacao"
                   value="{{ isset($trofeu->colocacao) ? $trofeu->colocacao : old('colocacao') }}" />
          </div>
          {!!  $errors->has('colocacao') ? "<span class='invalid text-danger'>". $errors->first('colocacao') ."</span>" : '' !!}
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
          {!!  $errors->has('obs') ? "<span class='invalid text-danger'>". $errors->first('obs') ."</span>" : '' !!}
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
          {!!  $errors->has('campus_id') ? "<span class='invalid text-danger'>". $errors->first('campus_id') ."</span>" : '' !!}
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
          {!!  $errors->has('modalidade_id') ? "<span class='invalid text-danger'>". $errors->first('modalidade_id') ."</span>" : '' !!}
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
          {!!  $errors->has('status_id') ? "<span class='invalid text-danger'>". $errors->first('status_id') ."</span>" : '' !!}
        </div>
        <div class="col-sm-6">
          <label class="col-form-label" for="status">
            Imagem
          </label>
          <div class="mb-3">
            <input class="form-control" name="formFile" type="file" id="formFile">
          </div>
          @if(isset($trofeu) && !empty($trofeu->url_imagem))
            <div class="d-flex align-items-center">
              <img src="{{ asset($trofeu->url_imagem) }}" class="img-md img-thumbnail" width="100px"
                   alt="Imagem do trofeu">
              <button type="button" onclick="deletarDados('{{route('trofeus-deletar-imagem')}}','form','delete')"
                      class="btn btn-danger btn-block ms-2">X
              </button>
            </div>
          @endif
        </div>
        <div class="col-sm-12">
          <label class="col-form-label" for="obs_trofeu">
            História
            <button type="button" class="btn btn-primary btn-sm"
                    onclick="enviarPrompt('{{route('gemini-text')}}','form','post')">
              Gerar com ia <i class="bx bxs-magic-wand"></i>
            </button>
          </label>
          <div class="input-group input-group-merge">
            <textarea name="historia" id="historia" class="form-control"
                      rows="7">{{isset($trofeu) ? $trofeu->historia : old('historia')}}</textarea>
          </div>
        </div>
      </div>
    </form>
    <div class="row mt-4">
      <div class="col">
        <button type="submit" form="form"
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
@push('js')

  @if(session('success'))
    <script>
      Swal.fire({
        title: 'Sucesso!',
        text: '{{session('success')}}',
        icon: 'success',
        confirmButtonText: 'OK!'
      });
    </script>
  @endif

  @if(session('error'))
    <script>
      Swal.fire({
        title: 'Erro!',
        text: '{{session('error')}}',
        icon: 'error',
        confirmButtonText: 'OK!'
      });
    </script>
  @endif
@endpush
