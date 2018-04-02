<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCardsTable.
 */
class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('shutterstock')->create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->index();
            $table->string('name');
            $table->unique(['topic_id', 'name']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('shutterstock')->drop('cards');
    }
}
