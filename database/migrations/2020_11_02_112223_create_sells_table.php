<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->string('eid')->nullable();
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->string('parea')->nullable();
            $table->integer('price')->nullable();
            $table->integer('totalprice')->nullable();
            $table->float('commission')->nullable();
            $table->string('cname')->nullable();
            $table->string('caddress')->nullable();
            $table->string('cphone')->nullable();
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
        Schema::dropIfExists('sells');
    }
}
