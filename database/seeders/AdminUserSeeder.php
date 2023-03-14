<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $defualtAdmin='admin@admin.com';
        $adminusersexists= User::where('email', $defualtAdmin)->first();

        if(!$adminusersexists){
            $admins = [
                [
                    'name' => 'Admin',
                    'email' => $defualtAdmin,
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Mohamed Sheta',
                    'email' => 'sheta@admin.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Adham Tamer',
                    'email' => 'adham@admin.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Eman',
                    'email' => 'eman@admin.com',
                    'password' => Hash::make('123456789@#'),
                ],
                [
                    'name' => 'Khaled',
                    'email' => 'khaled@admin.com',
                    'password' => Hash::make('123456789@#'),
                ],
            ];

            $adminRole = Role::where('name', 'admin')->first();

            foreach ($admins as $admin) {
                $user = User::create($admin);
                $user->roles()->attach($adminRole);
            }
        }

    }
}
