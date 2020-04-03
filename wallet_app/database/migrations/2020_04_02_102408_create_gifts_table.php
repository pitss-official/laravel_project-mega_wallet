<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('sentBy');
            $table->unsignedBigInteger('receivedBy');
            $table->string('message');
            $table->boolean('isUsed')->default(0);
            $table->timestamps();

            $table->foreign('sentBy')
                ->references('id')
                ->on('users')->onDelete('cascade');

            $table->foreign('receivedBy')
                ->references('id')
                ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gifts');
    }
}
