<?php

use Modules\Menu\MenuService;
use Modules\Setting\OptionService;

function getOption($key, $default = null)
{
    $option = new OptionService();
    return $option->get($key, $default);
}

function getMenu($name = 'top_menu')
{
    $menus = new MenuService(new \Modules\Menu\Repository\MenuRepository(new \Modules\Menu\Entities\Menu()));
    return $menus->getMenu($name);
}

function getPageAttribute($pageID, $attribute)
{
    return '';
}
