<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lapangan;
use App\Models\Fase;
use Illuminate\Database\Seeder;

class DemoLapanganSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'user@ayotanding.com')->first();
        if (!$user) return;

        $lapangans = [
            [
                'field_name' => 'Lapangan Futsal A',
                'location' => 'Kota Malang',
                'full_address' => 'Jl. Veteran No. 15, Malang',
                'description' => 'Lapangan futsal standar dengan rumput sintetis kualitas terbaik. Dilengkapi lampu untuk malam hari dan ruang ganti.',
                'jenis_lapangan_id' => 2,
                'layanan_pembayaran_id' => 2,
                'field_photo' => 'demo1.png',
                'payment_option' => 'BCA 1234567890 a/n Nabil Maulana',
                'fases' => [
                    ['jam_mulai' => '08:00', 'jam_berakhir' => '09:00', 'harga' => 50000],
                    ['jam_mulai' => '09:00', 'jam_berakhir' => '10:00', 'harga' => 50000],
                    ['jam_mulai' => '16:00', 'jam_berakhir' => '17:00', 'harga' => 75000],
                    ['jam_mulai' => '17:00', 'jam_berakhir' => '18:00', 'harga' => 75000],
                    ['jam_mulai' => '19:00', 'jam_berakhir' => '20:00', 'harga' => 100000],
                ],
            ],
            [
                'field_name' => 'Gor Badminton B',
                'location' => 'Kota Surabaya',
                'full_address' => 'Jl. Raya Darmo Permai Blok C12, Surabaya',
                'description' => 'GOR badminton dengan 2 lapangan indoor, karpet standar turnamen, dan AC.',
                'jenis_lapangan_id' => 5,
                'layanan_pembayaran_id' => 4,
                'field_photo' => 'demo2.png',
                'payment_option' => 'OVO 081234567890 a/n Habil Aswad',
                'fases' => [
                    ['jam_mulai' => '07:00', 'jam_berakhir' => '08:00', 'harga' => 25000],
                    ['jam_mulai' => '08:00', 'jam_berakhir' => '09:00', 'harga' => 25000],
                    ['jam_mulai' => '15:00', 'jam_berakhir' => '16:00', 'harga' => 40000],
                    ['jam_mulai' => '16:00', 'jam_berakhir' => '17:00', 'harga' => 40000],
                    ['jam_mulai' => '18:00', 'jam_berakhir' => '19:00', 'harga' => 50000],
                ],
            ],
            [
                'field_name' => 'Lapangan Basket C',
                'location' => 'Kota Bandung',
                'full_address' => 'Jl. Setiabudi No. 88, Bandung',
                'description' => 'Lapangan basket outdoor dengan paving standar FIBA, papan pantul kaca tempered, dan lampu malam.',
                'jenis_lapangan_id' => 4,
                'layanan_pembayaran_id' => 5,
                'field_photo' => 'demo3.png',
                'payment_option' => 'GOPAY 08123456789 a/n Nabil Maulana',
                'fases' => [
                    ['jam_mulai' => '06:00', 'jam_berakhir' => '08:00', 'harga' => 80000],
                    ['jam_mulai' => '08:00', 'jam_berakhir' => '10:00', 'harga' => 80000],
                    ['jam_mulai' => '15:00', 'jam_berakhir' => '17:00', 'harga' => 120000],
                    ['jam_mulai' => '17:00', 'jam_berakhir' => '19:00', 'harga' => 120000],
                ],
            ],
        ];

        foreach ($lapangans as $data) {
            $fases = $data['fases'];
            unset($data['fases']);

            $lapangan = Lapangan::create(array_merge($data, [
                'user_id' => $user->id,
                'full_name' => $user->name,
                'phone_number' => '081234567890',
                'email' => $user->email,
                'identity_photo' => null,
                'ownership_proof' => null,
                'approved' => true,
            ]));

            foreach ($fases as $fase) {
                Fase::create(array_merge($fase, ['lapangan_id' => $lapangan->id]));
            }
        }

        $this->command->info('Demo lapangan berhasil dibuat!');
    }
}
