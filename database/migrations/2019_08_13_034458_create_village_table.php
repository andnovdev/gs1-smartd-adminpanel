<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_vissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->text('desc')
                ->nullable();
            $table->timestamps();
        });

        Schema::create('village_missions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->text('desc')
                ->nullable();
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
        Schema::dropIfExists('village_missions');
        Schema::dropIfExists('village_vissions');
    }
}
