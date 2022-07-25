<?php

function pprint($data)
{
    // Pretty prints your text or object
    return "<pre>";
    print_r($data, true);
    "</pre>";
}

function requestDump()
{
    $data = array(
        'GET' => $_GET,
        'POST' => $_POST,
        'REQUEST' => $_REQUEST,
        'SERVER' => $_SERVER,
    );
    return "<pre>" . print_r($data) . "<pre>";
}

function verifyCaptcha()
{
    $token = $_REQUEST['token'];
    $SECRET = '6Le8iRAhAAAAAOkG6b8Pt8pPnaMV4VFrTH3i2SZK';

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$SECRET&response=$token";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $resp = curl_exec($curl);
    // header();
    print($resp);
    curl_close($curl);
}


// if (isset($_POST)){
//     $response = $_POST['token'];
// }

verifyCaptcha();

// $elem = '<div class="card response-body p-2" id="response">success</div>';
// print($elem);

// requestDump();

