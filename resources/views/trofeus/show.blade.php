<div class="modal fade" id="showModal-{{ $garantia->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Garantia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <p><strong>Título: </strong> {{ isset($garantia->titulo_garantia) ? $garantia->titulo_garantia : ''}}
        </p>
        <p><strong>Garantia: </strong> {{ isset($garantia->garantia) ? $garantia->garantia : '' }}</p>
        <label for="textareaVer"> <strong> Observações: </strong></label>
        <textarea class="form-control" name="textareaVer" readonly
                  style="width:70%;height:300px;"> {{ isset($garantia->obs_garantia) ? trim($garantia->obs_garantia) : '' }} </textarea>

        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  label {
    width: 180px;
    display: inline-block;
  }

  textarea{
    vertical-align: middle;
  }
</style>
