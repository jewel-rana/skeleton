<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('menu_id');
            $table->enum('type', ['page', 'category', 'custom'])->default('custom');
            $table->string('menu_url')->default('#');
            $table->string('css_class')->nullable();
            $table->string('icon_class')->nullable();
            $table->integer('parent_id')->default(0);
            $table->integer('menu_order')->default(99);
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
        Schema::dropIfExists('menu_items');
    }
}
