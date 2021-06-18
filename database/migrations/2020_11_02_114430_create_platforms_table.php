<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('platform');
            $table->string('handle')->nullable();
            $table->string('link')->nullable();
            $table->bigInteger('followers')->nullable();
            $table->bigInteger('members')->nullable();
            $table->bigInteger('monthly_views')->nullable();
            $table->boolean('is_verify')->default(false);
            $table->string('category')->nullable();
            $table->integer('subscribers')->nullable();
            $table->integer('startdate')->nullable();
            $table->string('analytics')->nullable();
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
        Schema::dropIfExists('platforms');
    }
}
