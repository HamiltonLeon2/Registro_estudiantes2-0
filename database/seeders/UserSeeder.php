<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'username' => 'SysAdmin',
            'name'=>'Hamilton Leon',
            'email' => 'sysadmin@example.com',
            'password' => bcrypt('sysadmin'),
        ]);

        $role = Role::findByName('Administrador');
        $user->assignRole($role);
    }
}
