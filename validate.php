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
    try {
        require_once('config.php');
        $token = '';
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret'   => $SECRET_KEY,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        header('Content-Type: application/json');
        return $result;
        // Returned Response:
        // {
        //     "success": true,
        //     "challenge_ts": "2022-07-26T06:52:55Z",
        //     "hostname": "recaptcha.pages.dev",
        //     "score": 0.9,
        //     "action": "verifyToken"
        // }
    } catch (Exception $e) {
        return $e;
    }
}

function mockData()
{
    $url = "https://postman-echo.com/get";
    $data = [
        'test' => $_GET['test']
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'GET',
            'content' => http_build_query($data)
        ]
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    header('Content-Type: application/json');
    return $result;
}



$request = verifyCaptcha();
print($request);
