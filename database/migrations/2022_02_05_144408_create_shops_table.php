<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('title');
            $table->string('level1');
            $table->string('level2');
            $table->string('level3');
            $table->string('price');
            $table->string('price_sp');
            $table->string('count');
            $table->text('properties');
            $table->string('joint_purchases');
            $table->string('unit');
            $table->string('picture');
            $table->string('show_on_home');
            $table->text('description');
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
        Schema::dropIfExists('shops');
    }
}
