<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider__slides', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('slider_id')->unsigned();
            $table->integer('page_id');
            $table->string('target');
            $table->string('image');
            $table->integer('weight')->default(0);
            $table->boolean('published')->default(1);
            $table->timestamps();

            $table->foreign('slider_id')->references('id')->on('slider__sliders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider__slides');
    }
}
