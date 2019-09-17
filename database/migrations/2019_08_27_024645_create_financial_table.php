<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_wallets', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name')
                ->unique();
            $table->bigInteger('value');
            $table->text('desc')
                ->nullable();
            $table->timestamps();
        });

        Schema::create('financial_categories', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->BigInteger('parent_id')
                ->nullable();
            $table->foreign('parent_id')
                ->references('id')
                ->on('financial_categories')
                ->onDelete('cascade');
        });

        Schema::create('financial_budgets', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('category_id')
                ->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('financial_categories')
                ->onDelete('cascade');
            $table->bigInteger('goal_value');
            $table->string('frecuency');
            $table->string('purpose');
            $table->timestamps();
        });

        Schema::create('financial_incomes', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wallet_id');
            $table->foreign('wallet_id')
                ->references('id')
                ->on('financial_wallets')
                ->onDelete('cascade');
            $table->bigInteger('value');
            $table->unsignedBigInteger('category_id')
                ->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('financial_categories')
                ->onDelete('cascade');
            $table->string('purpose');
            $table->string('source')
                ->nullable();
            $table->dateTime('datetime_trx');
            $table->string('attachment')
                ->nullable();
            $table->timestamps();
        });

        Schema::create('financial_expenses', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wallet_id');
            $table->foreign('wallet_id')
                ->references('id')
                ->on('financial_wallets')
                ->onDelete('cascade');
            $table->bigInteger('value');
            $table->unsignedBigInteger('category_id')
                ->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('financial_categories')
                ->onDelete('cascade');
            $table->string('purpose');
            $table->string('receiver')
                ->nullable();
            $table->dateTime('datetime_trx');
            $table->string('attachment')
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
        Schema::dropIfExists('financial_expenses');
        Schema::dropIfExists('financial_incomes');
        Schema::dropIfExists('financial_budgets');
        Schema::dropIfExists('financial_categories');
        Schema::dropIfExists('financial_wallets');
        Schema::dropIfExists('financial_wallet_categories');
    }
}
