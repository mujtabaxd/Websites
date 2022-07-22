(function ($) {
  "use strict";

  var button = $(".btn-success"),
    message = $(".contact_msg"),
    form_data;

  // Success function
  function done_func(response) {
    message.fadeIn();
    message.html(response);
    setTimeout(function () {
      message.fadeOut();
    }, 10000);
    form.find('input:not([type="submit"]), textarea.div.p').val("");
  }

  // fail function
  function fail_func(data) {
    message.fadeIn();
    message.html(data.responseText);
    setTimeout(function () {
      message.fadeOut();
    }, 10000);
  }

  button.submit(function (e) {
    e.preventDefault();
    form_data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: form.attr("action"),
      data: form_data,
    })
      .done(done_func)
      .fail(fail_func);
  });
})(jQuery);
