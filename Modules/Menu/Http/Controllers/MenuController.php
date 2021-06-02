<?php

namespace Modules\Menu\Http\Controllers;

use App\Constants\AppConst;
use App\Constants\Constant;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Events\MenuUpdateEvent;
use Modules\Menu\Http\Requests\MenuCreateRequest;
use Modules\Menu\Http\Requests\MenuUpdateRequest;
use Modules\Menu\MenuService;

class MenuController extends Controller
{
    private $menus;

    public function __construct(MenuService $menus)
    {
        $this->menus = $menus;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable
    {
        $menus = $this->menus->all();
        return view('menu::index', compact('menus'))->withTitle('Menus');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('menu::create')->withTitle('Add New Menu');
    }

    /**
     * Store a newly created resource in storage.
     * @param MenuCreateRequest $request
     * @return RedirectResponse
     */
    public function store(MenuCreateRequest $request): RedirectResponse
    {
        try {
           $this->menus->create($request->validated());
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('menu.index');
    }

    /**
     * Show the specified resource.
     * @param Menu $menu
     * @return Renderable
     */
    public function show(Menu $menu): Renderable
    {
        return view('menu::show', compact('menu'))->withTitle('Menu: ' . $menu->name);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Menu $menu
     * @return Renderable
     */
    public function edit(Menu $menu): Renderable
    {
        return view('menu::edit', compact('menu'))->withTitle('Update menu');
    }

    /**
     * Update the specified resource in storage.
     * @param MenuUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(MenuUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $this->menus->update($request->validated(), $id);
            event(new MenuUpdateEvent());
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
