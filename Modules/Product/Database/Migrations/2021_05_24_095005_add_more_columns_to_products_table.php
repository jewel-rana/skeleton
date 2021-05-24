<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug');
            $table->string('sku', 21);
            $table->double('upfront_price', [10,2])->default(0);
            $table->double('install_price', [10,2])->default(0);
            $table->enum('price_type', ['onetime', 'monthly', 'yearly'])->default('onetime');
            $table->tinyInteger('status')->default(1);
            $table->string('thumbnail')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['sku', 'upfront_price', 'install_price', 'status', 'thumbnail', 'price_type']);
        });
    }
}
