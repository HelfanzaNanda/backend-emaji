<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ['admin' ,'pengawas', 'penguji'];
        for ($i=0; $i < count($users); $i++) {
            User::create([
                'name' => $users[$i],
                'email' => $users[$i].'@example.com',
                'password' => Hash::make('12345678'),
                'role' => $users[$i]
            ]);
        }
    }
}
