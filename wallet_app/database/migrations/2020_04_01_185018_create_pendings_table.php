<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('sentBy');
            $table->unsignedBigInteger('receivedBy');
            $table->date('scheduled_at');
            $table->date('stored_at');
            $table->boolean('isPending')->default(1);
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
        Schema::dropIfExists('pendings');
    }
}
