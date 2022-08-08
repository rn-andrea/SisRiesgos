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
            $table->id();
            $table->string('id_usuario',10)->unique();
            $table->string('usr_nombre',25);
            $table->string('usr_apellidos',50);
            $table->string('usr_email',50);
	 	    $table->string('usr_password',25);
            $table->unsignedBigInteger('ind_estado');
            $table->unsignedBigInteger('id_rol');
            $table->timestamps();
            $table->foreign('id_rol')->references('id')
                  ->on('rols')->onDelete("cascade");
            $table->foreign('ind_estado')->references('id_estado')
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
