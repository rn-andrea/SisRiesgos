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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->ID();
            $table->string('ID_USUARIO')->unique();
            $table->string('USR_NOMBRE');
            $table->string('USR_APELLIDOS');
            $table->string('USR_EMAIL');
	 	    $table->string('USR_PASSWORD');
            $table->unsignedBigInteger('IND_ESTADO');
            $table->unsignedBigInteger('ID_ROL');
            $table->timestamps();
            $table->foreign('ID_ROL')->references('ID')
                  ->on('rols')->onDelete("cascade");
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
        Schema::dropIfExists('usuarios');
    }
};
