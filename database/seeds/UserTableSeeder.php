<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'webmaster@mogiglass.com.br',
            'password' => bcrypt('8j9a4s2P'),
        ]);
    }
}
