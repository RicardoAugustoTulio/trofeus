<div class="col-12">
  <div class="card mb-4 border-top border-primary">
    <div class="card-body">
      <form method="get" action="" id="form">
        <div class="row">
          <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
            <label class="form-label" for="nome">Nome</label>
            <div class="input-group input-group-merge">
              <input type="text" id="nome" name="nome" class="form-control" value="{{ request('nome') }}">
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
            <label class="form-label" for="campus">Campus</label>
            <div class="input-group">
              <select name="campus" class="form-control form-select">
                <option value="">Selecione</option>
                @foreach($campus as $campi)
                  <option {{ request('campus') == $campi->id ? 'selected' : '' }} value="{{ $campi->id }}">
                    {{ $campi->sigla . '-' . $campi->nome }}
                  </option>
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
                  <option {{ request('modalidade') == $modalidade->id ? 'selected' : '' }} value="{{ $modalidade->id }}">
                    {{ $modalidade->nome }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
            <label class="form-label" for="ano">Ano</label>
            <div class="input-group input-group-merge">
              <input type="number" id="ano" name="ano" class="form-control" value="{{ request('ano') }}">
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
            <label class="form-label" for="colocacao">Colocação</label>
            <div class="input-group input-group-merge">
              <input type="number" id="colocacao" name="colocacao" class="form-control"
                     value="{{ request('colocacao') }}">
            </div>
          </div>
          <div class="col-xl-2 col-md-6 col-sm-12 mb-4">
            <label class="form-label invisible">Hidden Label</label>
            <div>
              <button type="submit" class="btn btn-primary">Localizar</button>
            </div>
          </div>
        </div>
      </form>
      <div class="row mt-2 justify-content-end">
        <div class="col-md-auto mb-2 me-2">
          <a href="{{route('trofeus-exportar')}}" class="btn btn-outline-info">Exportar</a>
        </div>
        <div class="col-md-auto mb-2">
          <a href="{{ route('trofeus-novo') }}" class="btn btn-primary text-white">Adicionar Troféu</a>
        </div>
      </div>
    </div>
  </div>
</div>
