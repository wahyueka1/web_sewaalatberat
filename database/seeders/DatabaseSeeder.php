<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use App\Models\Equipment;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun admin default. GANTI password ini setelah login pertama kali.
        User::firstOrCreate(
            ['email' => 'admin@usaha-anda.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password123'),
            ]
        );

        CompanyProfile::firstOrCreate(['id' => 1], [
            'company_name' => 'Nama Usaha Sewa Alat Berat',
            'tagline' => 'Sewa alat berat terpercaya untuk proyek Anda',
            'description' => 'Kami menyediakan jasa sewa alat berat untuk kebutuhan konstruksi, pertambangan, dan infrastruktur.',
            'address' => 'Jl. Contoh No. 123, Denpasar, Bali',
            'phone' => '628123456789',
            'whatsapp_number' => '628123456789',
            'email' => 'wahyuekaputra56@gmail.com',
            'instagram_url' => 'https://instagram.com/usaha-anda',
            'facebook_url' => 'https://facebook.com/usaha-anda',
        ]);

        Equipment::firstOrCreate(['slug' => 'excavator-komatsu-pc200'], [
            'name' => 'Excavator Komatsu PC200',
            'category' => 'Excavator',
            'description' => 'Excavator dengan kapasitas bucket 0.9 m3, cocok untuk penggalian dan pemindahan tanah skala menengah-besar.',
            'specifications' => "Kapasitas bucket: 0.9 m3\nBerat operasi: 20 ton\nTenaga mesin: 148 HP",
            'is_available' => true,
        ]);

        Portfolio::firstOrCreate(['slug' => 'proyek-jalan-tol-contoh'], [
            'title' => 'Proyek Pembangunan Jalan Tol',
            'client_name' => 'PT Contoh Konstruksi',
            'location' => 'Denpasar, Bali',
            'description' => 'Penyewaan 3 unit excavator dan 2 unit dump truck selama 6 bulan untuk pekerjaan tanah.',
            'project_date' => now()->subMonths(4),
        ]);
    }
}
