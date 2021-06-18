<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role');
            $table->string('mobilenumber')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('Address')->nullable();
            $table->string('maincategory')->nullable();
            $table->string('morecategory')->nullable();
            $table->string('gender')->nullable();
            $table->string('brandname')->unique();
            $table->string('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->string('bod')->nullable();
            $table->integer('acc_number')->nullable();
            $table->string('acc_name')->nullable();
            $table->string('acc_bank')->nullable();
            $table->string('url')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('users');
    }
}
