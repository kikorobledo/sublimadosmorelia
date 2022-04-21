<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'kiko',
            'status' => 'activo',
            'role' => 'admin',
            'email' => 'correo@correo.com',
            'password' => bcrypt('12345678')
        ]);

        User::factory(200)->create();
    }
}
