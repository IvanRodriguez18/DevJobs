<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->string('vacante');
            $table->string('imagen');
            $table->text('skill');
            $table->text('descripcion');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('ubicacion_id')->constrained()->onDelete('cascade');
            $table->foreignId('experiencia_id')->constrained()->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('estatus')->default(true);
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
        Schema::dropIfExists('vacantes');
    }
}
