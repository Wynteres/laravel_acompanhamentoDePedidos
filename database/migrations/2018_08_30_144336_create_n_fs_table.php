<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNFsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nfs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->integer('numero');
            $table->string('chave');
            $table->string('caminho_xml');
            $table->date('data_emissao');
            $table->integer('entrega_id')->unsigned();

            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('entrega_id')->references('id')->on('entregas');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nfs');
    }
}
