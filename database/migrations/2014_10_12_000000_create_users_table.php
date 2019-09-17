<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')
                ->unique();
            $table->string('email')
                ->unique();
            $table->timestamp('email_verified_at')
                ->nullable();
            $table->string('password');
            $table->string('api_token')
                ->unique()
                ->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')
                ->index();
            $table->date('birthday')
                ->nullable();
            $table->string('birthplace')
                ->nullable();
            $table->string('gender')
                ->nullable();
            $table->string('religion')
                ->nullable();
            $table->string('address')
                ->nullable();
            $table->string('job')
                ->nullable();
            $table->string('company')
                ->nullable();
            $table->string('phone')
                ->unique()
                ->nullable();
            $table->text('desc')
                ->nullable();
            $table->string('avatar')
                ->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::create('user_activity_statuses', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('status');
            $table->dateTime('last_active');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_activity_statuses');
        Schema::dropIfExists('user_profiles');
        Schema::dropIfExists('users');
    }
}
