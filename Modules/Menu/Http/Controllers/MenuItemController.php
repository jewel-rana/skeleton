<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Menu\Events\MenuUpdateEvent;
use Modules\Menu\Http\Requests\MenuItemCreateRequest;
use Modules\Menu\Http\Requests\MenuItemUpdateRequest;
use Modules\Menu\MenuItemService;

class MenuItemController extends Controller
{
    private $menuItems;

    public function __construct(MenuItemService $menuItems)
    {
        $this->menuItems = $menuItems;
    }

    /**
     * Store a newly created resource in storage.
     * @param MenuItemCreateRequest $request
     * @return RedirectResponse
     */
    public function store(MenuItemCreateRequest $request): RedirectResponse
    {
        try {
            $this->menuItems->create($request->validated());
        } catch (\Throwable $exception) {
            dd($exception);
            session()->flash('error', $exception->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     * @param MenuItemUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(MenuItemUpdateRequest $request, $id): JsonResponse
    {
        $data = ['status' => false, 'message'=> 'Cannot save changes'];
        try {
            $this->menuItems->update($request->validated(), $id);
            $data['message'] = 'Successfully updated menu';
            $data['status'] = true;
        } catch (\Throwable $exception) {
            $data['message'] = $exception->getMessage();
        }

        return response()->json($data);
    }

    public function save(Request $request): JsonResponse
    {
        $data = ['status' => false, 'message'=> 'Cannot save changes'];
        try {
            DB::transaction(function() use($request, &$data) {
                if(is_array($request->sorted)) {
                    collect($request->sorted)->each(function ($item, $key) {
                        if($key === 0) return;
                        $this->menuItems->update(['menu_order' => $key, 'parent_id' => (int) $item['parent_id']], $item['id']);
                    });
                }
            }, 2);
            event(new MenuUpdateEvent());
            $data['status'] = true;
            $data['message'] = 'Your changes successfully saved';
        } catch (\Throwable $exception) {
            $data['message'] = $exception->getMessage();
        }

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $data = ['status' => false, 'message'=> 'Cannot save changes'];
        try {
            $this->menuItems->delete($id);
            $data['status'] = true;
            $data['message'] = 'Successfully deleted menu';
        } catch (\Throwable $exception) {
            $data['message'] = $exception->getMessage();
        }
        return response()->json($data);
    }
}
