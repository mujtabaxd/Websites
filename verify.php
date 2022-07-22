<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  # BEGIN Setting reCaptcha v3 validation data
  $url = "https://www.google.com/recaptcha/api/siteverify";
  $data = [
    'secret' => "6Le8iRAhAAAAAOkG6b8Pt8pPnaMV4VFrTH3i2SZK",
    'response' => $_POST['token'],
    'remoteip' => $_SERVER['REMOTE_ADDR']
  ];

  $options = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => http_build_query($data)
    )
    );
  
  # Creates and returns stream context with options supplied in options preset 
  $context  = stream_context_create($options);
  $response = file_get_contents($url, false, $context);
  $res = json_decode($response, true);
   
  if ($res['success'] == true) {
    # Set a 200 (okay) response code
    http_response_code(200);
    echo '<div class="alert alert-success">'+$res+'</div>';
  }

} else {
  # Not a POST request, set a 403 (forbidden) response code
  http_response_code(403);
  echo '<p class="alert-warning">There was a problem with your submission, please try again.</p>';
}
