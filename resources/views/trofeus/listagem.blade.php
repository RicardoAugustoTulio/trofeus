<div class="card mb-4 border-top border-secondary">
  <div class="table-responsive">
    <table class="table table-hover card-table text-center">
      <thead>
      <tr>
        <th>Imagem</th>
        <th>Nome</th>
        <th>Campus</th>
        <th>Ano</th>
        <th>Colocação</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($trofeus as $trofeu)
        <tr>
          <td>
            <img src="https://premiartrofeus.com.br/wp-content/uploads/2023/04/Trofeu-Personalizado-Taca-Destaque.png"
                 style="cursor: pointer;"
                 width="50px" data-bs-toggle="modal" onclick="verModal({{$trofeu->id}})">
          </td>
          <td>
            <strong>{{$trofeu->nome}}</strong>
          </td>
          <td>{{$trofeu->campus?->sigla}}/{{$trofeu->campus?->nome}}</td>
          <td>{{$trofeu->ano}}</td>
          <td>{{$trofeu->colocacao}}º</td>
          <td>
            <span class="badge bg-label-success"
                  style="background-color:{{$trofeu->status?->cor}} !important;color:white !important;">
              {{$trofeu->status?->nome}}
            </span>
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#verQrCode-{{$trofeu->id}}">
                  <i class="bx bx-qr-scan me-1"></i>
                  Ver QR CODE
                </a>
                <a class="dropdown-item" href="{{route('trofeus-editar',['trofeu' => $trofeu->id])}}">
                  <i class="bx bx-edit-alt me-1"></i>
                  Editar
                </a>
                <form id="form-deletar-{{$trofeu->id}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{$trofeu->id}}">
                  <a type="button" class="dropdown-item"
                     onclick="deletarDados('{{route('trofeus-deletar')}}','form-deletar-{{$trofeu->id}}','delete')"
                     id="del">
                    <i class="bx bx-trash me-1"></i>Remover
                  </a>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @include('trofeus.ver_qrcode_modal')
      @endforeach
      </tbody>
    </table>
  </div>
</div>
{{$trofeus->links()}}

