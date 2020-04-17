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
            return '<span class="badge badge-pill badge-info">Enviada</span>';
            break;
        case 2:
            return '<span class="badge badge-pill badge-warning">Atendida</span>';
            break;
        case 3:
            return '<span class="badge badge-pill badge-success">Completada</span>';
            break;
        case 0:
            return '<span class="badge badge-pill badge-danger">Cancelada</span>';
            break;
        default:
            return '';
            break;
    }
}

function makeBadgeStatus($active)
{
    if ($active) {
        return '<span class="badge badge-success">Activo</span>';
    } else {
        return '<span class="badge badge-danger">Inactivo</span>';
    }
}

function makeBadgeInvoice($invoice)
{
    if ($invoice) {
        return '<span class="badge badge-primary">Factura solicitada</span>';
    } else {
        return '<span class="badge badge-danger">Sin factura</span>';
    }
}
