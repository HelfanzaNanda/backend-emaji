<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tools = [
            'Brake Tester',
            'Co HC Tester',
            'Head Liht, Tester',
            'Slide Slip Tester',
            'Smoke Tester',
            'Spedometer Tester'
        ];

        for ($i=0; $i < count($tools); $i++) {
            Tool::create([
                'name' => $tools[$i],
                'slug' => $tools[$i]. '-'.Str::random(10),
                'image' => 'img.jpeg'
            ]);
        }
    }
}
