<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('desc');
            $table->year('year_start');
            $table->year('year_finish');
            $table->timestamps();
        });

        Schema::create('village_regulations', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('desc');
            $table->timestamps();
        });

        Schema::create('village_reports', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')
                ->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->text('content');
            $table->string('attachment')
                ->nullable();
            $table->rememberToken();
            $table->timestamps();

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
        Schema::dropIfExists('village_reports');
        Schema::dropIfExists('village_programs');
    }
}
