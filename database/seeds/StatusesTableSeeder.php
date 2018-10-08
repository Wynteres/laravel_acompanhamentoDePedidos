<?php

use Illuminate\Database\Seeder;

class status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('statuses')->insert([
            [
                'descricao' => 'Em processamento'
            ],
            [
                'descricao' => 'Aguardando Material'
            ],
            [
                'descricao' => 'Enviado'
            ]
        ]);
        
    }
}
