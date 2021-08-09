<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'nik'  => '0022889977234765',
            'nama'  => 'Admin Maulana',
            'username'  => 'admin',
            
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'telp' => '085782927293',
            'password'  => bcrypt('admin')
    ]);
    }
}
