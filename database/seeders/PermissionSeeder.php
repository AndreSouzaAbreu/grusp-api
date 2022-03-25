<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for each action and table, we will create a permission that will be
        // used to check if the authenticated user is allowed to perform the
        // given action on the given table.

        $actions = ['view', 'create', 'update', 'destroy'];
        $tables = ['users', 'roles'];
        $permissions = [];

        // create an array of entries with the Permission model's atributes
        foreach ($tables as $table) {
            foreach ($actions as $action) {
                $permissionName = $table.'.'.$action;
                $permissions[] = [
                    'name' => $permissionName
                ];
            }
        }

        // inser them all
        Permission::insert($permissions);
    }
}
