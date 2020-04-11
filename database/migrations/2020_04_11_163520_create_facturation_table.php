<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturations', function (Blueprint $table) {
            $table->id('id_facture');
            $table->integer('note_client');
            $table->text('commentaire_client', 250);

            $table->unsignedBigInteger('reservation_logement_id');
            $table->foreign('reservation_logement_id')
                ->references('id_reservation')
                ->on('reservation_logements');
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
        Schema::dropIfExists('facturations');
    }
}