<div class="card mb-4 border-top border-secondary">
  <div class="table-responsive">
    <table class="table table-hover card-table text-center">
      <thead>
      <tr>
        <th>Nome</th>
        <th>Cor</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($statusCollect as $status)
          <tr>
              <td>{{$status->nome}}</td>
            <td>
              <span style="background-color:{{$status->cor}}; width: 20px; height: 20px; display: inline-block; border-radius: 50%;"></span>
            </td>
              <td>
                  <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{route('status-editar',['status' => $status->id])}}">
                              <i class="bx bx-edit-alt me-1"></i>
                              Editar
                          </a>
                          <form id="form-deletar-{{$status->id}}" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{$status->id}}">
                              <a type="button" class="dropdown-item"
                                 onclick="deletarDados('{{route('status-deletar')}}','form-deletar-{{$status->id}}','delete')"
                                 id="del">
                                  <i class="bx bx-trash me-1"></i>Remover
                              </a>
                          </form>
                      </div>
                  </div>
              </td>
          </tr>
          @include('status_trofeu.show')
      @endforeach
      </tbody>
    </table>
  </div>
</div>
{{$statusCollect->withQueryString()->links() }}
