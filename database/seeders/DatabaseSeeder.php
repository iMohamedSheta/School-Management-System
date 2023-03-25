<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call(BloodTableSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(NationalitieTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdminUserSeeder::class);





        // \App\Models\User::factory(500)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // $this->call(GradeSeeder::class);

    }
}
