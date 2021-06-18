<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('campaign_name');
            $table->bigInteger('budget');
            $table->string('niche');
            $table->text('desc');
            $table->Integer('frequency')->nullable();
            $table->string('link')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->text('topic')->nullable();
            $table->text('ads_text')->nullable();
            $table->text('media')->nullable();
            $table->string('service');
            $table->string('status');
            $table->text('hashtag')->nullable();
            $table->string('qualification')->nullable();
            $table->string('cta')->nullable();
            $table->text('details')->nullable();
            $table->string('isproduct')->nullable();
            $table->string('tags')->nullable();
            $table->string('quotes')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('country')->nullable();
            $table->string('minfollowers')->nullable();
            $table->text('interests')->nullable();
            $table->string('duration')->nullable();
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
        Schema::dropIfExists('campaigns');
    }
}
