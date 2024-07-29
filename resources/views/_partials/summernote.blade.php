<div>
  <textarea class="form-control" id="{{$name}}" name="{{$name}}" rows="3">{{$descricao}}</textarea>
</div>

@push('js')
  <script>
    $(document).ready(function () {
      $('#{{$name}}').summernote({
        popover: {
          image: [
            ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
            ['float', ['floatLeft', 'floatRight', 'floatNone']],
            ['remove', ['removeMedia']]
          ],
          link: [
            ['link', ['linkDialogShow', 'unlink']]
          ],
          table: [
            ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
            ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
          ],
          air: [
            ['color', ['color']],
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']]
          ]
        },
        disableDragAndDrop: true,
        placeholder: 'Insira seu texto aqui...',
        callbacks: {
          onImageUpload: function (files) {
            // // upload image to server and create imgNode...
            sendFile(files[0])
          },
          onMediaDelete: function (target) {
            // alert(target[0].src)
            deleteFile(target[0].src);
          }
        }
      });
    });

    function sendFile(file) {
      data = new FormData();
      data.append("upload", file);
      $.ajax({
        data: data,
        type: "POST",
        url: "{{route('summernote-upload').'?_token='.csrf_token()}}",
        cache: false,
        contentType: false,
        processData: false,
        success: function (url) {
          $('#{{$name}}').summernote("insertImage", url.url);
        }
      });
    }

    function deleteFile(src) {
      $.ajax({
        data: {caminho:src},
        type: "DELETE",
        url: "{{route('summernote-deletar-imagem').'?_token='.csrf_token()}}",
        cache: false,
      });
    }

    $(function () {
      if ($('.note-editor')) {
        $('.note-editor').addClass('summernoteClass')
      }
    })

  </script>
@endpush
<style>
  .modal-backdrop, .modal-backdrop.in, .note-modal-backdrop {
    display: none !important;
  }
</style>
