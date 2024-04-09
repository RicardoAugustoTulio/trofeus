<div class="card mb-4 border-top border-secondary">
  <div class="table-responsive">
    <table class="table table-hover card-table text-center">
      <thead>
      <tr>
        <th>Imagem</th>
        <th>Nome</th>
        <th>Local</th>
        <th>Ano</th>
        <th>Colocação</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <tr>
        <td>
          <img src="https://premiartrofeus.com.br/wp-content/uploads/2023/04/Trofeu-Personalizado-Taca-Destaque.png"
               style="cursor: pointer;"
               width="50px" data-bs-toggle="modal" data-bs-target="#imagemModal">
        </td>
        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
          <strong>Futsal 2024</strong></td>
        <td>Curitiba/PR</td>
        <td>2024</td>
        <td>1º</td>
        <td>OK</td>
        <td>
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
              <i class="bx bx-dots-vertical-rounded"></i></button>
            <div class="dropdown-menu">
              <a class="dropdown-item">
                <i class="bx bx-qr-scan me-1"></i>
                Ver QR CODE
              </a>
              <a type="button" class="dropdown-item ver-garantia"
                 data-garantia="">
                <i class="bx bx-info-circle me-1"></i>Ver
              </a>
              <a class="dropdown-item">
                <i class="bx bx-edit-alt me-1"></i>
                Editar
              </a>
              <a type="button" class="dropdown-item" id="del">
                <i class="bx bx-trash me-1"></i>Remover
              </a>
            </div>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</div>
{{--{{$trofeus->links()}}--}}

@push('js')

  <script>
    $(document).ready(function() {
      $('.ver-garantia').click(function() {
        var garantiaData = JSON.parse($(this).attr('data-garantia'));
        var modalId = '#showModal-' + garantiaData.id;

        $(modalId + ' .modal-title').text('Garantia');

        $(modalId).modal('show');
      });
    });
  </script>

@endpush
<!-- Modal -->
<div class="modal fade" id="imagemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Troféu 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <img src="https://premiartrofeus.com.br/wp-content/uploads/2023/04/Trofeu-Personalizado-Taca-Destaque.png"
           width="100%">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
