<?php

namespace Database\Seeders;

use App\Models\Type_Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('type__bloods')->delete();

        $bloodtypes = [
            ['name' => 'A+'],
            ['name' => 'A-'],
            ['name' => 'B+'],
            ['name' => 'B-'],
            ['name' => 'AB+'],
            ['name' => 'AB-'],
            ['name' => 'O+'],
            ['name' => 'O-'],
        ];

        foreach ($bloodtypes as $bloodtype) {
            Type_Blood::create($bloodtype);
        }
    }
}
