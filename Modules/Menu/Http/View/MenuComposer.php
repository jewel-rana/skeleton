<?php


namespace Modules\Menu\Http\View;


use Illuminate\View\View;
use Modules\Menu\MenuService;

class MenuComposer
{
    /**
     * @var MenuService
     */
    private $menus;

    public function __construct(MenuService $mediaService)
    {
        $this->menus = $mediaService;
    }

    public function compose(View $view)
    {
        $view->with([
            'menu_lists' => $this->menus->getMenuList()
        ]);
    }
}
