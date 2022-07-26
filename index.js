
function getRecaptchaToken() {
  grecaptcha.ready(function () {
    grecaptcha.execute('6Le8iRAhAAAAAPMXtuCuqxI07KZ48Vsa2GSIRYwJ', { action: 'verifyToken' })
      .then((token) => {
        console.log('Token retrieved. Sending to backend...')
        verifyRecaptchaToken(token)
      });
  });
}

function verifyRecaptchaToken(token) {
  const requestOptions = {
    method: 'POST'
  }

  fetch('validate.php?token=' + token, requestOptions)
    .then((response) => {
      return response.text()
    })
    .then((data) => {
      console.log(data)
      var respDiv = document.getElementById('response')
      respDiv.innerHTML = data
    })
    .catch((error) => {
      console.error(error)
    })
}

function test() {
  var requestOptions = {
    method: 'GET'
  }

  fetch("validate.php", requestOptions)
    .then((response) => {
      return response.json()
    })
    .then((data) => {
      console.log(data);
      const respDiv = document.getElementById('response')
      respDiv.innerHTML = JSON.stringify(data)
    })
    .catch((error) => {
      console.error(error)
    })
}
