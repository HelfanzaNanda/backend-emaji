<?php

namespace Database\Seeders;

use App\Models\Cycle;
use Illuminate\Database\Seeder;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cycles = ['harian', 'mingguan', 'bulanan', '6 bulan', 'tahunan'];
        for ($i=0; $i < count($cycles); $i++) {
            Cycle::create([
                'name' => $cycles[$i],
            ]);
        }
    }
}
