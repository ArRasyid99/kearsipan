<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('labels')->insert([
            ['name' => 'Dinamis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Aktif', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Inaktif', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Statis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vital', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
