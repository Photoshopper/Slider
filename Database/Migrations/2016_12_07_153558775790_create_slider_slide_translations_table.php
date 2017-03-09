<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderSlideTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider__slide_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('text');
            $table->string('uri');
            $table->string('url');

            $table->integer('slide_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['slide_id', 'locale']);
            $table->foreign('slide_id')->references('id')->on('slider__slides')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slider__slide_translations', function (Blueprint $table) {
            $table->dropForeign(['slide_id']);
        });
        Schema::dropIfExists('slider__slide_translations');
    }
}
