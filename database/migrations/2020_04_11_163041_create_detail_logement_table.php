<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailLogementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_logements', function (Blueprint $table) {

            $table->id('id_detail');
            $table->boolean('est_categorie')->default(false);

            $table->unsignedBigInteger('type_logement_id');
            $table->foreign('type_logement_id')
                ->references('id_type_logement')
                ->on('type_logements');

            $table->double('superficier');
            $table->integer('nbr_piece');
            $table->integer('capacite_personne_max');
            $table->double('tarif_par_nuit_HS');
            $table->double('tarif_par_nuit_BS');
            $table->text('description_logement', 1500);
            $table->integer('max_reserv');
            $table->double('tarif_annulation');
            $table->integer('marge_annulation');
            $table->boolean('piscine_disponible');
            $table->boolean('parking_disponible');
            $table->boolean('jardin_cours');
            $table->boolean('massage_disponible');


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
        Schema::dropIfExists('detail_logements');
    }
}