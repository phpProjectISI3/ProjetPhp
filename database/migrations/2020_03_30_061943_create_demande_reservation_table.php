<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes_reservations', function (Blueprint $table) {
            $table->id('id_demande');
            $table->date('date_demande');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->boolean('annuler_par_client')->default(false);
            $table->date('date_annulation');


           
            $table->unsignedBigInteger('personne_id');
            $table->foreign('personne_id')->references('id_client')->on('personnes');

            $table->unsignedBigInteger('logement_id');
            $table->foreign('logement_id')->references('id_logement')->on('logements');
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
        Schema::dropIfExists('demandes_reservations');
    }
}
