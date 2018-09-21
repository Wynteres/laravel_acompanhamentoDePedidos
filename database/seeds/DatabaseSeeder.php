<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        DB::table('empresas')->insert([
            'nome' => 'Mogiglass',
            'cnpj' => '66.886.052/0001-15',
        ], [
            'nome' => 'Mcientifica',
            'cnpj' => '05.230.436/0001-90',
        ],
        [
            'nome' => 'M2W',
            'cnpj' => '27.206.864/0001-10',
        ],
        [
            'nome' => 'Weblabor',
            'cnpj' => '13.533.610/0001-00',
        ]);

        DB::table('statuses')->insert([
            'descricao' => 'Em processamento'
        ],
        [
            'descricao' => 'Aguardando Material'
        ],
        [
            'descricao' => 'Enviado'
        ]
    );

    }
}
