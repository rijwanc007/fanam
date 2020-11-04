<?php
//
//use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
//
//class CreateTatdsTable extends Migration
//{
//    /**
//     * Run the migrations.
//     *
//     * @return void
//     */
//    public function up()
//    {
//        Schema::create('tatds', function (Blueprint $table) {
//            $table->id();
//            $table->string('eid')->nullable();
//            $table->string('month')->nullable();
//            $table->integer('year')->nullable();
//            $table->integer('salary')->nullable();
//            $table->float('commission')->nullable();
//            $table->longText('tatd')->nullable();
//            $table->longText('location')->nullable();
//            $table->timestamps();
//        });
//    }
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
//    public function down()
//    {
//        Schema::dropIfExists('tatds');
//    }
//}
