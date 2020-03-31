<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logements', function (Blueprint $table) {
            $table->id('id_logement');
            
            $table->unsignedBigInteger('type_logement_id');
            $table->foreign('type_logement_id')->references('id_type_logement')->on('types_logements');

            $table->string('nom_logement');
            $table->string('adress_logement');
            $table->double('superficier');
            $table->integer('nbr_piece');
            $table->integer('capacite_personne_max');
            $table->double('tarif_par_nuit_HS');
            $table->double('tarif_par_nuit_BS');
            $table->text('description_logement');
            $table->integer('max_reserv');
            $table->double('tarif_annulation');
            $table->integer('marge_annulation');
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
        Schema::dropIfExists('logements');
    }
}
