<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('sentBy');
            $table->unsignedBigInteger('receivedBy');
            $table->timestamps();

            $table->foreign('sentBy')
                ->references('id')
                ->on('users');

            $table->foreign('receivedBy')
                ->references('id')
                ->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('money');
    }
}
