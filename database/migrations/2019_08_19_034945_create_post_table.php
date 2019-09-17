<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categories', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')
                ->nullable();
            $table->string('name');
            $table->timestamps();

            $table->foreign('parent_id')
                ->references('id')
                ->on('post_categories')
                ->onDelete('cascade');
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')
                ->nullable();
            $table->string('title');
            $table->string('subtitle')
                ->nullable();
            $table->text('desc');
            $table->text('content');
            $table->string('status');
            $table->string('uri');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('post_categories')
                ->onDelete('cascade');
        });

        Schema::create('post_comments', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id')
                ->nullable();
            $table->string('name');
            $table->string('content');
            $table->timestamps();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
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
        Schema::dropIfExists('post_comments');
        Schema::dropIfExists('post_publishes');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_categories');
    }
}
