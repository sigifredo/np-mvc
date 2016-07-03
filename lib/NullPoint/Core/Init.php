<?php

function getRequest()
{
    if (isset($_GET['company']) && !isset($_GET['controller']))
        return (object) array ('controller' => 'CompanyController', 'action' => 'profileAction');
    else if (!isset($_GET['company']))
    {
        if (isset($_GET['controller']))
            return (object) array ('controller' => ucwords(strtolower($_GET['controller'])).'Controller', 'action' => strtolower($_GET['action']).'Action');
        else
            return (object) array ('controller' => 'IndexController', 'action' => 'indexAction');
    }
}
