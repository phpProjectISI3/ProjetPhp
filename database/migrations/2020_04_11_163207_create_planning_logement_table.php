<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningLogementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning_logements', function (Blueprint $table) {
            $table->id('id_planing');
            $table->boolean('est_disponible');
            $table->date('date_debut');
            $table->date('date_fin');

            $table->unsignedBigInteger('logement_id');
            $table->foreign('logement_id')
                ->references('id_logement')
                ->on('logements');
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
        Schema::dropIfExists('planning_logements');
    }
}