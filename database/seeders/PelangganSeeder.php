<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Pelanggan::create([
            "username" => "jaher",
            'password' => bcrypt('12345678'),
            "nomor_kwh" => "123",
            "nama_pelanggan" => "muhammad ibnu",
            "alamat" => "yaman jakarta",
            "tarif_id" => "1",
        ]);
    }
}
