<?php

class View
{
    public static function show($controller, $action, $vars = array ())
    {
        $path = 'view/page/'.$controller.'/'.$action.'.phtml';

        if (file_exists($path) == false)
        {
            //TODO: lanzar error.
        }
        else
            include ($path);
    }
}
