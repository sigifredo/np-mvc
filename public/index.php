<?php

# header('Content-Type: application/json');
header('Content-Type: text/plain');

chdir(dirname(__DIR__));

if ($_GET['controller'])
    $controller .= ucwords(strtolower($_GET['controller'])).'Controller';
else
    $controller .= 'IndexController';

if ($_GET['action'])
    $action = strtolower($_GET['action']).'Action';
else
    $action = 'indexAction';

$controllerPath = 'src/Controller/'.$controller.'.php';

if (is_file($controllerPath))
{
    require $controllerPath;

    if (is_callable(array($controller, $action)))
    {
        echo 'existe';
    }
    else
    {
        // trigger_error ($controller.'->'.$action.' no existe', E_USER_NOTICE);
        die ('La acción "'.$action.'" no existe - 404 Not found.');
    }
}
else
    die ('El controlador "'.$controller.'" no existe - 404 Not found.');
