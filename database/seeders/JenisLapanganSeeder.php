<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisLapangan;

class JenisLapanganSeeder extends Seeder
{
    public function run(): void
    {
        JenisLapangan::create(['nama' => 'Sepak Bola']);
        JenisLapangan::create(['nama' => 'Futsal']);
        JenisLapangan::create(['nama' => 'Mini Soccer']);
        JenisLapangan::create(['nama' => 'Basket']);
        JenisLapangan::create(['nama' => 'Badminton']);
    }
}
