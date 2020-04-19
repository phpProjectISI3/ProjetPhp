<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemarqueClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remarque_clients', function (Blueprint $table) {
            $table->id('id_remarque');

            $table->unsignedBigInteger('personne_id');
            $table->foreign('personne_id')
                ->references('id_personne')->on('personnes');

            $table->text('description_remarque', 100);
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
        Schema::dropIfExists('remarque_clients');
    }
}