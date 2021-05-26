<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Menu\Http\Requests\MenuCreateRequest;
use Modules\Menu\MenuService;
use Modules\Page\Http\Requests\PageCreateRequest;
use Modules\Page\PageService;

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
    public function index()
    {
        return view('menu::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('menu::create')->withTitle('Add New Menu');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(MenuCreateRequest $request)
    {
        try {
           $model  =  $this->menus->create($request->validated());

            if ($request->hasfile('logo')) {
                $logo = Storage::disk('public')->put("menu", $request->file('logo'));
                $model->logo = $logo;
                $model->save();

            }
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('menu.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('menu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('menu::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
