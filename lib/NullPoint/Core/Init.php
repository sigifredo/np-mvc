<?php

function getRequest()
{
    if (isset($_GET['company']) && !isset($_GET['controller']))
        return (object) array ('controller' => 'company', 'action' => 'profile');
    else if (!isset($_GET['company']))
    {
        if (isset($_GET['controller']))
            return (object) array ('controller' => strtolower($_GET['controller']), 'action' => strtolower($_GET['action']));
        else
            return (object) array ('controller' => 'index', 'action' => 'index');
    }
}
