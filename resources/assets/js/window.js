$(document).ready(function () {
  const startBtn = $('#microfone');
  const output = $('#busca');
  const microfoneModal = $('#microfoneModal')

  function start() {
    const recognition = new webkitSpeechRecognition();
    recognition.interimResults = true;
    recognition.lang = "pt-BR";
    recognition.continuous = true;
    recognition.start();
    microfoneModal.modal('show');

    microfoneModal.on("hidden.bs.modal", function () {
      recognition.stop();
    })

    recognition.onresult = function (event) {
      for (let i = event.resultIndex; i < event.results.length; i++) {
        if (event.results[i].isFinal) {
          // Aqui você pode obter a string do que você falou
          let content = event.results[i][0].transcript.trim();
          content = content.replace(/[.,!?]/g, ''); // Remove pontuações
          microfoneModal.modal('hide');
          output.val(content);
          $('#form-busca').submit()
        }
      }
    };
  }

  startBtn.on('click', function () {
    start();
  });

});
