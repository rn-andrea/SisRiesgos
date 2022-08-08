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
        Schema::create('rols', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('nom_rol',50);
            $table->timestamps();
            $table->unsignedBigInteger('ind_estado');
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
        Schema::dropIfExists('rols');
    }
};
