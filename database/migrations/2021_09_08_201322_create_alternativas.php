<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternativas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 200);
            $table->unsignedBigInteger('objetivo_id');
            $table->foreign('objetivo_id')-> references('id')->on('objetivo');
            $table->unsignedBigInteger('criterio_id');
            $table->foreign('criterio_id')-> references('id')->on('criterio');
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
        Schema::dropIfExists('alternativas');
    }
}
