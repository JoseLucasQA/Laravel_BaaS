<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::created([
            'name' => 'Carlos Ferreira',
            'email' => 'carlos@especializati.com.br',
            'password' => bcrypt('123456'),
        ]);
    }
}
