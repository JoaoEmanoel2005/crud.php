<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$debug_info = [
    "request_uri" => $_SERVER['REQUEST_URI'],
    "method" => $_SERVER['REQUEST_METHOD'],
    "script_name" => $_SERVER['SCRIPT_NAME'],
    "path_info" => $_SERVER['PATH_INFO'] ?? 'NOT SET',
];

$request_uri = trim($_SERVER['REQUEST_URI'], '/');
if (strpos($request_uri, 'api/') === 0) {
    $request_uri = substr($request_uri, 4);
    $request_uri = trim($request_uri, '/');
}


if (strpos($request_uri, 'public/') === 0) {
    $request_uri = substr($request_uri, 7);
    $request_uri = trim($request_uri, '/');
}

$uri = explode('/', $request_uri);

$debug_info["processed_uri"] = $request_uri;
$debug_info["uri_parts"] = $uri;

if ($uri[0] === 'test' && $uri[1] === 'api') {
    $response = [
        "status" => "success",
        "message" => "API está funcionando corretamente!",
        "debug_info" => $debug_info
    ];
    http_response_code(200);
    echo json_encode($response, JSON_PRETTY_PRINT);
    exit;
}

$response = [
    "status" => "debug",
    "message" => "Informações de depuração da requisição",
    "debug_info" => $debug_info
];
http_response_code(200);
echo json_encode($response, JSON_PRETTY_PRINT);
?>