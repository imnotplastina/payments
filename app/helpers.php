<?php


function active_link(string $route, string $active = 'active'): string
{
    return request()->routeIs($route) ? $active : '';
}
