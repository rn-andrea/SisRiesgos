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
        Schema::create('riesgos', function (Blueprint $table) {
            $table->id();
            $table->string('id_riesgos',255)->unique;
            $table->string('nom_riesgos',50);
            $table->unsignedBigInteger('id_categoria');
            $table->string('des_detalle',300)-> nullable();
            $table->unsignedBigInteger('id_proceso_afecta');
            $table->unsignedBigInteger('id_probabilidad');
            $table->unsignedBigInteger('id_impacto');
            $table->decimal('tot_calificacion');
            $table->integer('num_pos_matriz')-> nullable();
            $table->unsignedBigInteger('id_accion');
            $table->string('ind_afecta_servicio')->nullable();
            $table->Integer('num_rto')-> nullable();
            $table->unsignedBigInteger('id_unidad_medida');
            $table->decimal('tot_tolerancia')-> nullable();
            $table->decimal('tot_capacidad')-> nullable();
            $table->string('usr_creacion',10)-> nullable();
            $table->string('usr_modifica',10)-> nullable();
            $table->timestamps();
            $table->unsignedBigInteger('ind_estado');
            $table->string('nom_archivo')-> nullable();

            $table->foreign('usr_creacion')->references('id_usuario')
            ->on('usuarios')->onDelete("cascade");
            $table->foreign('usr_modifica')->references('id_usuario')
            ->on('usuarios')->onDelete("cascade");
            $table->foreign('ind_estado')->references('id_estado')
            ->on('estados')->onDelete("cascade");
            $table->foreign('id_categoria')->references('id')
            ->on('categoria_riesgos')->onDelete("cascade");
            $table->foreign('id_proceso_afecta')->references('id')
            ->on('proceso_afectas')->onDelete("cascade");
            $table->foreign('id_probabilidad')->references('id')
            ->on('probabilidads')->onDelete("cascade");
            $table->foreign('id_impacto')->references('id')
            ->on('impactos')->onDelete("cascade");
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
        Schema::dropIfExists('riesgos');
    }
};
