<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Role\Http\Requests\RoleCreateRequest;
use Modules\Role\Http\Requests\RoleUpdateRequest;
use Modules\Role\RoleService;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    private $roles;

    public function __construct(RoleService $roles)
    {
        $this->roles = $roles;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if($request->wantsJson()) {
            $roles = Role::with(['permissions'])->select(['id', 'name']);

            return Datatables::of($roles)
                ->addColumn('action', function($role) {
                    return "<a href='" . route('role.edit', $role->id) . "' class='btn btn-outline-secondary'>Edit</a>";
                })
                ->editColumn('permissions', function($role) {
                    return $role->permissions->implode(',');
                })
                ->make(true);
        }
        return view('role::index')->withTitle('Roles');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('role::create')->withTitle('Add new role');
    }

    /**
     * Store a newly created resource in storage.
     * @param RoleCreateRequest $request
     * @return RedirectResponse
     */
    public function store(RoleCreateRequest $request): RedirectResponse
    {
        try {
            $this->roles->create($request->validated());
        } catch (\Throwable $exception) {
            dd($exception);
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('role.index');
    }

    /**
     * Show the specified resource.
     * @param Role $role
     * @return Renderable
     */
    public function show(Role $role): Renderable
    {
        return view('role::show', compact('role'))->withTitle('Show role');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Role $role
     * @return Renderable
     */
    public function edit(Role $role): Renderable
    {
        return view('role::edit', compact('role'))->withTitle('Update role');
    }

    /**
     * Update the specified resource in storage.
     * @param RoleUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(RoleUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $this->roles->update($request->validated(), $id);
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Role $role
     * @return RedirectResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return  redirect()->back();
    }
}
