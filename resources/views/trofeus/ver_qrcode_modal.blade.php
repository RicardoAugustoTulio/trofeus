<div class="modal fade modal-lg" id="verQrCode-{{$trofeu->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Qr code {{$trofeu->nome}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="d-flex justify-content-center">
        <div class="img-fluid" id="qrCode-{{$trofeu->id}}">
          {{--        aqui vai o qrcode gerado pelo script--}}
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-6">
            <button type="button" class="btn btn-primary" onclick="imprimirQrCode('qrCode-{{$trofeu->id}}')">Imprimir
            </button>
          </div>
          <div class="col-md-6">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@push('js')
  <script>
    $(document).ready(function() {
      gerarQRCode('qrCode-{{$trofeu->id}}', '{{route('trofeu-detalhe',$trofeu->id)}}');
    });
  </script>
@endpush
