enviarForm = async function (url, form, metodo) {
  const formulario = $('#' + form).serialize();

  $.blockUI({
    message: '<div class="sk-wave mx-auto"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div>',
    timeout: 1e10,
    css: {
      backgroundColor: "transparent",
      border: "0"
    },
    overlayCSS: {
      opacity: .5
    }
  })

  await $.ajax({
    type: metodo,
    url: url,
    data: formulario,
    success: function (data) {
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
        if (data.redirect) {
          window.location.href = data.redirect
        }
      })
    },
    error: function (err) {
      $.unblockUI();
      if (err.status === 422) {
        _.forEach(err.responseJSON.errors, function (value, index) {
          console.log(index);
          $('[name=' + index + ']')
            .addClass("is-invalid")
            .parent()
            .parent()
            .append(
              $("<span></span>", {class: "invalid-feedback d-block"})
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
        })
      }
    }
  });

};
