<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->id('id_client');
            $table->string('nom', 50);
            $table->string('prenom', 50);

            $table->unsignedBigInteger('sexe_id');
            $table->foreign('sexe_id')
                ->references('id_sexe')
                ->on('sexes');

            $table->boolean('est_marie');
            $table->integer('nbr_Enfant_scolarise');
            $table->integer('nbr_Enfant_non_scolarise');

            $table->unsignedBigInteger('grade_id');
            $table->foreign('grade_id')->references('id_grade')->on('grades');

            $table->date('date_naissance');
            $table->integer('point_personne');
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
        Schema::dropIfExists('personnes');
    }
}