<?php

class View
{
    public function show($controller, $action, $vars = array ())
    {
        $path = 'view/page/'.$controller.'/'.$action.'.phtml';

        if (file_exists($path) == false)
        {
            //TODO: lanzar error.
        }
        else
        {
            foreach($vars as $key => $val)
                $this->$key = $val;
            include ($path);
        }
    }
}
