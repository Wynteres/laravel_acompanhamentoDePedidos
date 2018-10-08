<?php

use Illuminate\Database\Seeder;

class empresas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('empresas')->insert([
            [
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
            ]
        ]);
    }
}
