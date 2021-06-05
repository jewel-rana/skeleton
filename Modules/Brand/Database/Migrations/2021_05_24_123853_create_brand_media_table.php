<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_media', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('brand_id')->index();
            $table->bigInteger('media_id')->index();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('btn_visible')->default(1);
            $table->string('btn_text')->default('View details');
            $table->string('btn_link')->default('#');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_media');
    }
}
