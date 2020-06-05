<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'read categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'delete categories']);

        $role = Role::create(['name' => 'user'])->givePermissionTo(['read categories', 'edit categories']);
        $role = ROle::create(['name' => 'super-admin'])->givePermissionTo(Permission::all());
    }
}
