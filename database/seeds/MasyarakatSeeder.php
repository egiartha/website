<?php

use Illuminate\Database\Seeder;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'nik'  => '1170615911706159',
            'nama'  => 'Fernando Jatmiko',
            'username'  => 'petugas',
            
            'email' => 'masyarakat@gmail.com',
            'level' => 'masyarakat',
            'telp' => '081317520732',
            'password'  => bcrypt('masyarakat')
        ]);
    }
}
