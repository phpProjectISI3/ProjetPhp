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
            $table->string('nom_logement', 50);

            $table->unsignedBigInteger('detail_logement_id');
            $table->foreign('detail_logement_id')
                ->references('id_detail')
                ->on('detail_logements');

            $table->string('adress_logement', 100);
	        $table->text('localisation_logement', 1500);

			//$table->timestamps();
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
