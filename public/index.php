<?php

# header('Content-Type: application/json');
# header('Content-Type: text/plain');

chdir(dirname(__DIR__));

require 'lib/NullPoint/Core/Init.php';

$request = getRequest();

$controllerPath = 'src/Controller/'.$request->controller.'.php';

if (is_file($controllerPath))
{
    require $controllerPath;

    if (is_callable(array($request->controller, $request->action)))
    {
        $controller = $request->controller;
        $action = $request->action;
        $cntrllr = new $controller();
        echo json_encode($cntrllr->$action());
    }
    else
    {
        // trigger_error ($controller.'->'.$action.' no existe', E_USER_NOTICE);
        die ('La acción "'.$request->action.'" no existe - 404 Not found.');
    }
}
else
    die ('El controlador "'.$request->controller.'" no existe - 404 Not found.');
