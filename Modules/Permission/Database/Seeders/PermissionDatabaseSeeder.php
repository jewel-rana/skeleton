<?php

namespace Modules\Permission\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-show',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            'deal-list',
            'deal-create',
            'deal-edit',
            'deal-delete',
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',
            'page-list',
            'page-create',
            'page-edit',
            'page-delete',
        ];
        $role = Role::where('name', 'admin')->first();
        foreach($permissions as $permission) {
            $permission = Permission::create([
                'name' => $permission
            ]);
            $permission->assignRole($role);
        }
    }
}
