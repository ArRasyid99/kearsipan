<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Arsip Pengawasan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Arsip Keuangan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Arsip Administrasi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Arsip Kepegawaian', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Arsip Hukum', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Arsip Program dan Kegiatan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Arsip Elektronik', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Arsip Khusus', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
