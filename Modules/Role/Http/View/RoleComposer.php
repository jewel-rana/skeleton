<?php


namespace Modules\Role\Http\View;


use Illuminate\View\View;
use Modules\Category\CategoryService;
use Modules\Role\RoleService;

class RoleComposer
{
    /**
     * The user repository implementation.
     *
     * @var
     */
    protected $roles;

    /**
     * Create a new profile composer.
     *
     * @param RoleService $roles
     */
    public function __construct( RoleService $roles)
    {
        $this->roles = $roles;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'role_lists' => $this->roles->getRoleDropdown(),
        ]);
    }
}
