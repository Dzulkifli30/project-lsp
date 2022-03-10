<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarif;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Tarif::create([
            "daya" => "450",
            "tarifperkwh" => "100",
        ]);
        
        $data2 = Tarif::create([
            "daya" => "550",
            "tarifperkwh" => "120",
        ]);
    }
}
