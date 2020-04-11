<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSauvegardeLogementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sauvegarde_logements', function (Blueprint $table) {
            $table->id('id_sauvegarde');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')
                ->references('id_client')
                ->on('personnes');

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
        Schema::dropIfExists('sauvegarde_logements');
    }
}