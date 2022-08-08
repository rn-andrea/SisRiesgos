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
        Schema::create('proceso_afectas', function (Blueprint $table) {
            $table->id()->zerofill;
		    $table->string('id_nomenclatura',10);
		    $table->string('nom_proceso_afecta',100);
            $table->string('des_observacion',200)-> nullable();
            $table->string('usr_creacion',10)-> nullable();
            $table->string('usr_modifica',10)-> nullable();
            $table->unsignedBigInteger('ind_estado');
            $table->timestamps();
            $table->foreign('usr_creacion')->references('id_usuario')
                  ->on('usuarios')->onDelete("cascade");
            $table->foreign('usr_modifica')->references('id_usuario')
                  ->on('usuarios')->onDelete("cascade");
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
        Schema::dropIfExists('proceso_afectas');
    }
};
