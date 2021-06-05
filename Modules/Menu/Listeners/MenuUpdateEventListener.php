<?php

namespace Modules\Menu\Listeners;

use Illuminate\Support\Facades\Cache;
use Modules\Menu\Events\MenuUpdateEvent;
use Modules\Menu\MenuService;

class MenuUpdateEventListener
{
    /**
     * @var MenuService
     */
    private $menus;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(MenuService $menuService)
    {
        $this->menus = $menuService;
    }

    /**
     * Handle the event.
     *
     * @param MenuUpdateEvent $event
     * @return void
     */
    public function handle(MenuUpdateEvent $event)
    {
        $this->menus->all()->each(function($item, $key) {
            Cache::forget($item->name);
        });
    }
}
