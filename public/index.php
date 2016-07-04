<?php

# header('Content-Type: application/json');
# header('Content-Type: text/plain');

chdir(dirname(__DIR__));

require 'lib/NullPoint/Core/Init.php';
require 'lib/NullPoint/Core/View.php';

$request = getRequest();
$controller = ucwords($request->controller).'Controller';
$action = $request->action.'Action';

$controllerPath = 'src/Controller/'.$controller.'.php';

if (is_file($controllerPath))
{
    require $controllerPath;

    if (is_callable(array($controller, $action)))
    {
        $cntrllr = new $controller();
        $view = new \NullPoint\Core\View();
        $view->show($request->controller, $request->action, $cntrllr->$action());
    }
    else
    {
        // trigger_error ($controller.'->'.$action.' no existe', E_USER_NOTICE);
        die ('La acción "'.$request->action.'" no existe - 404 Not found.');
    }
}
else
    die ('El controlador "'.$request->controller.'" no existe - 404 Not found.');
