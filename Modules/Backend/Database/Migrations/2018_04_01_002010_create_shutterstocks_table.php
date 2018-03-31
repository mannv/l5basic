<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateShutterstocksTable.
 */
class CreateShutterstocksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shutterstocks', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('card_id')->index();
            $table->integer('shutterstock_id')->index();
            $table->string('shutterstock_url');
            $table->enum('status',['approve', 'reject']);
            $table->boolean('downloaded');
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
		Schema::drop('shutterstocks');
	}
}
