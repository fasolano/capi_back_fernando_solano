<?php

namespace Database\Seeders;

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
        DB::table('users_domicilio')->insert([
            'domicilio' => Str::random(80),
            'numero_exterior' => rand(1,999),
            'colonia' => Str::random(20),
            'cp' => rand(50000,80000),
            'ciudad' => Str::random(20),
        ]);
    }
}
