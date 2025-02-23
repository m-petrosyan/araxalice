<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::firstOrCreate(['email' => 'araxsargsyan@gmail.com'], [
            'name' => 'Arax',
            'email' => 'araxsargsyan@gmail.com',
            'password' => '12345678',
        ]);
    }
}
