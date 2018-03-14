<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use \Modules\Vocabulary\Database\VocabularyMigration;

class CreateTableGroup extends VocabularyMigration
{
    protected $table = 'group';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->text('description')->nullable();
            $table->text('meant')->nullable();
            $table->boolean('is_crawler')->default(0);
            $table->boolean('is_crawler_meant')->default(0);
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
