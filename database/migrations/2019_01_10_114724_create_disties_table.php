<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('contact_person');
            $table->string('jop');
            $table->string('type');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable()->unique();
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
        Schema::dropIfExists('disties');
    }
}
