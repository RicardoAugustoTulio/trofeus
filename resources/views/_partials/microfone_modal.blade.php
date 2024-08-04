<div class="modal fade modal-lg" id="microfoneModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Busca por Voz</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="d-flex justify-content-center my-4">
        <i class='bx bxs-microphone microphone-icon'></i>
      </div>
      <div class="modal-footer">
        <div class="row w-100">
          <div class="col-md-6">
            <!-- Formatação -->
          </div>
          <div class="col-md-6 text-end">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  .microphone-icon {
    font-size: 4rem;
    color: white;
    background-color: #0d6efd;
    border-radius: 50%;
    padding: 20px;
    animation: pulse 2s infinite;
  }

  @keyframes pulse {
    0% {
      transform: scale(1);
      box-shadow: 0 0 0 0 rgba(13, 110, 253, 0.7);
    }
    70% {
      transform: scale(1.1);
      box-shadow: 0 0 0 20px rgba(13, 110, 253, 0);
    }
    100% {
      transform: scale(1);
      box-shadow: 0 0 0 0 rgba(13, 110, 253, 0);
    }
  }
</style>
