<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'nik'  => '1170615811706158',
            'nama'  => 'Karim Ardana',
            'username'  => 'petugas',
            
            'email' => 'petugas@gmail.com',
            'level' => 'petugas',
            'telp' => '081317520732',
            'password'  => bcrypt('petugas')
        ]);
        \App\User::create([
            'nik'  => '1170615711706157',
            'nama'  => 'Andri Maulanan',
            'username'  => 'admin',
            
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'telp' => '081317520733',
            'password'  => bcrypt('admin')
        ]);
        \App\User::create([
            'nik'  => '1170615911706159',
            'nama'  => 'Hendra Andrianto',
            'username'  => 'masyarakat',
            
            'email' => 'masyarakat@gmail.com',
            'level' => 'masyarakat',
            'telp' => '081317520734',
            'password'  => bcrypt('masyarakat')
        ]);
    }
}
