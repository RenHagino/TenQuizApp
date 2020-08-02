<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title')->nullable();
            $table->string('category_name')->nullable();
            $table->string('a_method0')->nullable();
            $table->string('problem0')->nullable();
            $table->string('answer0')->nullable();
            $table->string('a_method1')->nullable();
            $table->string('problem1')->nullable();
            $table->string('answer1')->nullable();
            $table->string('a_method2')->nullable();
            $table->string('problem2')->nullable();
            $table->string('answer2')->nullable();
            $table->string('a_method3')->nullable();
            $table->string('problem3')->nullable();
            $table->string('answer3')->nullable();
            $table->string('a_method4')->nullable();
            $table->string('problem4')->nullable();
            $table->string('answer4')->nullable();
            $table->string('a_method5')->nullable();
            $table->string('problem5')->nullable();
            $table->string('answer5')->nullable();
            $table->string('a_method6')->nullable();
            $table->string('problem6')->nullable();
            $table->string('answer6')->nullable();
            $table->string('a_method7')->nullable();
            $table->string('problem7')->nullable();
            $table->string('answer7')->nullable();
            $table->string('a_method8')->nullable();
            $table->string('problem8')->nullable();
            $table->string('answer8')->nullable();
            $table->string('a_method9')->nullable();
            $table->string('problem9')->nullable();
            $table->string('answer9')->nullable();
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
        Schema::dropIfExists('drills');
    }
}
