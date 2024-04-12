<div class="modal fade" id="showModal-{{ $campus->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Campus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <p><strong>Nome: </strong>{{$campus->nome}}
        </p>
        <p><strong>Sigla: </strong>{{$campus->sigla}}</p>
        <label for="textareaVer"> <strong>Descrição: </strong></label>
        <textarea class="form-control" name="textareaVer" readonly>{{$campus->descricao}}</textarea>

        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>
</div>
