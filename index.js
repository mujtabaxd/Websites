
function getRecaptchaToken() {
  grecaptcha.ready(function () {
    grecaptcha.execute('6Le8iRAhAAAAAPMXtuCuqxI07KZ48Vsa2GSIRYwJ', { action: 'verifyToken' })
      .then((token) => {
        console.log('Token retrieved. Sending request to backend...')
        verifyRecaptchaToken(token)
      });
  });
}

function verifyRecaptchaToken(token) {
  const requestOptions = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    }
  }

  fetch('verify.php?token=' + token, requestOptions)
    .then((response) => {
      return response.text()
    })
    .then(data => {
      // console.log(data)
      var respDiv = document.getElementById('response')
      respDiv.innerHTML = data
    })
    .catch(error => console.log('site-verify-error', error));
}

function test() {
  var requestOptions = {
    method: 'POST',
  };

  fetch("verify.php?token=test-token", requestOptions)
    .then((response) => {
      return response.text()
    })
    .then((text) => {
      console.log(text);
      const respDiv = document.getElementById('response')
      respDiv.innerHTML = text
      // if (text.match('#response')) {
      //   respDiv.innerHTML = text
      // }
    })
    .catch((error) => {
      console.error(error);
    })
}