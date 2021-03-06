<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJulgamentoic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('julgamentoic', function (Blueprint $table) {
            $table->id();
            $table->integer ('score');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')-> references('id')->on('users');
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
        Schema::dropIfExists('julgamentoic');
    }
}
