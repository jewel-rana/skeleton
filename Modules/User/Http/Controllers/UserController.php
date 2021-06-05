<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\UserCreateRequest;
use Modules\User\Http\Requests\UserUpdateRequest;
use Modules\User\UserService;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    private $users;
    public function __construct(UserService $users)
    {
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if($request->wantsJson()) {
            $users = User::with(['roles'])->select(['id', 'name', 'email', 'created_at'])
                ->whereHas('roles', function ($query) {
                    $query->where('name', '!=', 'customer');
                });

            return Datatables::of($users)
                ->filter(function ($query) use ($request) {
                    if ($request->has('name')) {
                        $query->where('name', 'like', "%{$request->get('name')}%");
                    }
                    if ($request->has('email')) {
                        $query->where('email', 'like', "%{$request->get('email')}%");
                    }
                })
                ->addColumn('role', function ($user) {
                    return $user->roles->first()->name;
                })
                ->addColumn('action', function($user) {
                    return "<a href='" . route('user.edit', $user->id) . "' class='btn btn-outline-secondary'>Edit</a>";
                })
                ->removeColumn('roles')
                ->make(true);
        }
        return view('user::index')->withTitle('Users');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::create')->withTitle('Add new user');
    }

    /**
     * Store a newly created resource in storage.
     * @param UserCreateRequest $request
     * @return RedirectResponse
     */
    public function store(UserCreateRequest $request): RedirectResponse
    {
        try {
            $this->users->create($request->validated());
        } catch (\Throwable $exception) {
            dd($exception);
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('user.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(User $user): Renderable
    {
        return view('user::show', compact('user'))->withTitle('Show user');
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return Renderable
     */
    public function edit(User $user): Renderable
    {
        return view('user::edit', compact('user'))->withTitle('Update user');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $this->users->update($request->only(['name', 'email', 'mobile']), $id);
        } catch (\Throwable $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back();
        }

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return  redirect()->back();
    }
}
