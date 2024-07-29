enviarDados = async function(url, form, metodo) {
  const formulario = $('#' + form).serialize();

  $.blockUI({
    message: '<div class="sk-wave mx-auto"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div>',
    timeout: 1e10,
    css: {
      backgroundColor: 'transparent',
      border: '0'
    },
    overlayCSS: {
      opacity: .5
    }
  });

  await $.ajax({
    type: metodo,
    url: url,
    data: formulario,
    success: function(data) {
      $.unblockUI();
      Swal.fire({
        title: data.title,
        text: data.text,
        icon: data.icon,
        confirmButtonText: data.confirmButtonText,
        html: data.html
      }).then((result) => {
        if (data.reload === 1) {
          location.reload();
        }
      });
    },
    error: function(err) {
      $.unblockUI();
      if (err.status === 422) {
        _.forEach(err.responseJSON.errors, function(value, index) {
          console.log(index);
          $('[name=' + index + ']')
            .addClass('is-invalid')
            .parent()
            .parent()
            .append(
              $('<span></span>', { class: 'invalid-feedback d-block' })
                .text(value[0])
            )
            .focus();
        });
      } else {
        Swal.fire({
          title: err.responseJSON.title,
          text: err.responseJSON.text,
          icon: err.responseJSON.icon,
          confirmButtonText: err.responseJSON.confirmButtonText
        });
      }
    }
  });
};

deletarDados = async function(url, form, metodo) {
  Swal.fire({
    title: 'Tem certeza?',
    text: 'Ao deletar todos os dados serão perdidos!',
    icon: 'warning',
    showCancelButton: !0,
    confirmButtonText: 'Sim, quero deletar!',
    cancelButtonText: 'Cancelar',
    customClass: {
      confirmButton: 'btn btn-primary me-3',
      cancelButton: 'btn btn-label-secondary'
    },
    buttonsStyling: !1
  }).then((async function(n) {
      n.value ? await enviarDados(url, form, metodo) : n.dismiss === Swal.DismissReason.cancel && Swal.fire({
        title: 'Cancelado',
        text: 'Os dados foram mantidos',
        icon: 'error',
        customClass: {
          confirmButton: 'btn btn-outline-success'
        }
      });
    }
  ));
};

verModal = function(id) {
  var modalId = '#showModal-' + id;
  $(modalId).modal('show');
};

gerarQRCode = function(elemento, url) {

  new QRCode(elemento, {
    text: url,
    width: 300, // Default width
    height: 300, // Default height
    colorDark: '#000000', // Default dark color
    colorLight: '#ffffff', // Default light color
    correctLevel: QRCode.CorrectLevel.H // Default error correction level
  });
};

imprimirQrCode = function(elemento) {
  var qrcodeElement = $('#' + elemento);
  console.log(qrcodeElement);
  // Create a new print window
  var printWindow = window.open('', '', 'width=600,height=400');

  // Clone the "qrcode" element and append it to the print window's document body
  var clonedQRCode = qrcodeElement.clone();
  printWindow.document.body.appendChild(clonedQRCode[0]);

  // Focus on the print window and execute the print command
  printWindow.focus();
  printWindow.print();

  // Close the print window after printing
  printWindow.close();
};

tweetar = function(trofeu) {
  // Extraindo dados do JSON
  const nomeModalidade = trofeu.modalidade.nome;
  const siglaCampus = trofeu.campus.sigla;
  const nomeCampus = trofeu.campus.nome;
  const ano = trofeu.ano;
  const linkPaginaAtual = window.location.href; // Link da página atual

  // Montando o texto do tweet
  const textoTweet = `Veja este troféu incrível de ${nomeModalidade}, conquistado pelo ${siglaCampus} - campus ${nomeCampus} em ${ano}! ${linkPaginaAtual} #trofeus #esporte #competição #${siglaCampus}`;

  // Criando a URL do tweet
  const urlTweet = `https://x.com/intent/tweet?text=${encodeURIComponent(textoTweet)}`;

  // Tweetando!
  window.open(urlTweet, '_blank');
};

enviarPrompt = async function(url, form, metodo) {
  const formulario = $('#' + form).serialize();
  $("#historia").summernote("code", 'Carregando...');
  $('#historia').summernote('disable');

  await $.ajax({
    type: metodo,
    url: url,
    data: formulario,
    success: function(data) {
      $("#historia").summernote("code", data);
      $('#historia').summernote('enable');
    }
  });
};
