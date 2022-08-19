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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('id_evento')->unique;
            $table->string('nom_evento',50);
            $table->unsignedBigInteger('id_riesgos')-> nullable();
            $table->date('fec_evento');
            $table->string('des_situacion_pre',300)-> nullable();
            $table->string('des_detalle_medidas',300)-> nullable();
            $table->unsignedBigInteger('id_estado_resolucion');
            $table->unsignedBigInteger('id_accion');
            $table->string('jus_evento_no_resuelto',300)-> nullable();
            $table->string('jus_medida_aplicada',300)-> nullable();
            $table->unsignedBigInteger('id_unidad_medida');
            $table->decimal('num_perdida_estimada')-> nullable();
            $table->integer('num_rto')-> nullable();
            $table->string('des-lecciones_aprend',300)-> nullable();
            $table->string('usr_creacion',10)-> nullable();
            $table->string('usr_modifica',10)-> nullable();
            $table->timestamps();
            $table->unsignedBigInteger('ind_estado');

           $table->foreign('id_riesgos')->references('id')
           ->on('riesgos')->onDelete("cascade");
            $table->foreign('usr_creacion')->references('id_usuario')
            ->on('usuarios')->onDelete("cascade");
            $table->foreign('usr_modifica')->references('id_usuario')
            ->on('usuarios')->onDelete("cascade");
            $table->foreign('ind_estado')->references('id_estado')
            ->on('estados')->onDelete("cascade");
            $table->foreign('id_estado_resolucion')->references('id')
            ->on('estado_resolucions')->onDelete("cascade");
            $table->foreign('id_accion')->references('id')
            ->on('accions')->onDelete("cascade");
            $table->foreign('id_unidad_medida')->references('id')
            ->on('unidad_medidas')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
};
