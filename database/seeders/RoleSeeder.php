<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {

        $adminrolesexists= Role::where('name', 'Admin')->first();

        if(!$adminrolesexists)
        {
        // DB::table('roles')->delete();

        $roles = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Teacher',
            ],
            [
                'name' => 'Student',
            ],
            [
                'name' => 'Parent',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
    }
}

