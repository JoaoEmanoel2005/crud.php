<?php

require_once __DIR__ . '/../Controllers/StudentController.php';
require_once __DIR__ . '/../Controllers/TeacherController.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = preg_replace('/^\/(crud.php|public)/', '', $path);
$path = trim($path, '/');
$segments = explode('/', $path);

$method = $_SERVER['REQUEST_METHOD'];
$resource = $segments[0] ?? null;
$id = $segments[1] ?? null;

$routes = [
    'students' => 'StudentController',
    'teachers' => 'TeacherController'
];

if (!array_key_exists($resource, $routes)) {
    Response::json(["error" => "Rota inválida"], 404);
    exit;
}

$controllerName = $routes[$resource];
$controller = new $controllerName();

switch ($method) {
    case 'GET':
        $id ? $controller->show($id) : $controller->index();
        break;
    case 'POST':
        $controller->store();
        break;
    case 'PUT':
        if (!$id) {
            Response::json(["error" => "ID não fornecido"], 400);
            exit;
        }
        $controller->update($id);
        break;
    case 'DELETE':
        if (!$id) {
            exit(Response::json(["error" => "ID não fornecido"], 400));
        }
        $controller->destroy($id);
        break;
    default:
        Response::json(["error" => "Método não permitido"], 405);
        break;
}

exit;
