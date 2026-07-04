<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LayananPembayaran;

class LayananPembayaranSeeder extends Seeder
{
    public function run(): void
    {
        LayananPembayaran::create(['layanan' => 'BSI']);
        LayananPembayaran::create(['layanan' => 'BCA']);
        LayananPembayaran::create(['layanan' => 'BCA Syariah']);
        LayananPembayaran::create(['layanan' => 'OVO']);
        LayananPembayaran::create(['layanan' => 'GOPAY']);
    }
}
