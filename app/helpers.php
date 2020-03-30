<?php

function convertir_a_numero($numero)
{
    return number_format($numero,2);
}

function setActive($routeName)
{
    return request()->routeIs($routeName) ? 'active' : '';
}

function showMenu($routeName)
{
    return request()->routeIs($routeName) ? 'menu-open' : '';
}

function makeBadgeOrders($status)
{
    switch ($status){
        case 1:
            echo '<span class="badge badge-pill badge-info">Enviada</span>';
            break;
        case 2:
            echo '<span class="badge badge-pill badge-warning">Atendida</span>';
            break;
        case 3:
            echo '<span class="badge badge-pill badge-success">Completada</span>';
            break;
        case 0:
            echo '<span class="badge badge-pill badge-danger">Cancelada</span>';
            break;
    }
    return;
}
