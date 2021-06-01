<?php

use Modules\Menu\Entities\Menu;
use Modules\Menu\MenuService;
use Modules\Menu\Repository\MenuRepository;
use Modules\Setting\OptionService;

function getOption($key, $default = null)
{
    $option = new OptionService();
    return $option->get($key, $default);
}

function getMenu($name = 'top_menu')
{
    $menus = new MenuService(new MenuRepository(new Menu()));
    return $menus->getMenu($name);
}

function getPageAttribute($pageID, $attribute)
{
    return '';
}
