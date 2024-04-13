<div class="col-12">
  <div class="card mb-4 border-top border-primary">
    <div class="card-body">
      <form method="get"
            action="">
        <div class="row">
          <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
            <label class="form-label" for="nome">Nome</label>
            <div class="input-group input-group-merge">
              <input type="text" id="nome" name="nome" class="form-control" value="{{request()->nome}}">
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
      <div class="col-12 d-flex justify-content-end">
        <a class="btn btn-primary ml-auto mt-2 text-white" href="{{route('status-novo')}}">Adicionar
          Status</a>
      </div>
    </div>
  </div>
</div>
