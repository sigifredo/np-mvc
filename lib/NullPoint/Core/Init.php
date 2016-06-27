<?php

function getRequest()
{
    $request = explode('/', str_replace(getenv('REDIRECT_BASE'), '', getenv('REQUEST_URI')));
    $size = count($request);

    if ($size === 0)
        return (object) array ('controller' => 'IndexController', 'action' => 'indexAction');
    else if ($size === 2)
        return (object) array ('controller' => ucwords(strtolower($request[0])).'Controller', 'action' => strtolower($request[1]).'Action');
    else
        return (object) array ('error' => true);
}
