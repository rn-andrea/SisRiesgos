<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable_proceso_afectas', function (Blueprint $table) {
            $table->id();
            $table->string('usr_responsable_proceso',10);
            $table->unsignedBigInteger('id_proceso_afecta');
            $table->string('usr_creacion',10)-> nullable();
            $table->string('usr_modifica',10)-> nullable();
            $table->timestamps();
            $table->foreign('usr_responsable_proceso')->references('id_usuario')
            ->on('usuarios')->onDelete("cascade");
            $table->foreign('id_proceso_afecta')->references('id')
            ->on('proceso_afectas')->onDelete("cascade");
            $table->foreign('usr_creacion')->references('id_usuario')
            ->on('usuarios')->onDelete("cascade");
            $table->foreign('usr_modifica')->references('id_usuario')
            ->on('usuarios')->onDelete("cascade");
           
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsable_proceso_afectas');
    }
};
