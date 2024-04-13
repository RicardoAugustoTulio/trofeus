<div class="card mb-4 border-top border-secondary">
  <div class="table-responsive">
    <table class="table table-hover card-table text-center">
      <thead>
      <tr>
        <th>Nome</th>
        <th>Sigla</th>
        <th>Descrição</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($campusCollect as $campus)
        <tr>
          <td>{{$campus->nome}}</td>
          <td>{{$campus->sigla}}</td>
          <td>
            <button type="button" onclick="verModal({{$campus->id}})" class="btn btn-outline-info">
              <i class="bx bx-info-circle me-1"></i>Ver
            </button>
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('campus-editar',['campus' => $campus->id])}}">
                  <i class="bx bx-edit-alt me-1"></i>
                  Editar
                </a>
                <form id="form-deletar-{{$campus->id}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{$campus->id}}">
                  <a type="button" class="dropdown-item"
                     onclick="deletarDados('{{route('campus-deletar')}}','form-deletar-{{$campus->id}}','delete')"
                     id="del">
                    <i class="bx bx-trash me-1"></i>Remover
                  </a>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @include('campus.show')
      @endforeach
      </tbody>
    </table>
  </div>
</div>
{{$campusCollect->withQueryString()->links() }}

<div id="teste">
</div>
