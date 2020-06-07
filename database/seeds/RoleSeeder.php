<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'admin'])->syncPermissions(['create categories', 'read categories', 'edit categories', 'delete categories']);
        Role::create(['name' => 'user'])->syncPermissions(['read categories', 'edit categories']);
    }
}
