<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->Integer('campaign_id');
            $table->Integer('user_id');
            $table->string('status');
            $table->Integer('bid');
            $table->text('proposal');
            $table->Integer('duration');
            $table->string('owner');
            $table->string('platform');
            $table->string('proposalfile')->nullable();
            $table->integer('is_complete')->nullable();
            $table->Integer('actualpay')->nullable();
            $table->string('powfile')->nullable();
            $table->string('link')->nullable();
            $table->Integer('numberofclicks')->nullable();
            $table->integer('numberofviews')->nullable();
            $table->integer('numberoflikes')->nullable();
            $table->integer('mediaengagement')->nullable();
            $table->integer('retweets')->nullable();
            $table->integer('impressions')->nullable();
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
        Schema::dropIfExists('proposals');
    }
}
