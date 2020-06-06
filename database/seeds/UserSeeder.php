<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $super_admin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin@gmail.com')
        ]);
        $super_admin->syncRoles(['super-admin']);


        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@gmail.com')
        ]);
        $admin->syncRoles(['admin']);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user@gmail.com')
        ]);
        $user->syncRoles(['User']);

        $user = User::create([
            'name' => 'Pande Muliada',
            'email' => 'pandemuliada@gmail.com',
            'password' => Hash::make('pandemuliada@gmail.com')
        ]);
        $user->syncRoles(['user']);
    }
}
