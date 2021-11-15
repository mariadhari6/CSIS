<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'superAdmin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'cs',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'teknisi',
            'guard_name' => 'web'
        ]);
    }
}
