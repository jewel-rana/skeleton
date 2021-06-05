<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_slider', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('media_id');
            $table->bigInteger('slider_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('btn_text')->default('View details');
            $table->string('btn_link')->default('#');
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
        Schema::dropIfExists('media_slider');
    }
}
