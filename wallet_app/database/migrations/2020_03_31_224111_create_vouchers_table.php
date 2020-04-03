<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->unsignedBigInteger('value');
            $table->boolean('isRedeemed')->default(0);
            $table->unsignedBigInteger('redeemedBy')->nullable();
            $table->timestamps();
            $table->date('validity');
            $table->boolean('isExpired');

            $table->foreign('redeemedBy')
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
        Schema::dropIfExists('vouchers');
    }
}
