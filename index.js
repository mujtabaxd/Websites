function getRecaptchaToken() {
  grecaptcha.ready(function () {
    grecaptcha.execute('6Le8iRAhAAAAAPMXtuCuqxI07KZ48Vsa2GSIRYwJ', { action: 'verifyToken' }).then(function (token) {
      console.log(token)
      fetch('/verify.php?action=verifyToken&response=' + token)
        .then(response => response.text())
    });
  });
}

function testurl() {
  var requestOptions = {
    method: 'GET',
    data: 'SampleData',
    response: "Token",
    action: 'teset'
  };

  fetch("verify.php", requestOptions)
    .then((response) => {
      return response.text()
    })
    .then((text) => {
      console.log(text);
      const respDiv = document.getElementById('response')
      respDiv.innerHTML = text
    })
    .catch((error) => {
      console.error(error);
    })
}