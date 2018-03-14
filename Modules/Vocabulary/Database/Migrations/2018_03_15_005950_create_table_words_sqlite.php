<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWordsSqlite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlite')->create('words', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->string('name');
            $table->string('img');
            $table->integer('imgw');
            $table->integer('imgh');
            $table->string('phonic_uk');
            $table->string('phonic_us');
            $table->text('audio');
            $table->text('meant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sqlite')->dropIfExists('words');
    }
}
