<div class="card mb-4 border-top border-secondary">
  <div class="table-responsive">
    <table class="table table-hover card-table text-center">
      <thead>
      <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($modalidades as $modalidade)
        <tr>
          <td>{{$modalidade->nome}}</td>
          <td>
            <button type="button" onclick="verModal({{$modalidade->id}})" class="btn btn-outline-info">
              <i class="bx bx-info-circle me-1"></i>Ver
            </button>
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('modalidades-editar',['modalidade' => $modalidade->id])}}">
                  <i class="bx bx-edit-alt me-1"></i>
                  Editar
                </a>
                <form id="form-deletar-{{$modalidade->id}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{$modalidade->id}}">
                  <a type="button" class="dropdown-item"
                     onclick="deletarDados('{{route('modalidades-deletar')}}','form-deletar-{{$modalidade->id}}','delete')"
                     id="del">
                    <i class="bx bx-trash me-1"></i>Remover
                  </a>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @include('modalidades.show')
      @endforeach
      </tbody>
    </table>
  </div>
</div>
{{$modalidades->withQueryString()->links() }}
