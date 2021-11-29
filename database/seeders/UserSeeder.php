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
        $superAdmin = User::create([
            'name' => 'Super Admin Role',
            'email' => 'superadmin@role.test',
            'password' =>  Hash::make('superadmin123')
        ]);

        $superAdmin->assignRole('superAdmin');

        $cs1 = User::create([
            'name' => 'CS 1 Role',
            'email' => 'cs1@role.test',
            'password' =>  Hash::make('cs1123')
        ]);

        $cs1->assignRole('cs');

        $cs2 = User::create([
            'name' => 'CS 2 Role',
            'email' => 'cs2@role.test',
            'password' =>  Hash::make('cs2123')
        ]);

        $cs2->assignRole('cs');

        $teknisi = User::create([
            'name' => 'Teknisi Role',
            'email' => 'teknisi@role.test',
            'password' =>  Hash::make('teknisi123')
        ]);

        $teknisi->assignRole('teknisi');
    }
}
