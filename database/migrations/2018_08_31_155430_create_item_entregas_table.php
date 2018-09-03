<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_entrega', function (Blueprint $table) {
            $table->increments('id');
            $table->double('quantidade');
            $table->integer('item_id')->unsigned();
            $table->integer('entrega_id')->unsigned();

            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('item_id')->references('id')->on('itens');
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
        Schema::dropIfExists('item_entregas');
    }
}
