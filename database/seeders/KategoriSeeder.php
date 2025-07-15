<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Kategori::insert([
            ['nama_kategori' => 'Hardware'],
            ['nama_kategori' => 'Software'],
            ['nama_kategori' => 'Jaringan'],
            ['nama_kategori' => 'Lain-lain'],
    ]);
}
}
