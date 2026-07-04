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
        $owner = User::where('email', 'owner@ayotanding.com')->first();
        if (!$owner) return;

        $lapangans = [
            // === APPROVED (bisa dibooking penyewa) ===
            [
                'field_name' => 'Lapangan Futsal A',
                'location' => 'Kota Malang',
                'full_address' => 'Jl. Veteran No. 15, Malang',
                'description' => 'Lapangan futsal standar dengan rumput sintetis kualitas terbaik. Dilengkapi lampu untuk malam hari dan ruang ganti.',
                'jenis_lapangan_id' => 2,
                'layanan_pembayaran_id' => 2,
                'field_photo' => 'demo1.png',
                'payment_option' => 'BCA 1234567890 a/n Nabil Maulana',
                'approved' => true,
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
                'approved' => true,
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
                'approved' => true,
                'fases' => [
                    ['jam_mulai' => '06:00', 'jam_berakhir' => '08:00', 'harga' => 80000],
                    ['jam_mulai' => '08:00', 'jam_berakhir' => '10:00', 'harga' => 80000],
                    ['jam_mulai' => '15:00', 'jam_berakhir' => '17:00', 'harga' => 120000],
                    ['jam_mulai' => '17:00', 'jam_berakhir' => '19:00', 'harga' => 120000],
                ],
            ],
            [
                'field_name' => 'Lapangan Futsal D',
                'location' => 'Kota Jakarta',
                'full_address' => 'Jl. Gatot Subroto Kav. 56, Jakarta Selatan',
                'description' => 'Lapangan futsal indoor dengan lantai parket dan lampu LED. Tersedia kafe dan tempat parkir luas.',
                'jenis_lapangan_id' => 2,
                'layanan_pembayaran_id' => 1,
                'field_photo' => 'demo4.png',
                'payment_option' => 'BSI 9876543210 a/n Habil Aswad',
                'approved' => true,
                'fases' => [
                    ['jam_mulai' => '07:00', 'jam_berakhir' => '08:00', 'harga' => 65000],
                    ['jam_mulai' => '08:00', 'jam_berakhir' => '09:00', 'harga' => 65000],
                    ['jam_mulai' => '17:00', 'jam_berakhir' => '18:00', 'harga' => 95000],
                    ['jam_mulai' => '18:00', 'jam_berakhir' => '19:00', 'harga' => 95000],
                    ['jam_mulai' => '20:00', 'jam_berakhir' => '21:00', 'harga' => 110000],
                ],
            ],
            [
                'field_name' => 'Gor Badminton E',
                'location' => 'Kota Yogyakarta',
                'full_address' => 'Jl. Kaliurang KM 7, Sleman, Yogyakarta',
                'description' => 'GOR badminton 4 lapangan dengan lantai vinyl standar internasional. Tersedia penyewaan raket dan shuttlecock.',
                'jenis_lapangan_id' => 5,
                'layanan_pembayaran_id' => 3,
                'field_photo' => 'demo5.png',
                'payment_option' => 'BCA Syariah 08123456789 a/n Nabil Maulana',
                'approved' => true,
                'fases' => [
                    ['jam_mulai' => '06:00', 'jam_berakhir' => '07:00', 'harga' => 30000],
                    ['jam_mulai' => '07:00', 'jam_berakhir' => '08:00', 'harga' => 30000],
                    ['jam_mulai' => '14:00', 'jam_berakhir' => '15:00', 'harga' => 50000],
                    ['jam_mulai' => '15:00', 'jam_berakhir' => '16:00', 'harga' => 50000],
                    ['jam_mulai' => '19:00', 'jam_berakhir' => '20:00', 'harga' => 60000],
                ],
            ],

            // === PENDING (menunggu approval admin) ===
            [
                'field_name' => 'Lapangan Sepak Bola F',
                'location' => 'Kota Semarang',
                'full_address' => 'Jl. Pandanaran No. 45, Semarang',
                'description' => 'Lapangan sepak bola ukuran penuh dengan rumput alami. Kapasitas 500 penonton, cocok untuk pertandingan.',
                'jenis_lapangan_id' => 1,
                'layanan_pembayaran_id' => 5,
                'field_photo' => 'demo6.png',
                'payment_option' => 'GOPAY 082345678901 a/n Habil Aswad',
                'approved' => false,
                'fases' => [
                    ['jam_mulai' => '07:00', 'jam_berakhir' => '09:00', 'harga' => 200000],
                    ['jam_mulai' => '09:00', 'jam_berakhir' => '11:00', 'harga' => 200000],
                    ['jam_mulai' => '15:00', 'jam_berakhir' => '17:00', 'harga' => 300000],
                    ['jam_mulai' => '17:00', 'jam_berakhir' => '19:00', 'harga' => 350000],
                ],
            ],
            [
                'field_name' => 'Mini Soccer G',
                'location' => 'Kota Medan',
                'full_address' => 'Jl. Sisingamangaraja No. 120, Medan',
                'description' => 'Lapangan mini soccer dengan rumput sintetis premium. Tersedia lampu sorot untuk main malam hari.',
                'jenis_lapangan_id' => 3,
                'layanan_pembayaran_id' => 2,
                'field_photo' => 'demo7.png',
                'payment_option' => 'BCA 1122334455 a/n Nabil Maulana',
                'approved' => false,
                'fases' => [
                    ['jam_mulai' => '08:00', 'jam_berakhir' => '09:00', 'harga' => 70000],
                    ['jam_mulai' => '09:00', 'jam_berakhir' => '10:00', 'harga' => 70000],
                    ['jam_mulai' => '16:00', 'jam_berakhir' => '17:00', 'harga' => 100000],
                    ['jam_mulai' => '17:00', 'jam_berakhir' => '18:00', 'harga' => 100000],
                    ['jam_mulai' => '19:00', 'jam_berakhir' => '20:00', 'harga' => 130000],
                ],
            ],
        ];

        foreach ($lapangans as $data) {
            $fases = $data['fases'];
            unset($data['fases']);

            $lapangan = Lapangan::create(array_merge($data, [
                'user_id' => $owner->id,
                'full_name' => $owner->name,
                'phone_number' => '081234567890',
                'email' => $owner->email,
                'identity_photo' => null,
                'ownership_proof' => null,
            ]));

            foreach ($fases as $fase) {
                Fase::create(array_merge($fase, ['lapangan_id' => $lapangan->id]));
            }
        }

        $this->command->info('7 demo lapangan berhasil dibuat (5 approved, 2 pending)!');
    }
}
