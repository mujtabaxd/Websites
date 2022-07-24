<?php
$elem = '<div class="card response-body p-2" id="response">success</div>';
if (isset($elem)) {
    print($elem);
    return;
}
$data = array(
    'GET'=> $_GET,
    'POST'=> $_POST,
    'REQUEST'=> $_REQUEST,
    'SERVER'=> $_SERVER,
);

print("<pre>".print_r($data,true)."</pre>");