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
        Schema::create('probabilidads', function (Blueprint $table) {
            $table->id();
            $table->string('NOM_PROBABILIDAD');
            $table->string('DES_OBSERVACION')-> nullable();
            $table->string('USR_CREACION')-> nullable();
            $table->string('USR_MODIFICA')-> nullable();
            $table->unsignedBigInteger('IND_ESTADO');
            $table->timestamps();
            $table->foreign('USR_CREACION')->references('ID_USUARIO')
                  ->on('usuarios')->onDelete("cascade");
            $table->foreign('USR_MODIFICA')->references('ID_USUARIO')
                  ->on('usuarios')->onDelete("cascade");
            $table->foreign('IND_ESTADO')->references('ID_ESTADO')
                  ->on('estados')->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('probabilidads');
    }
};
