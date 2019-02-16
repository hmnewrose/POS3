<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('category_id')->nullable();;
            $table->string('size_id')->nullable();;
            $table->string('color_id')->nullable();;
            $table->integer('qty')->nullable();
            $table->string('barcode')->nullable();;
            $table->string('serial')->nullable();;
            $table->decimal('price', 8, 2)->default(0);
            $table->decimal('other_costs', 8, 2)->default(0);;
            $table->decimal('profit_percent', 8, 2)->default(0);;
            $table->decimal('sell_price', 8, 2)->default(0);;
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
        Schema::dropIfExists('items');
    }
}
