<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agents')->insert([
            'name' => 'Administrador',
            'email' => 'jimmirobles@hotmail.com',
            'password' => Hash::make('password'),
            'superAdmin' => true,
        ]);
    }
}
