<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use \Modules\Vocabulary\Database\VocabularyMigration;

class CreateTableWords extends VocabularyMigration
{
    protected $table = 'words';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->string('name');
            $table->string('image_url');
            $table->string('img')->nullable();
            $table->integer('imgw')->default(0);
            $table->integer('imgh')->default(0);
            $table->string('audio_uk')->nullable();
            $table->string('audio_us')->nullable();
            $table->text('meant')->nullable();
            $table->boolean('is_crawler')->default(0);
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
        Schema::dropIfExists($this->getTable());
    }
}
