<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_types', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('letter_details', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')
                ->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('letter_types')
                ->onDelete('cascade');
            $table->string('purpose');
            $table->text('message')
                ->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('letter_identities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('letter_id');
            $table->foreign('letter_id')
                ->references('id')
                ->on('letter_details')
                ->onDelete('cascade');
            $table->string('identity_number');
            $table->string('name');
            $table->string('gender');
            $table->string('birthplace');
            $table->date('birthday');
            $table->string('job');
            $table->string('relationship_status');
            $table->string('religion');
            $table->string('address');
            $table->timestamps();
        });

        Schema::create('letter_summaries', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('letter_id');
            $table->foreign('letter_id')
                ->references('id')
                ->on('letter_details')
                ->onDelete('cascade');
            $table->string('fulfillment');
            $table->timestamps();
        });

        Schema::create('letter_attachments', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('letter_id');
            $table->foreign('letter_id')
                ->references('id')
                ->on('letter_details')
                ->onDelete('cascade');
            $table->string('identity_card');
            $table->string('family_card');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letter_attachments');
        Schema::dropIfExists('letter_summaries');
        Schema::dropIfExists('letter_identities');
        Schema::dropIfExists('letter_details');
        Schema::dropIfExists('letter_types');
    }
}
